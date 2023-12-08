<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);

        return view('frontend.orders.index', compact('orders'));
    }

    public function view($orderId)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('Id', $orderId)->first();
        if ($order) {
            return view('frontend.orders.view', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }
}
