<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Tenant;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $tenant = DB::table('tenants')->where('id', \Session::get('tenant_id'))->first();
        $requests = DB::table('requests as r')
        ->leftjoin('requests_type as rt', 'rt.id', 'r.requests_type_id')
        ->select('r.id','rt.request_name', 'r.description as request_description', 'r.status', 'r.created_at')
        ->orderBy('r.id', 'DESC')
        ->limit(10)
        ->get();
        View::share('requests', $requests);
    }
}
