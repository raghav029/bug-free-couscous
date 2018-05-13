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
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'admin\AdminController@index')->name('adminDashboard');
    Route::prefix('room')->group(function () {
        Route::get('/', 'RoomController@index')->name('roomIndex');
        Route::get('/create', 'RoomController@create')->name('roomCreate');
        Route::post('/store', 'RoomController@store')->name('roomStore');
        Route::get('/edit/{id}', 'RoomController@edit')->name('roomEdit');
        Route::get('/delete/{id}', 'RoomController@delete')->name('roomDelete');
        Route::post('/update', 'RoomController@update')->name('roomUpdate');
        
        Route::get('/categories', 'RoomCategoryController@index')->name('roomCatIndex');
        Route::get('/categories/create', 'RoomCategoryController@create')->name('roomCatCreate');
        Route::post('/categories/store', 'RoomCategoryController@store')->name('roomCatStore');
        Route::get('/categories/edit/{id}', 'RoomCategoryController@edit')->name('roomCatEdit');
        Route::post('/categories/update', 'RoomCategoryController@update')->name('roomCatUpdate');
        Route::get('/categories/delete/{id}', 'RoomCategoryController@softDelete')->name('roomCatDelete');
        
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
        Route::get('/edit/{id}', 'TenantController@edit')->name('tenantEdit');
        Route::get('/delete/{id}', 'TenantController@delete')->name('tenantDelete');
        Route::post('/update', 'TenantController@update')->name('tenantUpdate');
    
    });
    
    Route::prefix('time')->group(function () {
        Route::get('/', 'InOutController@index')->name('timeIndex');
        Route::get('/{tenant_id}/create', 'InOutController@addTimeInOut')->name('timeCreate');
        Route::post('/store', 'InOutController@store')->name('timeStore');
    });

    Route::prefix('requests')->group(function() {
        Route::get('/', 'RequestController@adminIndex')->name('requestAdminIndex');
        Route::get('/view/{id}', 'RequestController@adminRequestView')->name('requestView');
    });
});



Route::prefix('ajax')->group(function(){
    Route::post('/get_rooms_by_category', 'AjaxController@getRoomsByCategory');
});


Route::get('tenant/login', 'Auth\TenantLoginController@showLoginForm')->name('admin.login');
Route::post('tenant/login', 'Auth\TenantLoginController@login')->name('admin.login.submit');
  Route::get('/tenant/home', 'TenantController@tenantHome')->name('tenantHome');