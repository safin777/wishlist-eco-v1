<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    { 
        $shop = Auth::user();
        $shop_product = $shop->api()->rest('GET', '/admin/products.json')['body'];
        // foreach($shop_product->products as $pro ){
        //     $product_id = $pro->id;
        // }
         return view('products', compact('shop_product'));

    }
}



