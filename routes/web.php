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
    }
);

Route::get('/test',"testController@test");

