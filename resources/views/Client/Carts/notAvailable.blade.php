@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="row justify-content-around my-5">
        <h3 class="text-center py-3">
            Not available !!!</h3>
        <a href="{{route('products')}}" class="text-decoration-none text-white btn btn-dark" style="width: 200px;">Back</a>
    </div>
@endsection
