@extends('layouts.app')
@section('title', 'Orders')
@section('content')
<div class="container">
    <div class="row justify-content-around my-5">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach (var item in Model) --}}
                    <tr>
                        <td style="vertical-align: middle;">1</td>
                        <td style="padding: 10px;"><img src="#" width="80px" />Name</td>
                        <td style="vertical-align: middle;">Quantity</td>
                        <td style="vertical-align: middle;">Price</td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
            <h3>Total: 100,000 VND</h3>
        </table>
        <a class="btn btn-danger" href="#">Back</a>
    </div>
</div>
@endsection