@extends('layouts.app')
@section('title', 'Orders')
@section('content')
<div class="container">
    <div class="row justify-content-around my-5">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address / Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment status</th>
                    <th scope="col">Delivery status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach (var item in Model) --}}
                    <tr>
                        <td class="">1</td>
                        <td class="">Quantity</td>
                        <td class="">Quantity</td>
                        <td class="">Quantity</td>
                        <td class="">Quantity</td>
                        <td class="">
                            <a class="hover:underline hover:text-red-500" href="#">Show</a>
                            /
                            <a class="hover:underline hover:text-red-500" href="#">Cancel</a>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
        <a class="text-red-500 hover:underline" href="#">Back</a>
    </div>
</div>
@endsection