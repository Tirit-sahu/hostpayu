<?php

use Illuminate\Support\Facades\Route;



Route::get('/cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});



// ========= Paytm API routes ==============
Route::get('/initiate','\App\Http\Controllers\PaytmController@initiate')->name('initiate.payment');

Route::post('/payment','\App\Http\Controllers\PaytmController@pay')->name('make.payment');

Route::post('/payment/status', '\App\Http\Controllers\PaytmController@paymentCallback')->name('status');

Route::get('/payment', '\App\Http\Controllers\PaytmController@initiate');




Route::get('/', '\App\Http\Controllers\usersController@loginView');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// =========== Users route =================
Route::get('/users', '\App\Http\Controllers\usersController@show');

Route::get('/getUsers', '\App\Http\Controllers\usersController@getUsers')->name('users.data');

// Route::get('/user/blocked_unblobked/', '\App\Http\Controllers\usersController@blocked_unblobked');




// ========== Hostings routes ===============
Route::get('/hostings', '\App\Http\Controllers\HostingController@show')->middleware('auth');

Route::get('/getHostings', '\App\Http\Controllers\HostingController@getHostings')->name('hostings.data')->middleware('auth');

Route::get('/hosting/create', '\App\Http\Controllers\HostingController@create')->middleware('auth');

Route::post('/hostings/store', '\App\Http\Controllers\HostingController@store');

Route::get('/hostings/validation', '\App\Http\Controllers\HostingController@hostingsValidation')->middleware('auth');

Route::get('/hostings/renew', '\App\Http\Controllers\HostingController@renew')->middleware('auth');

Route::get('/hostings/edit/{id}', '\App\Http\Controllers\HostingController@edit')->middleware('auth');

Route::get('/hosting/destroy', '\App\Http\Controllers\HostingController@destroy')->middleware('auth');

Route::get('/test', '\App\Http\Controllers\HostingController@test')->middleware('auth');


// ========== Payment datatables routes ==========
Route::get('paymentDataTables', '\App\Http\Controllers\PaytmController@paymentDataTables');

Route::get('/getPaymentDataTables', '\App\Http\Controllers\PaytmController@getPaymentDataTables')->name('get.paymentData')->middleware('auth');

Route::get('/payment/destroy', '\App\Http\Controllers\PaytmController@destroy')->middleware('auth');

Route::get('/payment/status', '\App\Http\Controllers\PaytmController@destroy')->middleware('auth');

