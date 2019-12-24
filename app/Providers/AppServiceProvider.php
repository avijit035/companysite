<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Footer;
use App\Siteinfo;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        $footers=Footer::orderBy('id','asc')->get();
        View::share('footers', $footers);
        $site_name=Siteinfo::where('name','site_name')->first();
        View::share('site_name', $site_name);

    }
}
