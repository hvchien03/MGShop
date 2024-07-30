@extends('layouts.appadmin')
@section('title', 'Edit category')
@section('content')
    <form action="{{ route('admin.categories.edit', $cate->_id) }}" method="POST" class="mt-10">
        @csrf
        <input
            class="mx-5 w-60 h-10 px-3 rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500"
            type="text" name="name" placeholder="Category name" value="{{$cate->name}}">
        <button class="border border-orange-300 w-60 h-10 px-3 rounded-md hover:bg-orange-300 hover:text-white"
            type="submit">Save category</button>
        @if ($errors->has('name'))
            <span class="text-red-500 ml-5">{{ $errors->first('name') }}</span>
        @endif
    </form>
@endsection
