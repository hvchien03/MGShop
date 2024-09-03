@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="row justify-content-around">
        <form action="" method="POST">
            @csrf
            <div class="col-md-6 py-3 my-3 mx-auto">
                <h3 class="text-center py-3">@lang('messages.Login')</h3>
                <div class="col-12 py-3">
                    <input type="text" name="email" placeholder="Email" class="form-control rounded-0" required
                        @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
                </div>
                <div class="col-12 py-3">
                    <input type="password" name="password" placeholder="@lang('messages.Password')" class="form-control rounded-0"
                        required @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                </div>
                <div class="form-check py-3">
                    <input class="form-check-input" name="remember" type="checkbox" value="on" id="flexCheckDefault"
                        @if (isset($_COOKIE['email'])) checked @endif>
                    <label class="form-check-label" for="flexCheckDefault">
                        @lang('messages.Remember me')
                    </label>
                </div>
                <div class="col-12 py-3">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <button class="btn d-block btn-dark form-control" type="submit" style="border-radius: 0;" />@lang('messages.Login')
                </div>
                <a href="{{ route('register') }}" class="hover:underline hover:text-red-500">@lang('messages.Create an account')</a>
            </div>
        </form>
    </div>
@endsection
