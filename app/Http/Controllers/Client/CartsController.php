<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Model\BSONArray;

class CartsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        $cart = Carts::where('user_id', auth()->id())->first();
        if (!$cart) {
            return view('client.carts.notAvailable');
        }
        return view('client.carts.index', compact('cart', 'products'));
    }
    public function add(Request $request)
    {
        $pro = Products::find($request->product_id);
        $product = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $pro->price
        ];
        $cart = Carts::firstOrCreate(['user_id' => Auth::id()]);
        $cart->addToCart($product);
        return redirect()->route('cart');
    }
    // lõi chỗ này
    // public function add(Request $request)
    // {
    //     $cart = Carts::where('user_id', auth()->id())->first();
    //     if (!$cart) {
    //         $cart = Carts::create([
    //             'user_id' => auth()->id(),
    //             'products' =>  new BSONArray([])
    //         ]);
    //     }
    //     //dd($cart);
    //     // Đảm bảo products là một mảng
    //     // if (!is_array($cart->products)) {
    //     //     $cart->products = [];
    //     // }

    //     // Tìm sản phẩm trong giỏ hàng
    //     $productIndex = collect($cart->products)->search(function ($product) use ($request) {
    //         return $product['product_id'] == $request->product_id;
    //     });

    //     if ($productIndex !== false) {
    //         // Cập nhật số lượng
    //         $cart->products[$productIndex]['quantity'] += $request->quantity;
    //     } else {
    //         // Thêm sản phẩm mới vào giỏ hàng
    //         $cart->products[] = [
    //             'product_id' => $request->product_id,
    //             'quantity' => $request->quantity
    //         ];
    //     }
    //     //dd($cart);

    //     // Lưu lại thay đổi vào MongoDB
    //     $cart->save();

    //     return redirect()->route('cart');
    // }
}
