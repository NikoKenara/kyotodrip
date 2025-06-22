<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // add product in to cart
    function addToCart(Request $request) {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
        $productSize = $product->productSizes->where('id', $request->product_size)->first();
        $productOptions = $product->productOptions->whereIn('id', $request->product_option);

        $options = [
            'product_size' => [
                'id' => $productSize->id,
                'name' => $productSize->name,
                'price' => $productSize->price
            ],
            'product_options' => []
        ];

        foreach($productOptions as $option) {
            $options['product_options'][] = [
                'id' => $option->id,
                'name' => $option->name,
                'price' => $option->price
            ];
        }

        dd($options);
    }
}
