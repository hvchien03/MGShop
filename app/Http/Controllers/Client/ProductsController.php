<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Products::query();
        //search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%');
        }
        //sort
        if ($request->has('sort_by') && $request->has('sort_order')) {
            $query->orderBy($request->sort_by, $request->sort_order);
        }
        //sort by category
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }
        //paginate
        $products = $query->paginate(12);
        return view('Client.Products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Products::find($id);
        $products = Products::where('category_id', $product->category_id)
            ->where('_id', '!=', $id)
            ->take(3)
            ->get();
        return view('Client.Products.show', compact('product', 'products'));
    }
}
