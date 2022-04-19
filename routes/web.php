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

Route::get('/', 'AuthController@form')->name('login');
Route::post('/', 'AuthController@login')->name('login.send');

Route::get('/user','UserController@customerBalance')->name('customer');
Route::get('/credit','UserController@customerCredits')->name('credits');
Route::get('/view-details/{transaction}','UserController@TransactionDetails')->name('details');
Route::get('/pay-credit','UserController@payCreditForm')->name('pay.credit');
Route::get('/about','UserController@about')->name('about');

Route::any('/logout','AuthController@logout')->name('logout');

Route::middleware(['auth'])->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::name('customer.')->group(function(){
        // Savings
        Route::get('/customer-savings','SavingsController@index')->name('savings');
        Route::get('/customer-savings/add-customer','SavingsController@create')->name('add');
        Route::post('/customer-savings/add-customer','SavingsController@store')->name('savings.store');
        Route::get('/customer-savings/edit/{customer}','SavingsController@show')->name('edit');
        Route::post('/customer-savings/edit/{customer}','SavingsController@update')->name('edit.store');
        Route::post('/customer-savings/delete','SavingsController@destroy')->name('savings.delete');
        // Application
        Route::get('/customer-savings/application/{user}','SavingsController@applicationForm')->name('savings.apply');
        Route::post('/customer-savings/application/{user}','SavingsController@storeApplication')->name('savings.apply.store');
        // Pay Credits from Savings
        Route::get('/customer-savings/pay-credits/{user}','SavingsController@transactionFromCredits')->name('savings.credits.pay');
        Route::post('/customer-savings/pay-credits/{user}','SavingsController@storeTransactionFromCredits')->name('savings.credits.store');
        // Transactions
        Route::get('/customer-transaction-savings/deposit/{user}','SavingsController@savingsTransactionDeposit')->name('transaction.deposit');
        Route::post('/customer-transaction-savings/store/{user}','SavingsController@storeSavingsTransactions')->name('transaction.deposit.store');
        Route::get('/customer-transaction-savings/withdraw/{user}','SavingsController@savingsTransactionWithdraw')->name('transaction.withdraw');

        // Credits
        Route::get('/customer-credits','CreditsController@index')->name('credits');
        Route::get('/customer-credits/new','CreditsController@create')->name('newcredits');
        Route::post('/customer-credits/new','CreditsController@store')->name('newcredits.store');
        Route::get('/customer-credits/edit/{customer}','CreditsController@show')->name('credits.edit');
        Route::post('/customer-credits/edit/{customer}','CreditsController@update')->name('credits.edit.store');
        Route::post('/customer-credits/delete','CreditsController@destroy')->name('credits.delete');
        // Application
        Route::get('/customer-credits/application/{user}','CreditsController@applicationForm')->name('credits.apply');
        Route::post('/customer-credits/application/{user}','CreditsController@storeApplication')->name('credits.apply.store');
        // Transactions
        Route::get('/customer-transaction-credits/add/{user}','CreditsController@creditsTransactionAdd')->name('transaction.credits.add');
        Route::get('/customer-transaction-credits/pay/{user}','CreditsController@creditsTransactionPay')->name('transaction.credits.pay');
        Route::post('/customer-transaction-credits/store/{user}','CreditsController@storeCreditsTransactions')->name('transaction.credits.store');
    });

    Route::name('transactions.')->group(function(){
        Route::get('/transactions-history-savings','SavingsController@savingsHistory')->name('savings');
        Route::get('/transactions-history-savings/{user}','SavingsController@userSavingsHistory')->name('user.savings');
        Route::get('/transactions-history-credits','CreditsController@creditsHistory')->name('credits');
        Route::get('/transactions-history-credits/{user}','CreditsController@userCreditsHistory')->name('user.credits');
    });

});

Route::get('/admin/manage-account','UserController@adminConfig')->name('admin.manage')->middleware('auth');
Route::post('/admin/manage-account','UserController@changePassword')->name('admin.change.password')->middleware('auth');
