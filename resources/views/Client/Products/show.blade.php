@extends('layouts.app')
@section('title', 'Detail')
@section('content')
<div class="row">
    <div class="card mb-3 mt-5" style="max-width: 100%; border: none">
        <div class="row g-0">
            <div class="col-md-7">
                <img src="{{ asset('images_upload/' . $product->image) }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-5">
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 30px;">{{ $product->name }}</h1>
                    <p class="card-text text-danger" style="font-size: 20px;">{{number_format($product->price, 0, ',', '.')}} VND</p>
                    <p class="card-text">Bàn Phím Cơ MONSGEEK M1W RGB Mạch Xuôi kết nối 3 chế độ (Nhôm CNC, Gasket Mount)</p>
                    <p class="card-text">Layout: 75% (82 phím)</p>
                    <p class="card-text">Kết nối 3 Mode: USB type C - Bluetooth - Wireless 2.4G</p>
                    <p class="card-text">Led RGB</p>
                    <p class="card-text">Pin 6000 mAh</p>
                    <p class="card-text">Case nhôm CNC | Hotswap RGB</p>
                    <p class="card-text">Mạch xuôi | Gasket mount</p>
                    <p class="card-text">Plate PC</p>
                    <p class="card-text">Switch: Cream Yellow / Cream Blue</p>
                    <p class="card-text">Stab PCB mount</p>
                    <select class="form-select" aria-label="Default select example">
                        <option value="" selected>Choose an option</option>
                        <option value="Black">Black</option>
                        <option value="Silver">Silver</option>
                        <option value="Purple">Purple</option>
                    </select>
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <input type="text" hidden name="product_id" value="{{$product->_id}}">
                        <input type="number" name="quantity" value="1" min="1" hidden />
                        <button class="btn my-3 text-center" type="submit" style="border-radius: 3px; background-color:gray;   width: 200px; height: 40px; color: white;">@lang('messages.Add to cart')</button>
                        <button class="btn my-3 text-center" type="submit" style="border-radius: 3px; background-color: gray; width: 200px; height: 40px; color: white;">@lang('messages.Buy now')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-7" style="text-align: justify">
        <h5 class="card-text">{{ $product->description }}</h5>
        <p class="card-text">Bàn Phím Cơ MONSGEEK M1W RGB Mạch Xuôi kết nối 3 chế độ (Nhôm CNC, Gasket Mount)</p>
        <p class="card-text">LƯU Ý: KIT chưa bao gồm switch và keycap</p>
        <p class="card-text">Mod Full Phím bao gồm:</p>
        <p class="card-text">- Lube switch full</p>
        <p class="card-text">- Mod stab</p>
        <p class="card-text">- Tape mod</p>
        <p class="card-text">- Foam pe</p>
        <p class="card-text">- Foam đáy</p>
        <p class="card-text">- Khách hàng chọn option "Mod Full Phím" sẽ chọn switch Cream Yellow hoặc Cream Blue note lại giúp shop ở trong phần tin nhắn</p>
        <p class="card-text">
            - Khách hàng chọn option "Mod Full + Sw Bất Kì" sẽ bao gồm các switch (Haze Pink, Piano, Wine Red) và chọn switch khách hàng muốn rồi note lại giúp shop ở trong phần tin nhắn
        </p>
        <div class="container my-3">
            <iframe width="700" height="415" src="https://www.youtube.com/embed/iRKeuwFn_m4?si=FWjEOZA5p5QphogP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <!-- width="560" height="315" -->
    </div>
    <!-- sp liên quan -->
    <div class="col-12 col-md-5">
        <h3>Các sản phẩm liên quan</h3>
        @foreach ($products as $item)
        <div class="col-12 my-3">
            <a href="/products/{{$item->_id}}" class="text-decoration-none text-black">
                <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px; box-shadow: 0 0 10px 5px rgb(221, 226, 230);">
                    <img src="{{ asset('images_upload/' .$item->image)}}" class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-truncate" style="overflow: hidden; font-size: 100%;">{{$item->name}}</h5>
                        <p class="card-text text-danger">{{$item->price}}</p>
                        <p class="card-text text-truncate">{{$item->description}}</p>
                        <div class="mx-auto justify-content-around d-lg-inline d-none">
                            <form action="#" method="post">
                                <a href="/products/{{$item->_id}}" class="btn btn-dark my-3" style="border-radius: 3px;">@lang('messages.More detail')</a>
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
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('scripts')
<!-- <script>
    axios.get('api/products/{id}')
        .then(function (response) {
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
</script> -->
@endsection