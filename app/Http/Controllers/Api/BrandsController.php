<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brands::all();
        return response()->json([
            'data' => $brands
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:brands|string|max:255'
            ]);
            $brand = Brands::create($validatedData);
            return response()->json([
                'data' => $brand
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Brand not created'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brands::find($id);
        if (!$brand) return response()->json(['message' => 'Brand not found'], 404);
        return response()->json([
            'data' => $brand
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brands::find($id);
        if (!$brand) return response()->json(['message' => 'Brand not found'], 404);
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:brands|string|max:255'
            ]);
            $brand->update($validatedData);
            return response()->json([
                'data' => $brand
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Brand not updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brands::find($id);
        if (!$brand) return response()->json(['message' => 'Brand not found'], 404);
        $brand->delete();
        return response()->json([
            'message' => 'Brand deleted successfully'
        ], 200);
    }
}
