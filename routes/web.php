<?php

use Illuminate\Support\Facades\Route;
//add dashborad controller
use App\Http\Controllers\DashboardController;
//add product controller
use App\Http\Controllers\ProductController;
//settings controller
use App\Http\Controllers\SettingController;
//progress controller
use App\Http\Controllers\ProgressController;
//use Auth 
use Illuminate\Support\Facades\Auth;
//use Bar controller
use App\Http\Controllers\BarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'verify.shopify'], function () {

    //route for dashboard from dashboard controller 
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    //route for products from product controller
    Route::get('/products', [ProductController::class,'index'])->name('products');

    //all settings controller routes
    Route::get('/settings', [SettingController::class,'index'])->name('settings');

    //Route::get('store/apidata',[BarController::class,'store'])->name('store.apidata');
    Route::get('store/apidata',[SettingController::class,'addProgressbarScriptTag'])->name('store.apidata');
    Route::get('delete/apidata/{id}',[SettingController::class,'deleteProgressbarScriptTag']);
        

    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');

    Route::get('/customers', function () {
        return view('customers');
    })->name('customers');
});
