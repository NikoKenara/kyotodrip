<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // add product in to cart
    function addToCart(Request $request) {
        dd($request->all());
    }
}
