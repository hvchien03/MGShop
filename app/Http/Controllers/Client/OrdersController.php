<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        //$orders = Orders::where('user_id', auth()->id())->get();
        // return view('client.orders.index', compact('orders'));
        return view('client.orders.index');
    }
    public function show($id)
    {
        $order = Orders::find($id);
        return view('client.orders.show', compact('order'));
    }
}
