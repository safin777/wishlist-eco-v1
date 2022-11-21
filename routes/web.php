<?php

use Illuminate\Support\Facades\Route;
//add dashborad controller
use App\Http\Controllers\DashboardController;

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
   

    Route::get('/products', function () {
        return view('products');
    })->name('products');

    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');

    Route::get('/customers', function () {
        return view('customers');
    })->name('customers');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    

});
