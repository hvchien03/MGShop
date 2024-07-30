@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="row justify-content-around my-5">
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->products as $index => $item)
                    <tr>
                        {{-- {{$product = $products->find($item['product_id'])}} --}}
                        <td style="vertical-align: middle;">{{ $index + 1 }}</td>
                        <td style="padding: 10px;"><img src ="{{ asset('images_upload/' . $products->find($item['product_id'])->image) }}"
                                width="80px" /></td>
                        <td style="vertical-align: middle;">
                            <form action="#" method="post">
                                <input type="number" value="{{ $item['quantity'] }}" name="sl" min="1"
                                    style="width: 70px;" />
                                <button type="submit" class="btn btn-sm">update</button>
                            </form>
                        </td>
                        <td style="vertical-align: middle;">{{ number_format($item['price'], 0, '.', ',')}} VND</td>
                        <td style="vertical-align: middle;">
                            <form action="#" method="post">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('products') }}">Back</a>
        <div class="row justify-content-end mt-3">
            <div class="col-8 col-md-4">
                <h4>Total: {{ number_format($cart->total, 0, '.', ',')}} VND</h4>
                <a href="#" class="btn btn-dark btn-block mt-3">Payment</a>
            </div>
        </div>
    </div>
@endsection
