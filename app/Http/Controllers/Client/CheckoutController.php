<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Orders;
use App\Models\Carts;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Products::all();
        $cart = Carts::where('user_id', Auth::id())->first();
        return view('client.checkout.index', compact('cart', 'user', 'products'));
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function payment(Request $request)
    {
        //tìm đơn hàng của user
        $cart = Carts::where('user_id', Auth::id())->first();
        $order = Orders::where('user_id', Auth::id())->first();
        if (!$order) {
            $order = new Orders();
            $order->user_id = Auth::id();
            $order->orders = [];
        }
        //new order nè
        $newOrder = new \stdClass();
        $newOrder->name = $request->name;
        $newOrder->phone = '1234567890';
        $newOrder->address = '123 Sample Street';
        $newOrder->products = $cart->products;
        $newOrder->date = now()->format('d-m-Y H:i');
        $newOrder->subtotal = $cart->total;
        $newOrder->delivery_status = 'Pending';

        if (isset($_POST['cod'])) {
            $newOrder->payment_status = 'Cash on Delivery';
            $order->push('orders', $newOrder);
            $order->save();
            $cart->delete();
            return redirect()->route('orders');
        } else if (isset($_POST['payUrl'])) {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua ATM MoMo";
            $amount = $request->total;
            $orderId = time() . "";
            $redirectUrl = "http://127.0.0.1:8000/orders";
            $ipnUrl = "http://127.0.0.1:8000/checkout";
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            $newOrder->payment_status = 'Momo payment';

            $order->push('orders', $newOrder);
            $order->save();
            $cart->delete();

            //Just a example, please check more in there
            return redirect(to: $jsonResult['payUrl']);
        }
    }
}
