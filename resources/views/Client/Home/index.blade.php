@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="main">
        <div class="container-fluid p-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="#"><img
                                src="https://www.monsgeek.com/wp-content/uploads/2023/09/M6-banner-0916-2.jpg"
                                class="d-block w-100" alt="MoonsGeek M6"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="#"><img
                                src="https://www.monsgeek.com/wp-content/uploads/2023/07/M1-banner1-0714-1.jpg"
                                class="d-block w-100" alt="MoonsGeek M1"></a>
                    </div>
                    <div class="carousel-item">
                        <a href="#"><img
                                src="https://www.monsgeek.com/wp-content/uploads/2023/08/M1W-Fully-Assembled-Banner-0827.jpg"
                                class="d-block w-100" alt="MoonsGeek M1W"></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <!-- @*-------------------------------------------------------*@ -->
    <div class="container p-0 pt-4">
        <div class="card mb-3" style="border-radius: 0; border: none;">
            <div class="row g-0">
                <div class="col-md-7">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/08/Front_M1W_0827.jpg" class="img-fluid"
                        alt="M1W">
                </div>
                <div class="col-md-5">
                    <div class="card-body p-3">
                        <h5 class="card-title fs-2">@lang('messages.New Arrival')! M1W Fully Assembled</h5>
                        <p class="card-text">75% 82-Key Layout with Knob</p>
                        <p class="card-text">V3 Piano Pro Switches</p>
                        <p class="card-text">Side-printed Shine-through Gradient Keycaps</p>
                        <p class="card-text">Multi Modes & Gasket-mounted & South-facing PCB</p>
                        <a class="btn bg-black text-white" href="#">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @*-------------------------------------------------------*@ -->
    <div class="container p-0 pt-4">
        <div class="card mb-3" style="border-radius: 0; border: none;">
            <div class="row g-0">
                <div class="col-md-5">
                    <div class="card-body p-3">
                        <h5 class="card-title fs-2">@lang('messages.New Arrival')! M1W Fully Assembled</h5>
                        <p class="card-text">75% 82-Key Layout with Knob</p>
                        <p class="card-text">V3 Piano Pro Switches</p>
                        <p class="card-text">Side-printed Shine-through Gradient Keycaps</p>
                        <p class="card-text">Multi Modes & Gasket-mounted & South-facing PCB</p>
                        <a class="btn bg-black text-white" href="#">@lang('messages.More detail')</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/08/Front_M1W_0827.jpg" class="img-fluid"
                        alt="M1W">
                </div>

            </div>
        </div>
    </div>
    <!-- @*-------------------------------------------------------*@ -->
    <div class="container p-0 pt-4">
        <div class="card mb-3" style="border-radius: 0; border: none;">
            <div class="row g-0">
                <div class="col-md-7">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/08/Front_M1W_0827.jpg" class="img-fluid"
                        alt="M1W">
                </div>
                <div class="col-md-5">
                    <div class="card-body p-3">
                        <h5 class="card-title fs-2">@lang('messages.New Arrival')! M1W Fully Assembled</h5>
                        <p class="card-text">75% 82-Key Layout with Knob</p>
                        <p class="card-text">V3 Piano Pro Switches</p>
                        <p class="card-text">Side-printed Shine-through Gradient Keycaps</p>
                        <p class="card-text">Multi Modes & Gasket-mounted & South-facing PCB</p>
                        <a class="btn bg-black text-white" href="#">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- @*-------------------------------------------------------*@ -->
    <div class="container">
        <div class="row my-4">
            <div class="col-6 col-md-3 my-3">
                <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px;">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/09/M6-banner-0916-2.jpg"
                        class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 chiếc bàn phím phù hợp cho góc làm việc tối giản</h5>
                        <p class="card-text text-truncate">Một góc làm việc theo xu hướng “minimalist” cũng cần những chiếc
                            bàn phím gọn gàng và chỉn chu. Bài viết này Keychron VN sẽ giới thiệu với các bạn 5 chiếc bàn
                            phím cơ phù hợp cho góc setup tối giản nhưng không kém phần hiện đại.</p>
                        <a href="#" class="btn btn-dark d-none d-lg-block">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-3">
                <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px;">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/09/M6-banner-0916-2.jpg"
                        class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 chiếc bàn phím phù hợp cho góc làm việc tối giản</h5>
                        <p class="card-text text-truncate">Một góc làm việc theo xu hướng “minimalist” cũng cần những chiếc
                            bàn phím gọn gàng và chỉn chu. Bài viết này Keychron VN sẽ giới thiệu với các bạn 5 chiếc bàn
                            phím cơ phù hợp cho góc setup tối giản nhưng không kém phần hiện đại.</p>
                        <a href="#" class="btn btn-dark d-none d-lg-block">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-3">
                <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px;">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/09/M6-banner-0916-2.jpg"
                        class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 chiếc bàn phím phù hợp cho góc làm việc tối giản</h5>
                        <p class="card-text text-truncate">Một góc làm việc theo xu hướng “minimalist” cũng cần những chiếc
                            bàn phím gọn gàng và chỉn chu. Bài viết này Keychron VN sẽ giới thiệu với các bạn 5 chiếc bàn
                            phím cơ phù hợp cho góc setup tối giản nhưng không kém phần hiện đại.</p>
                        <a href="#" class="btn btn-dark d-none d-lg-block">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 my-3">
                <div class="card" style="max-width: 18rem; min-width: 10rem; border-radius: 3px;">
                    <img src="https://www.monsgeek.com/wp-content/uploads/2023/09/M6-banner-0916-2.jpg"
                        class="card-img-top img-fluid" style="height: 200px; max-width: 100%; object-fit: cover;"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Top 5 chiếc bàn phím phù hợp cho góc làm việc tối giản</h5>
                        <p class="card-text text-truncate">Một góc làm việc theo xu hướng “minimalist” cũng cần những chiếc
                            bàn phím gọn gàng và chỉn chu. Bài viết này Keychron VN sẽ giới thiệu với các bạn 5 chiếc bàn
                            phím cơ phù hợp cho góc setup tối giản nhưng không kém phần hiện đại.</p>
                        <a href="#" class="btn btn-dark d-none d-lg-block">@lang('messages.More detail')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
