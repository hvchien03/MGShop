@extends('layouts.appadmin')
@section('title', 'Add New Product')
@section('content')
    <p class="text-center mt-32">Add new product</p>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex bg-gray-200 rounded-md">
            <div class="w-1/2 p-3">
                <div class="h-20">
                    <label for="name" class="">Name
                        @if ($errors->has('name'))
                            <span class="text-red-500 float-right">{{ $errors->first('name') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <input type="text" class="w-full rounded-md h-8 pl-1" placeholder="" value="{{old('name')}}" name="name">
                    </div>
                </div>
                <div class="h-20">
                    <label for="price" class="">Price
                        @if ($errors->has('price'))
                            <span class="text-red-500 float-right">{{ $errors->first('price') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <input type="number" min="0" class="w-full rounded-md h-8 pl-1" placeholder=""
                            name="price" value="{{old('price')}}">
                    </div>
                </div>
                <div class="h-20">
                    <label for="brand_id" class="">Brand
                        @if ($errors->has('brand_id'))
                            <span class="text-red-500 float-right">{{ $errors->first('brand_id') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <select class="w-full rounded-md h-8" name="brand_id">
                            <option value="" selected>Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="h-20">
                    <label for="category_id" class="">Category
                        @if ($errors->has('category_id'))
                            <span class="text-red-500 float-right">{{ $errors->first('category_id') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <select class="w-full rounded-md h-8" name="category_id">\
                            <option value="" selected>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-1/2 p-3">
                <div class="h-20">
                    <label for="file_upload" class="">Image
                        @if ($errors->has('image'))
                            <span class="text-red-500 float-right">{{ $errors->first('image') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <input type="file"
                            class="
                        block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-md file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100"
                            name="image">
                    </div>
                </div>
                <div class="h-20">
                    <label for="description" class="">Description
                        @if ($errors->has('description'))
                            <span class="text-red-500 float-right">{{ $errors->first('description') }}</span>
                        @endif
                    </label>
                    <div class="mt-2">
                        <textarea class="w-full rounded-md h-48 pl-1 pt-1" placeholder="" name="description">{{old('description')}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full p-3">
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md px-4 py-2">Save</button>
        </div>
    </form>
@endsection
