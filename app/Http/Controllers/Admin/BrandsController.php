<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        $products = Products::all();
        return view('admin.brands.index', compact('brands', 'products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Brands::create($request->all());
        return redirect()->route('admin.brands.index');
    }
    public function edit(Request $request, $id)
    {
        $brand = Brands::find($id);
        if (!$brand) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        if ($request->method() === 'GET') {
            return view('admin.brands.edit', compact('brand'));
        } else if ($request->method() === 'POST') {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $brand->update($request->all());
            return redirect()->route('admin.brands.index');
        }
    }
    public function destroy($id)
    {
        $brand = Brands::find($id);
        if (!$brand) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        $brand->delete();
        return redirect()->route('admin.brands.index');
    }
}
