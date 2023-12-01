<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }
}
