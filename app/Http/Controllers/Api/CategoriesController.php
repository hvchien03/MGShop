<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return response()->json([
            'data' => $categories
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:categories|string|max:255'
            ]);
            $categories = Categories::create($validatedData);
            return response()->json([
                'data' => $categories
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Category not created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categories::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json([
            'data' => $category
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Categories::find($id);
        if (!$category) return response()->json(['message' => 'Category not found'], 404);
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:categories|string|max:255',
            ]);
            $category->update($validatedData);
            return response()->json([
                'data' => $category
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Category not updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        $category->delete();
        return response()->json([
            'message' => 'Category deleted'
        ], 200);
    }
}
