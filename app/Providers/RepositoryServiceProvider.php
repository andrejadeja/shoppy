<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\CategoryRepositoryInterface', 
            'App\Repositories\CategoryRepository'
            );

        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface', 
            'App\Repositories\ProductRepository'
            );

        $this->app->bind(
            'App\Repositories\Contracts\SaleRepositoryInterface', 
            'App\Repositories\SaleRepository'
            );

        $this->app->bind(
            'App\Repositories\Contracts\DiscountRepositoryInterface', 
            'App\Repositories\DiscountRepository'
            );

        $this->app->bind(
            'App\Repositories\Contracts\ShopRepositoryInterface', 
            'App\Repositories\ShopRepository'
            );
    }
}
