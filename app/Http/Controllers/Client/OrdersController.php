<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;

class OrdersController extends Controller
{
    public function index()
    {
        $user_orders = Orders::where('user_id', Auth::id())->first();
        if (!$user_orders) {
            return redirect()->route('home');
        }
        return view('client.orders.index', compact('user_orders'));
    }
    public function show($id)
    {
        $order = Orders::find($id);
        return view('client.orders.show', compact('order'));
    }
}
