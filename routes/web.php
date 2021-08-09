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
Route::group([
    'as'=>'client.',
    'namespace'=>'Client'
],function(){
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('danh-muc/{id}','CategoryController@show')->name('category.tour');
    Route::get('tour/{tour}','TourController@show')->name('tour');
    Route::get('login','LoginController@index')->name('login');
    Route::post('login','LoginController@store')->name('store');
    Route::get('logout','LoginController@logout')->name('logout');
    Route::get('register','RegisterController@index')->name('register.index');
    Route::post('register','RegisterController@store')->name('register.store');
    Route::group([
        'prefix'=>'cart',
        'as'=>'cart.'
        
    ],function(){
        Route::post('add','CartController@add')->name('add');
        Route::get('show','CartController@show')->name('show');
        Route::post('savechange','CartController@saveChange')->name('saveChange');
        Route::get('delete/{id}','CartController@delete')->name('delete');
        Route::get('pay','CartController@infoPay')->name('pay');
        Route::post('store','CartController@store')->name('store');
        Route::get('invoice/{order}','CartController@invoice')->name('invoice');
    });
});
//Admin
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'namespace' => 'Admin',
        // 'middleware'=> ['check_login_admin']
    ],
    function () {
        Route::get('home', function () {
            return view('/admin/home/index');
        })->name('home');
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
            // ->middleware('check_author_admin');
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
            Route::get('edit/{order}','OrderController@edit')->name('edit');
            Route::post('edit/{order}','OrderController@update')->name('update');
            Route::get('delete/{order}','OrderController@delete')->name('delete');
        });
    }
);
Route::get('/tours/all','Client\TourController@index')->name('client.tour.all');
Route::get('admin/login','Admin\LoginController@index')->name('admin.login.index');
Route::post('admin/login','Admin\LoginController@store')->name('admin.login.store');
Route::get('/test',"testController@test");

