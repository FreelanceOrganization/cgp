<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user',function(){
    return view('user.balance');
});

Route::get('/details',function(){
    return view('user.view-details');
});

Route::prefix('admin')->group(function(){
    Route::get('/testing',function(){
        return view('admin.pages.dashboard');
    })->name('admin.dashboard');

    Route::get('/customer/savings',function(){
        return view('admin.pages.savings.index');
    })->name('admin.customer.savings');

    Route::get('/customer/savings/new',function(){
        return view('admin.pages.savings.form');
    })->name('admin.customer.newsavings');

    Route::get('/customer/credits',function(){
        return view('admin.pages.credits.index');
    })->name('admin.customer.credits');

    Route::get('/customer/credits/new',function(){
        return view('admin.pages.credits.form');
    })->name('admin.customer.newcredits');

});
