<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use App\category;
use App\vendor;

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
        \App\ProductComment::observe(\App\Observers\ProductCommentObserver::class);
        // \ModelClass::observe(\ObserverClass::class);
        view()->composer('*', function($view){
            $view->with([
                'showShop' => DB::table('vendors')->where('vendors.status','=','1')->get(),
                'Category' => DB::table('categories')->where('categories.status','=','1')->get(),
            ]);

        });
    }
}
