@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="container">
        <div class="row justify-content-around my-5">
            <h3 class="text-center fs-3 py-3">Order information</h3>
            <div>
                <h5 class="py-2">Fullname: {{ $user->name }}</h5>
                <h5 class="py-2">Email: {{ $user->email }}</h5>
                <h5 class="py-2">Phone: {{ $user->phone }}</h5>
                <h5 class="py-2">Address: {{ $user->address }}</h5>
            </div>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $index => $item)
                        <tr>
                            <td style="vertical-align: middle;">{{ $index + 1 }}</td>
                            <td style="padding: 10px;"><img
                                    src ="{{ asset('images_upload/' . $products->find($item['product_id'])->image) }}"
                                    width="80px" /></td>
                            <td style="vertical-align: middle;">{{ $item['quantity'] }}
                            </td>
                            <td style="vertical-align: middle;">{{ number_format($item['price'], 0, '.', ',') }} VND</td>
                            <td style="vertical-align: middle;">
                                {{ number_format($item['price'] * $item['quantity'], 0, '.', ',') }} VND
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="">
                <h3>Total: {{ number_format($cart->total, 0, '.', ',') }} VND</h3>
                <form action="{{ route('payment') }}" method="post">
                    @csrf
                    <input type="hidden" name="name" value="{{ $user->name }}">
                    <input type="hidden" name="total" value="{{ $cart->total }}">
                    <button type="submit" class="btn btn-outline-danger mt-3" name="cod">Cash on
                        Delivery</button>
                    <button type="submit" class="btn btn-outline-danger mt-3" name="payUrl">Pay by
                        Momo</button>
                </form>
            </div>
        </div>
    </div>
@endsection
