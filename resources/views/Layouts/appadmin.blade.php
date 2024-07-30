<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>

<body class="font-sans">
    <div class="container mx-auto h-14 flex flex-row items-center columns-3 gap-8 px-4">
        <div class="w-3/12">
            <a href="{{ route('admin.home') }}">Admin</a>
        </div>
        <div class="w-6/12">
            <ul class="flex flex-row justify-around">
                <li class="hover:underline">
                    <a href="{{ route('admin.products.index') }}">Product</a>
                </li>
                <li class="hover:underline">
                    <a href="{{ route('admin.categories.index') }}">Category</a>
                </li>
                <li class="hover:underline">
                    <a href="{{ route('admin.brands.index') }}">Brand</a>
                </li>
                <li class="hover:underline">
                    <a href="#">Order</a>
                </li>
                <li class="hover:underline">
                    <a href="#">User</a>
                </li>
                <li class="hover:underline">
                    <a href="#">Role</a>
                </li>
            </ul>
        </div>
        <div class="w-3/12 text-right">
            <a href="{{ route('logout') }}" class="text-red-500 hover:underline">
                Logout <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </div>
    <div class="container mx-auto">
        @yield('content')
    </div>
</body>

</html>
