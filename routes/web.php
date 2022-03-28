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

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard',function(){
        return view('admin.pages.dashboard');
    })->name('dashboard');

    Route::name('customer.')->group(function(){
        // Savings
        Route::get('/customer-savings','SavingsController@index')->name('savings');
        Route::get('/customer-savings/add-customer','SavingsController@create')->name('add');
        Route::post('/customer-savings/add-customer','SavingsController@store')->name('savings.store');
        Route::get('/customer-savings/edit/{customer}','SavingsController@show')->name('edit');
        Route::post('/customer-savings/edit/{customer}','SavingsController@update')->name('edit.store');
        Route::post('/customer-savings/delete','SavingsController@destroy')->name('savings.delete');

        // Credits
        Route::get('/customer-credits','CreditsController@index')->name('credits');
        Route::get('/customer-credits/new','CreditsController@create')->name('newcredits');
        Route::post('/customer-credits/new','CreditsController@store')->name('newcredits.store');
        Route::get('/customer-credits/edit/{customer}','CreditsController@show')->name('credits.edit');
        Route::post('/customer-credits/edit/{customer}','CreditsController@update')->name('credits.edit.store');
        Route::post('/customer-credits/delete','CreditsController@destroy')->name('credits.delete');
    });


    Route::get('/customer-transaction-savings/deposit/{user}','SavingsController@savingsTransactionDeposit')->name('customer.transaction.deposit');
    Route::post('/customer-transaction-savings/store/{user}','SavingsController@storeSavingsTransactions')->name('customer.transaction.deposit.store');
    Route::get('/customer-transaction-savings/withdraw/{user}','SavingsController@savingsTransactionWithdraw')->name('customer.transaction.withdraw');

    Route::get('/customer-transaction-credits/add/{user}','CreditsController@creditsTransactionAdd')->name('customer.transaction.credits.add');
    Route::get('/customer-transaction-credits/pay/{user}','CreditsController@creditsTransactionPay')->name('customer.transaction.credits.pay');
    Route::post('/customer-transaction-credits/store/{user}','CreditsController@storeCreditsTransactions')->name('customer.transaction.credits.store');

    Route::get('/manage-account',function(){
        return view('admin.pages.account');
    })->name('manage');

    Route::get('/transactions-history-savings','SavingsController@savingsHistory')->name('transactions.savings');
    Route::get('/transactions-history-savings/{user}','SavingsController@userSavingsHistory')->name('transactions.user.savings');
    Route::get('/transactions-history-credits','CreditsController@creditsHistory')->name('transactions.credits');
    Route::get('/transactions-history-credits/{user}','CreditsController@userCreditsHistory')->name('transactions.user.credits');

});
