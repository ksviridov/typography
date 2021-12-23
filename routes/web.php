<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/orders/list', 'OrderController@index')->name('orders_list');

    Route::group(['middleware' => ['role:manager']], function () {
        Route::get('/orders/add', 'OrderController@add')->name('add_order');

        Route::get('/orders/edit/{id}', 'OrderController@edit')->name('edit_order');
        Route::post('/orders/edit/{id}', 'OrderController@save')->name('save_order');

        Route::post('/orders/create', 'OrderController@create')->name('create_order');
    });
});


