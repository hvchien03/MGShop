<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return response()->json([
            'data' => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'brand_id' => 'required',
                'category_id' => 'required',
                'description' => 'required|string',
                'image' => 'required|url'
            ]);
            $product = Products::create($validatedData);
            return response()->json([
                'data' => $product
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Product not created',
                'error' => $e->errors()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Product = Products::find($id);
        if (!$Product) return response()->json(['message' => 'Product not found'], 404);
        return response()->json([
            'data' => $Product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);
        if (!$product) return response()->json(['message' => 'Product not found'], 404);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'brand_id' => 'required|exists:brands,_id',
                'category_id' => 'required|exists:categories,_id',
                'image' => 'required|url'
            ]);
            $product->update($validatedData);
            return response()->json([
                'data' => $product
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Product not updated'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Products::find($id);
        if (!$Product) return response()->json(['message' => 'Product not found'], 404);
        $Product->delete();
        return response()->json([
            'message' => 'Delete success'
        ], 200);
    }
}
