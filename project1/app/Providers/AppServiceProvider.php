<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Company;
use App\About;
use App\Notify;

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
        View::share('company', Company::firstOrFail());
        View::share('about', About::firstOrFail());
        View::share('notifies', Notify::OrderBy('id', 'DESC')->paginate(config('custom.pagination.notifies_table')));
        View::share('countNotify', Notify::whereStatus(0)->OrderBy('id', 'DESC')->count());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
