@extends('layouts.app')
@section('title', 'Products')
@section('content')
    {{-- <!-- @*-------------------------Layout------------------------------*@ -->
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=ARISU 65%&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">Arisu 65%</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=65%&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">65%</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=75%&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">75%</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=TKL&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">Tkl</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=1800 COMPACT&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">1800 Compact</p>
            </a>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
            <a class="text-center d-flex flex-column align-items-center text-decoration-none" href="/products/index?layout=FULLSIZE&sort=@ViewBag.sort1&search=@ViewBag.search">
                <img src="{{ asset('img_layout/Layout1.png') }}" width="116px">
                <p class="text-black-50" style="font-size:14px;">Full size</p>
            </a>
        </div>
    </div>
</div> --}}
    <!-- @*-------------------------------------------------------*@ -->
    <div class="dropdown my-3" style="height:50px">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @lang('messages.Sort by')
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item"
                    href="{{ route('products', array_merge(request()->query(), ['sort_by' => 'price', 'sort_order' => 'asc'])) }}">Low
                    to High</a></li>
            <li><a class="dropdown-item"
                    href="{{ route('products', array_merge(request()->query(), ['sort_by' => 'price', 'sort_order' => 'desc'])) }}">High
                    to Low</a></li>
        </ul>
    </div>
    <div id="products-list" class="row d-flex f-wrap justify-content-center">
        @foreach ($products as $product)
            <div class="col-6 col-md-4 col-lg-3 my-3">
                <a href="/products/{{ $product->_id }}" class="text-decoration-none text-black">
                    <div class="card"
                        style="max-width: 18rem; min-width: 10rem; border-radius: 3px; box-shadow: 0 0 10px 5px rgb(221, 226, 230);">
                        <img src="{{ asset('images_upload/' . $product->image) }}" class="card-img-top img-fluid"
                            style="height: 200px; max-width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-truncate" style="overflow: hidden; font-size: 100%;">
                                {{ $product->name }}</h5>
                            <p class="card-text text-danger">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                            <p class="card-text text-truncate">{{ $product->description }}</p>
                            <div class="mx-auto justify-content-around d-lg-inline d-none">
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="text" hidden name="product_id" value="{{ $product->_id }}">
                                    <input type="number" hidden name="quantity" value="1">
                                    <a href="/products/{{ $product->_id }}" class="btn btn-dark my-3"
                                        style="border-radius: 3px;">@lang('messages.More detail')</a>
                                    <button type="submit" class="btn btn-outline-danger" style="border-radius: 3px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                                            <path
                                                d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="mb-5">
        {{ $products->appends(request()->query())->links() }}
    </div>
@endsection
@section('scripts')
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            axios.get('/api/products')
                .then(function(response) {
                    const products = response.data;
                    const productsList = document.getElementById('products-list');

                    products.forEach(function(product) {
                        const div = document.createElement('div');
                        div.classList.add('col-6', 'col-md-4', 'col-lg-3', 'my-3');
                        div.innerHTML = `
                                <a href="/products/${product._id}" class="text-decoration-none text-black">
                                    <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px; box-shadow: 0 0 10px 5px rgb(221, 226, 230);">
                                        <img src="${product.image}" class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate" style="overflow: hidden; font-size: 100%;">${product.name}</h5>
                                            <p class="card-text text-danger">${product.price}</p>
                                            <p class="card-text text-truncate">${product.description}</p>
                                            <div class="mx-auto justify-content-around d-lg-inline d-none">
                                                <form action="#" method="post">
                                                    <a href="#" class="btn btn-dark my-3" style="border-radius: 3px;">Xem chi tiết</a>
                                                    <button type="submit" class="btn btn-outline-danger" style="border-radius: 3px;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        `;
                        productsList.appendChild(div);
                    });
                })
                .catch(function(error) {
                    console.error('Có lỗi xảy ra:', error);
                });
        });
    </script> -->
@endsection
