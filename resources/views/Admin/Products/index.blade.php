@extends('layouts.appadmin')
@section('title', 'Products')
@section('content')
    <a href="{{ route('admin.products.store') }}" class="hover:underline">Add new product</a>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Brand</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center">
                        <img src="{{ asset('images_upload/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 mr-2">
                        <p>{{ $product->name }}</p>
                    </th>
                    <td class="px-6 py-4">{{ $product->description }}</td>
                    <td class="px-6 py-4">{{number_format($product->price, 0, ',', '.')}} VND</td>
                    <td class="px-6 py-4">{{ $product->brand->name }}</td>
                    <td class="px-6 py-4">{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="hover:underline px-1">Show</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="hover:underline px-1">Edit</a>
                        <a href="{{ route('admin.products.destroy', $product->id) }}"
                            class="hover:underline px-1">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
