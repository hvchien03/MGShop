@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div class="row">
    <div class="row" style="height: 620px;">
        <div class="col-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0672956497715!2d106.62608107465596!3d10.80615788934447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752be27d8b4f4d%3A0x92dcba2950430867!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBUaMawxqFuZyBUUC4gSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1701400505030!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-5 mt-3" style="text-align: justify">
            <h5 class="text-uppercase mb-4 font-weight-bold text-warning">@lang('messages.Contact')</h5>
            <p>
                @lang('messages.Address'): 140 Le Trong Tan, Tay Thanh, Tan Phu, Ho Chi Minh
            </p>
            <p>
                @lang('messages.Email'): chienvan1203@gmail.com
            </p>
            <p>
                @lang('messages.Phone'): +84263549824
            </p>
            <p>
                @lang('messages.Hotline'): +84263549824
            </p>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <h4>@lang('messages.TechKeys Support')</h4>
    </div>
    <div class="row">
        <form action="/home/contact" method="post" style="height: 300px;">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5 class="form-label">@lang('messages.Name')</h5>
                    <input class="form-control" type="text" style="border-radius: 0;" />
                </div>
                <div class="col-12 col-md-6">
                    <h5 class="form-label">@lang('messages.Email')</h5>
                    <input class="form-control" type="text" style="border-radius: 0;" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 class="form-label">@lang('messages.Message')</h5>
                    <input class="form-control" type="text" style="border-radius: 0;" />
                </div>
            </div>
            <div class="col-3 mt-3">
                <button class="btn btn-dark my-3 text-white" type="submit" style="border-radius: 0;">@lang('messages.Send')</button>
            </div>
        </form>
    </div>
</div>
@endsection