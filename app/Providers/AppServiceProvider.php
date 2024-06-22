<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $opc_categories = DB::table('categories AS c')->select('c.id', 'c.name', 'c.short_name', 'c.icon_path', 'c.active')
        // ->where('c.active', 1)
        // ->get();
        // View::share('opc_categories', $opc_categories);

        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // URL::forceScheme('https');

    }
}
