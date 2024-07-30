@extends('layouts.appadmin')
@section('title', 'Brands')
@section('content')
    <form action="{{ route('admin.brands.store') }}" method="POST" class="mt-10">
        @csrf
        <input
            class="mx-5 w-60 h-10 px-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500"
            type="text" name="name" placeholder="Brand name">
        <button class="border border-orange-300 w-60 h-10 px-3 rounded-md hover:bg-orange-300 hover:text-white"
            type="submit">Add new brand</button>
        @if ($errors->has('name'))
            <span class="text-red-500 ml-5">{{ $errors->first('name') }}</span>
        @endif
    </form>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-10">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Brand name</th>
                <th scope="col" class="px-6 py-3">Products</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex items-center">
                        {{ $brand->name }}
                    </th>
                    <td class="px-6 py-4">{{$products->where('brand_id', $brand->_id)->count()}}</td>
                    <td>
                        <a href="{{route('admin.brands.edit', $brand->_id)}}" class="hover:underline px-1">Edit</a>
                        <a href="{{route('admin.brands.destroy', $brand->_id)}}" class="hover:underline px-1">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
