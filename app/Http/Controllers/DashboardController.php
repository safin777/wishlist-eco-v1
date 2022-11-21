<?php

namespace App\Http\Controllers;
//add auth facade
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        $shop = Auth::user();
        $shopApi = $shop->api()->rest('GET', '/admin/shop.json')['body'];
        $shop_products = $shop->api()->rest('GET', '/admin/products.json')['body'];   
        $count_products = $shop_products->products;  
        return view('dashboard', compact('count_products'));
        //return json_encode($shopApi);
        
        

    }
}
