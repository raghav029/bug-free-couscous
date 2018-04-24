<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('room')->group(function () {
    Route::get('/', 'RoomController@index')->name('roomIndex');
    Route::get('/create', 'RoomController@create')->name('roomCreate');
    Route::post('/store', 'RoomController@store')->name('roomStore');
});