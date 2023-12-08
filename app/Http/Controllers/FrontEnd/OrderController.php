<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return view('frontend.orders.index');
    }
}
