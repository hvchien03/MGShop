<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- @*--------------------------Navbar-----------------------------*@ -->
    <div class="header">
        <header class="py-3 border-bottom" style="background-color: black">
            <div class="container text-center">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <strong class="fs-4 text-white">Techkeys</strong>
                </a>
            </div>
        </header>
        <nav class="py-2 bg-body-tertiary border-bottom">
            <div class="container d-flex flex-wrap">
                <ul class="nav me-auto row">
                    <li class="nav-item col-4 col-md-2 py-2"><a href="{{ route('products') }}"
                            class="nav-link link-body-emphasis px-2">All</a></li>
                    <li class="nav-item col-4 col-md-3 py-2"><a
                            href="{{ route('products', ['category' => '668f5a8fdf1c72e7a2622001']) }}"
                            class="nav-link link-body-emphasis px-2">Keyboard</a></li>
                    <li class="nav-item col-4 col-md-1 py-2 "><a
                            href="{{ route('products', ['category' => '66892c3c7e2f2c6beb0f2b84']) }}"
                            class="nav-link link-body-emphasis px-2">Kit</a></li>
                    <li class="nav-item col-4 col-md-2 py-2"><a
                            href="{{ route('products', ['category' => '66892c5e7e2f2c6beb0f2b86']) }}"
                            class="nav-link link-body-emphasis px-2">Switch</a></li>
                    <li class="nav-item col-4 col-md-2 py-2"><a
                            href="{{ route('products', ['category' => '66892c577e2f2c6beb0f2b85']) }}"
                            class="nav-link link-body-emphasis px-2">Keycap</a></li>
                    <li class="nav-item col-4 col-md-2 py-2"><a href="{{ route('contact') }}"
                            class="nav-link link-body-emphasis px-2">Contact</a></li>
                </ul>
                <ul class="nav">
                    <li class="nav-item py-2">
                        <form action="{{ route('products') }}" method="get" class="d-flex" role="search">
                            <input class="form-control me-2 border-black" value="" name="search"
                                style="width:330px; height: 40px; border-radius: 0" type="search"
                                placeholder="Search..." aria-label="Search">
                        </form>

                    </li>
                    <li class="nav-item py-2 px-3">
                        <a href="{{ route('cart') }}"
                            class="nav-link link-body-emphasis px-2 d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            <p class="d-lg-none m-0 ms-2">Cart</p>
                        </a>
                    </li>


                    @if (Auth::check())
                        <li class="nav-item py-2 px-1">
                            <a href="#" class="mx-3 mt-2 d-block">{{ Auth::User()->name }}</a>
                        </li>
                        <li class="nav-item py-2 px-1">

                            <a href="{{ route('logout') }}" class="text-red-500 hover:underline mx-3 mt-2 d-block">
                                 <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                        </li>
                    @else
                        <li class="nav-item ms-2 py-2">
                            <a href="{{ route('login') }}"
                                class="nav-link link-body-emphasis px-2 btn btn-outline-danger d-flex align-items-center rounded-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                                </svg>
                                <p class="d-lg-none m-0 ms-2">Đăng nhập</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
    <!-- @*-------------------------------------------------------*@ -->
    <div class="container">
        @yield('content')
    </div>
    <!-- @*--------------------------footer-----------------------------*@ -->
    <footer class="bg-black text-white pt-5 pb-4">
        <div class="container text-center text-md-left">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Techkeys</h5>
                    <p style="text-align: justify">
                        Chào mừng bạn đến với TechKeys - Thế giới của bàn phím cơ đỉnh cao.
                        Chúng tôi tự hào cung cấp một bộ sưu tập đa dạng về bàn phím cơ chất lượng hàng đầu, với các
                        tính năng và thiết kế độc đáo.
                        Khám phá ngay và trải nghiệm sự khác biệt cùng TechKeys!
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3" style="text-align: justify">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Sản phẩm</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Bàn phím</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Kit</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Switch</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Keycap</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3" style="text-align: justify">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Userfull links</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Your account</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Become an Affiliates</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Help</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3" style="text-align: justify">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Liên hệ</h5>
                    <p>
                        Địa chỉ: 140 Lê Trọng Tấn, Tây Thạnh, Tân Phú, Thành phố Hồ Chí Minh
                    </p>
                    <p>
                        Email: chienvan1203@gmail.com
                    </p>
                    <p>
                        Phone: +84263549824
                    </p>
                    <p>
                        Hotline: +84263549824
                    </p>
                </div>
            </div>
        </div>
        <!-- Kết nối với chúng tôi -->
        <div class="container text-center py-3">
            <div class="row text-center">

                <div class="col-md-12 col-lg-6 col-xl-6 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Kết nối với chúng tôi</h5>
                    <div class="d-flex justify-content-center">
                        <p class="mx-3">
                            <a href="#" class="text-white" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                            </a>
                        </p>
                        <p class="mx-3">
                            <a href="#" class="text-white" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                </svg>
                            </a>
                        </p>
                        <p class="mx-3">
                            <a href="#" class="text-white" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                </svg>
                            </a>
                        </p>
                        <p class="mx-3">
                            <a href="#" class="text-white" style="text-decoration: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                    <path
                                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                </svg>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6 mx-auto my-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Nhận mail từ TechKeys</h5>
                    <form class="row d-flex justify-content-center">
                        <div class="col-md-12 justify-content-center d-flex">
                            <input type="text" class="form-control text-black-50" placeholder="Email Address"
                                style="width:250px; height:35px; border-radius: 0">
                            <button type="submit" class="btn btn-danger" style="height:35px; border-radius: 0">Xác
                                nhận</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <p>Đăng ký nhận thông báo từ TechKeys để không bỏ lỡ các chương trình khuyến mãi.</p>
                <p class="text-white-50 fw-lighter">Copyright 2023 © <span class="text-white fw-lighter">TechKeys Việt
                        Nam</span></p>
            </div>
        </div>
    </footer>
    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
