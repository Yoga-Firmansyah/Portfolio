<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('skills')->get();
        return response()->json($projects, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'skills' => 'required|array',
            'skills.*' => 'integer|exists:skills,id',
            'git_link' => 'required|string',
            'live_link' => 'required|string',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/projects', $image->hashName());

        $project = Project::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'], '-'),
            'description' => $validatedData['description'],
            'image' => $image->hashName(),
            'git_link' => $validatedData['git_link'],
            'live_link' => $validatedData['live_link'],
        ]);

        $project->skills()->sync($validatedData['skills']);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project->load('skills'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return response($project->load('skills'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'skills' => 'nullable|array',
            'skills.*' => 'integer|exists:skills,id',
            'git_link' => 'nullable|string',
            'live_link' => 'nullable|string',
        ]);
        $project->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'], '-'),
            'description' => $validatedData['description'],
            'git_link' => $validatedData['git_link'],
            'live_link' => $validatedData['live_link'],
        ]);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('public/projects/' . basename($project->image));
            $image = $request->file('image');
            $image->storeAs('public/projects', $image->hashName());
            $project->update(['image' => $image->hashName()]);
        }
        $project->skills()->sync($validatedData['skills']);
        return response()->json([
            'message' => 'Project updated successfully',
            'project' => $project->load('skills'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        Storage::disk('public')->delete('public/projects/' . basename($project->image));
        return response()->json([
            'message' => 'Project deleted successfully',
        ], 200);
    }
}
