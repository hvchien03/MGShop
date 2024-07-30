<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index', compact('products'));
    }
    public function store(Request $request)
    {
        if ($request->isMethod('get')) {
            $brands = Brands::all();
            $categories = Categories::all();
            return view('admin.products.store', compact('brands', 'categories'));
        } else if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric|int',
                'category_id' => 'required',
                'brand_id' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $product = new Products();
            $product->name = $request->name;
            $product->price = (int)$request->price;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->description = $request->description;
            //image
            $file_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/images_upload'), $file_name);
            $product->image = $file_name;

            $product->save();
            return redirect()->route('admin.products.index');
        }
    }
    public function show($id)
    {
        $product = Products::find($id);
        if (!$product) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        return view('admin.products.show', compact('product'));
    }
    public function edit(Request $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        if ($request->isMethod('get')) {
            $brands = Brands::all();
            $categories = Categories::all();
            return view('admin.products.edit', compact('product', 'brands', 'categories'));
        } else if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|int',
                'category_id' => 'required',
                'brand_id' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->merge(['price' => (int)$request->price]);
            $product->update($request->all());
            if ($request->hasFile('image')) {
                if ($product->image) {
                    unlink(public_path('/images_upload/' . $product->image));
                }
                $file_name = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/images_upload'), $file_name);
                $product->image = $file_name;
                $product->save();
            }
            return redirect()->route('admin.products.index');
        }
    }
    public function destroy($id)
    {
        $product = Products::find($id);
        if (!$product) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        if ($product->image) {
            unlink(public_path('/images_upload/' . $product->image));
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
