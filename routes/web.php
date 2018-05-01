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
    
    Route::get('/categories', 'RoomCategoryController@index')->name('roomCatIndex');
    Route::get('/categories/create', 'RoomCategoryController@create')->name('roomCatCreate');
    Route::post('/categories/store', 'RoomCategoryController@store')->name('roomCatStore');
    
    Route::prefix('allocations')->group(function(){
        Route::get('/', 'RoomAllocationController@index')->name('roomAllocationIndex');
        Route::get('/create', 'RoomAllocationController@create')->name('roomAllocationCreate');
        Route::post('/store', 'RoomAllocationController@store')->name('roomAllocationStore');
    });
});

Route::prefix('tenant')->group(function () {
    Route::get('/', 'TenantController@index')->name('tenantIndex');
    Route::get('/create', 'TenantController@create')->name('tenantCreate');
    Route::post('/store', 'TenantController@store')->name('tenantStore');
});

Route::prefix('ajax')->group(function(){
    Route::post('/get_rooms_by_category', 'AjaxController@getRoomsByCategory');
});