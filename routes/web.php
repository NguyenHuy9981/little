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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin')->middleware('auth')->group(function () {


    Route::prefix('event')->group(function () {

        Route::get('/', 'AdminEventController@index')->name('event.index');

        Route::get('/create', 'AdminEventController@create')->name('event.create');

        Route::post('/store', 'AdminEventController@store')->name('event.store');
        
        Route::get('/edit/{id}', 'AdminEventController@edit')->name('event.edit');

        Route::post('/update/{id}', 'AdminEventController@update')->name('event.update');

        Route::get('/delete/{id}', 'AdminEventController@delete')->name('product.delete');
    
    });

});









