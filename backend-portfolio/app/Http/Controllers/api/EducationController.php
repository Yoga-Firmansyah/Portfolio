<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = Education::all();
        return response()->json($education, 200);
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
            'institution' => 'required|string',
            'start' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'end' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
        ]);
        $education = Education::create($validatedData);
        return response()->json([
            'message' => 'Education created successfully',
            'education' => $education,
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
    public function edit(Education $education)
    {
        return response()->json($education, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'institution' => 'nullable|string',
            'start' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'end' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
        ]);
        $education->update($validatedData);
        return response()->json([
            'message' => 'Education updated successfully',
            'education' => $education,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json([
            'message' => 'Education deleted successfully',
        ], 200);
    }
}
