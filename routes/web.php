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
    Route::get('/profile', 'admin\AdminController@profile')->name('adminProfile');
    Route::post('/update/profile', 'admin\AdminController@updateProfile')->name('updateProfile');

    Route::prefix('room')->group(function () {
        Route::get('/', 'RoomController@index')->name('roomIndex');
        Route::get('/create', 'RoomController@create')->name('roomCreate');
        Route::post('/store', 'RoomController@store')->name('roomStore');
        Route::get('/edit/{id}', 'RoomController@edit')->name('roomEdit');
        Route::get('/delete/{id}', 'RoomController@delete')->name('roomDelete');
        Route::post('/update', 'RoomController@update')->name('roomUpdate');

        Route::get('/rents', 'BillController@rents')->name('rents');
        Route::get('/rent/{id}/{room_id}', 'RoomController@rentView')->name('rentView');
        Route::post('/rent', 'RoomController@rentDivide')->name('rentDivide');
        Route::get('/rent/create', 'BillController@roomRentCreate')->name('roomRentCreate');
        Route::post('/rent/store', 'BillController@roomRentStore')->name('roomRentStore');
        
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
            Route::get('/edit/{id}', 'RoomAllocationController@edit')->name('roomAllocationEdit');
            Route::get('/delete/{id}', 'RoomAllocationController@delete')->name('roomAllocationDelete');
        });
    });
    
    
    Route::prefix('tenant')->group(function () {
        Route::get('/', 'TenantController@index')->name('tenantIndex');
        Route::get('/create', 'TenantController@create')->name('tenantCreate');
        Route::post('/store', 'TenantController@store')->name('tenantStore');
        Route::get('/edit/{id}', 'TenantController@edit')->name('tenantEdit');
        Route::get('/delete/{id}', 'TenantController@delete')->name('tenantDelete');
        Route::post('/update', 'TenantController@update')->name('tenantUpdate');
        
        Route::get('/view/{id}', 'TenantController@tenantView')->name('tenantView');
    
    });
    
    Route::prefix('time')->group(function () {
        Route::get('/', 'InOutController@index')->name('timeIndex');
        Route::get('/{tenant_id}/create', 'InOutController@addTimeInOut')->name('timeCreate');
        Route::post('/store', 'InOutController@store')->name('timeStore');
    });

    Route::prefix('requests')->group(function() {
        Route::get('/', 'RequestController@adminIndex')->name('requestAdminIndex');
        Route::get('/view/{id}', 'RequestController@adminRequestView')->name('requestView');
        Route::get('/laundry', 'RequestController@laundryRequest')->name('requestLaundry');
        Route::get('/food', 'RequestController@foodRequest')->name('requestFood');
        Route::get('/change_of_room', 'RequestController@changeOfRoomRequest')->name('requestChangeRoom');
    });

    Route::prefix('/bills')->group(function() {
        Route::get('/', 'BillController@index')->name('billIndex');
        Route::get('/create', 'BillController@create')->name('billCreate');
        Route::post('/store', 'BillController@store')->name('billStore');
        Route::get('/view/{id}', 'BillController@view')->name('billView');
        Route::get('/disperse/{id}', 'BillController@disperse')->name('billDisperse');
        Route::get('/disperse/tenant/{id}', 'BillController@disperseTenat')->name('billDisperseTenant');
        Route::get('/rooms', 'BillController@roomBills')->name('roomBills');
        Route::get('/tenants', 'BillController@allTenantBills')->name('allTenatnBills');
        Route::get('/tenants/history', 'BillController@tenantsPaymentHistory')->name('allTenatnBillsHistory');
        // Route::get('/room/divide', 'BillController@roomBills')->name('roomBills');
    });

    Route::prefix('/setting')->group(function(){
        Route::get('/', 'SettingController@index')->name('settingIndex');
        Route::post('/update', 'SettingController@update')->name('settingUpdate');
        Route::get('/admins', 'SettingController@administrators')->name('administrators');
        Route::get('/admin/edit/{id}', 'SettingController@edit')->name('administratorEdit');
        Route::post('/admin/update', 'SettingController@updateAdmin')->name('administratorUpdate');
    });
});



Route::prefix('ajax')->group(function(){
    Route::post('/get_rooms_by_category', 'AjaxController@getRoomsByCategory');
    Route::get('/get_rooms_rent/{room_id}', 'AjaxController@getRoomsRent');
    Route::post('/get_tenant_bill', 'AjaxController@getTenantBill');
    Route::post('/post_tenant_bill', 'AjaxController@postMakepayment');
});

Route::prefix('reports')->group(function(){
    Route::get('/tenant', 'ReportController@tenants')->name('tenantReports');
    Route::get('/export_tenant', 'ReportController@tenantExport')->name('exportTenant');
    
    Route::get('/revenue', 'ReportController@totalRevenue')->name('revenue');
    Route::get('/revenue/export', 'ReportController@revenueExport')->name('revenueExport');

    Route::get('/rent', 'ReportController@rentReport')->name('rentReport');
    Route::get('/export', 'ReportController@roomBillExport')->name('export');
});


Route::get('tenant/login', 'Auth\TenantLoginController@showLoginForm')->name('tenatLogin');
Route::post('tenant/logout', 'Auth\TenantLoginController@tenantLogout')->name('tenatLogout');
Route::post('tenant/login', 'Auth\TenantLoginController@login')->name('admin.login.submit');
Route::get('/tenant/home', 'TenantController@tenantHome')->name('tenantHome');
Route::get('/tenant/requests', 'TenantController@tenantRequests')->name('tenantRequestIndex');
Route::get('/tenant/requests/history', 'TenantController@tenantRequestHistory')->name('tenantRequestHistory');
Route::get('/tenant/request/create', 'TenantController@tenantRequest')->name('tenantRequestCreate');
Route::post('/tenant/request/store', 'TenantController@tenantRequestStore')->name('tenantRequestStore');
Route::get('/tenant/profile', 'TenantController@tenantProfile')->name('tenantProfile');
Route::post('/tenant/profile', 'TenantController@tenantProfileUpdate')->name('tenantProfileUpdate');



Route::get('/tenant/payments', 'BillController@tenantBills')->name('tenantBillsIndex');
Route::get('/tenant/payments/pending', 'BillController@tenantBillsPending')->name('tenantBillsPending');
Route::get('/tenant/payments/history', 'BillController@tenantBillsHistory')->name('tenantBillsHistory');
Route::post('tenant/payments/success', 'BillController@tenantBillsPayment')->name('tenantBillsPaymentSuccess');