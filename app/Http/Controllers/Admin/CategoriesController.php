<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $products = Products::all();
        return view('admin.categories.index', compact('categories', 'products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Categories::create($request->all());
        return redirect()->route('admin.categories.index');
    }
    public function edit(Request $request, $id)
    {
        $cate = Categories::find($id);
        if (!$cate) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        if($request->method() === 'GET'){
            return view('admin.categories.edit', compact('cate'));
        }else if($request->method() === 'POST'){
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $cate->update($request->all());
            return redirect()->route('admin.categories.index');
        }
    }
    public function destroy($id)
    {
        $cate = Categories::find($id);
        if (!$cate) {
            // $previousUrl = url()->previous();
            // return view('404', compact('previousUrl'));
            return view('404');
        }
        $cate->delete();
        return redirect()->route('admin.categories.index');
    }
}
