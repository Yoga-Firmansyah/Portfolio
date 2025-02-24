<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return response()->json($skills, 200);
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'icon' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');

            // Check if the file is an SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Sanitize the SVG content
                $sanitizer = new Sanitizer();
                $cleanSvg = $sanitizer->sanitize(file_get_contents($file->getPathname()));

                // Save the sanitized SVG to a temporary file
                $tempFile = tempnam(sys_get_temp_dir(), 'svg');
                file_put_contents($tempFile, $cleanSvg);
                $path = Storage::disk('public')->putFile('public/skills', new File($tempFile));
            } else {
                // For other image types, just store them normally
                $path = $file->storeAs('public/skills', $file->hashName());
            }

            $skill = Skill::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'icon' => basename($path),
            ]);

            return response()->json([
                'message' => 'Skill created successfully',
                'skill' => $skill,
            ], 201);
        }

        return response()->json(['message' => 'Error: No file uploaded'], 422);
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
    public function edit(Skill $skill)
    {
        return response()->json($skill, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skill $skill)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $skill->update($validatedData);
        if ($request->hasFile('icon')) {
            Storage::disk('public')->delete('public/skills/' . basename($skill->icon));
            $file = $request->file('icon');

            // Check if the file is an SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Sanitize the SVG content
                $sanitizer = new Sanitizer();
                $cleanSvg = $sanitizer->sanitize(file_get_contents($file->getPathname()));

                // Save the sanitized SVG to a temporary file
                $tempFile = tempnam(sys_get_temp_dir(), 'svg');
                file_put_contents($tempFile, $cleanSvg);
                $path = Storage::disk('public')->putFile('public/skills', new File($tempFile));
            } else {
                // For other image types, just store them normally
                $path = $file->storeAs('public/skills', $file->hashName());
            }

            $skill->update(['icon' => basename($path)]);
        }
        return response()->json([
            'message' => 'Skill updated successfully',
            'skill' => $skill,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        Storage::disk('public')->delete('public/skills/' . basename($skill->icon));
        $skill->delete();
        return response()->json([
            'message' => 'Skill deleted successfully',
        ], 200);
    }
}
