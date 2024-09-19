@extends('layouts.app')
@section('title', 'Orders')
@section('content')
    <div class="container">
        <div class="row justify-content-around my-5">
            <div class="bg-white shadow-md rounded-lg p-6">
                <p class="text-2xl font-bold mb-4">User ID: {{ $user_orders['user_id'] }}</p>
                @foreach ($user_orders['orders'] as $order)
                    <div class="flex justify-between items-start bg-gray-50 p-4 mb-4 rounded-lg border border-gray-200">
                        <div class="flex">
                            <div class="mr-8">
                                <p class="text-lg font-semibold">Name: <span class="font-normal">{{ $order['name'] }}</span>
                                </p>
                                <p class="text-lg font-semibold">Phone: <span
                                        class="font-normal">{{ $order['phone'] }}</span>
                                </p>
                                <p class="text-lg font-semibold">Address: <span
                                        class="font-normal">{{ $order['address'] }}</span></p>
                                <p class="text-lg font-semibold">Date: <span class="font-normal">{{ $order['date'] }}</span>
                                </p>
                                <p class="text-lg font-semibold">Total: <span
                                        class="font-normal">{{ number_format($order['subtotal']) }} VND</span></p>
                                <p class="text-lg font-semibold">Payment status: <span
                                        class="font-normal">{{ $order['payment_status'] }}</span></p>
                                <p class="text-lg font-semibold">Delivery status: <span
                                        class="font-normal">{{ $order['delivery_status'] }}</span></p>
                            </div>
                            @if (isset($order['products']))
                                <div class="mr-8">
                                    <p class="text-xl font-semibold mb-2">Products:</p>
                                    @foreach ($order['products'] as $product)
                                        <div class="bg-gray-100 p-3 mb-2 rounded-lg">
                                            <p class="text-lg font-semibold">Product ID: <span
                                                    class="font-normal">{{ $product['product_id'] }}</span></p>
                                            <p class="text-lg font-semibold">Quantity: <span
                                                    class="font-normal">{{ $product['quantity'] }}</span></p>
                                            <p class="text-lg font-semibold">Price: <span
                                                    class="font-normal">{{ number_format($product['price']) }} VND</span>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center space-x-4">
                            <a class="text-blue-500 hover:underline hover:text-blue-700" href="#">Show</a>
                            <a class="text-red-500 hover:underline hover:text-red-700" href="#">Cancel</a>
                        </div>
                    </div>
                @endforeach
                <a class="text-red-500 hover:underline" href="{{route('home')}}">Back</a>
            </div>
        </div>
    </div>
    </div>
@endsection
