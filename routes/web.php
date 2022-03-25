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

Route::get('/credit',function(){
    return view('user.credit');
});

Route::get('/view-details',function(){
    return view('user.view-details');
});

Route::get('/pay-credit',function(){
    return view('user.pay-credit');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard',function(){
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::get('/customer-savings',function(){
        return view('admin.pages.savings.index');
    })->name('customer.savings');

    Route::get('/customer-savings/edit',function(){
        return view('admin.pages.savings.form');
    })->name('customer.edit');

    Route::get('/customer-savings/add-customer',function(){
        return view('admin.pages.savings.form');
    })->name('customer.add');

    Route::get('/customer-transaction-add',function(){
        return view('admin.pages.transactions.form');
    })->name('customer.transaction.form');

    Route::get('/customer-credits',function(){
        return view('admin.pages.credits.index');
    })->name('customer.credits');

    Route::get('/customer-credits/new',function(){
        return view('admin.pages.credits.form');
    })->name('customer.newcredits');

    Route::get('/manage-account',function(){
        return view('admin.pages.account');
    })->name('manage');

    Route::get('/transactions-history-savings',function(){
        return view('admin.pages.history.savings.list');
    })->name('transactions.savings');

    Route::get('/transactions-history-credits',function(){
        return view('admin.pages.history.credits.list');
    })->name('transactions.credits');
});
