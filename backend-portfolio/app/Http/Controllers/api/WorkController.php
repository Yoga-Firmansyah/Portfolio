<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work = WorkExperience::all();
        return response()->json($work, 200);
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
            'company' => 'required|string',
            'position' => 'required|string',
            'start' => 'required|string',
            'end' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $work = WorkExperience::create($validatedData);
        return response()->json([
            'message' => 'Work experience created successfully',
            'data' => $work,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkExperience $work)
    {
        return response()->json($work, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkExperience $work)
    {
        return response()->json($work, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkExperience $work)
    {
        $validatedData = $request->validate([
            'company' => 'required|string',
            'position' => 'required|string',
            'start' => 'required|string',
            'end' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $work->update($validatedData);
        return response()->json([
            'message' => 'Work experience updated successfully',
            'data' => $work,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkExperience $work)
    {
        $work->delete();
        return response()->json([
            'message' => 'Work experience deleted successfully',
        ], 200);
    }
}
