@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="row justify-content-around">
        <div class="col-md-6 py-3 my-3 mx-auto">
            <h3 class="text-center py-3">Create Account</h3>
            <form action="" method="POST">
                @csrf
                <div class="col-12 py-3">
                    <input type="email" name="email" placeholder="Email" class="form-control rounded-0"
                        value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <input type="text" name="name" placeholder="Name" class="form-control rounded-0"
                        value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <input type="password" name="password" placeholder="Your Password" class="form-control rounded-0">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="form-control rounded-0">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <input type="text" name="phone" placeholder="Phone Number" class="form-control rounded-0"
                        value="{{ old('phone') }}">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <input type="text" name="address" placeholder="Address" class="form-control rounded-0"
                        value="{{ old('address') }}">
                    @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="col-12 py-3">
                    <button class="btn d-block btn-dark form-control" type="submit"
                        style="border-radius: 0;">Register</button>
                </div>
            </form>
            <a href="{{ route('login') }}" class="hover:underline hover:text-red-500">Already have an account?</a>
        </div>
    </div>
@endsection
