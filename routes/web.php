<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
// Client
Route::get('/','Client\HomeController@index')->name('client.home.index');
Route::get('danh-muc/{id}','Client\CategoryController@show')->name('client.category.tour');
Route::get('tour/{tour}','Client\TourController@show')->name('client.tour');
Route::post('cart','Client\CartController@add')->name('client.cart.add');
Route::get('showcart','Client\CartController@show')->name('client.cart.show');
Route::get('deletecart\{id}','Client\CartController@delete')->name('client.cart.delete');
//Admin
Route::get('/admin/home', function () {
    return view('/admin/home/index');
})->name('admin.home');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin'
    ],
    function () {
        Route::group([
            'prefix' => 'category',
            'as' => 'category.',
        ], function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
            Route::post('edit/{id}', 'CategoryController@update')->name('update');
            Route::get('delete/{id}', 'CategoryController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'tour',
            'as' => 'tour.',
        ], function () {
            Route::get('/','TourController@index')->name('index');
            Route::get('create','TourController@create')->name('create');
            Route::post('store','TourController@store')->name('store');
            Route::get('edit/{id}','TourController@edit')->name('edit');
            Route::post('edit/{id}','TourController@update')->name('update');
            Route::get('delete/{id}','TourController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'user',
            'as' => 'user.',
        ], function () {
            Route::get('/','UserController@index')->name('index');
            Route::get('create','UserController@create')->name('create');
            Route::post('store','UserController@store')->name('store');
            Route::get('edit/{user}','UserController@edit')->name('edit');
            Route::post('edit/{user}','UserController@update')->name('update');
            Route::post('delete/{user}','UserController@delete')->name('delete');
        });
        Route::group([
            'prefix' => 'order',
            'as' => 'order.',
        ], function () {
            Route::get('/','OrderController@index')->name('index');
            Route::get('create','OrderController@create')->name('create');
            Route::post('store','OrderController@store')->name('store');
            Route::get('edit/{user}','OrderController@edit')->name('edit');
            Route::post('edit/{user}','OrderController@update')->name('update');
            Route::post('delete/{user}','OrderController@delete')->name('delete');
        });
    }
);

Route::get('/test',"testController@test");

