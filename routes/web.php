<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard',  [HomeController::class, 'dashboard'])->name('account.dashboard');

    Route::middleware(['isAccountHolder'])->group(function () {

        Route::group(['prefix'=>'transaction', 'as'=>'transaction.'], function(){

            Route::controller(TransactionsController::class)->group(function () {
                Route::get('/all', 'allTransactions')->name('all');
                Route::get('/deposit/create', 'createDeposit')->name('deposit.create');
                Route::post('/deposit/store', 'storeDeposit')->name('deposit.store');
                Route::get('/deposit/list', 'depositList')->name('deposit.list');

                Route::get('/withdraw/create', 'createWithdraw')->name('withdraw.create');
                Route::post('/withdraw/store', 'storeWithdraw')->name('withdraw.store');
                Route::get('/withdraw/list', 'withdrawList')->name('withdraw.list');
                
                
                
                
            });

        });

        
    });
  
    


});
