<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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

       /* \App\Entities\Category::creating(function ($category) {
                    
            dd(get_called_class());
            $category->create_user_id = auth()->user()->id;

            if(auth()->user()->isAn('owner') && auth()->user()->shop)
                $category->shop_id = auth()->user()->shop->id;
        });*/
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->register(RepositoryServiceProvider::class);
    }
}
