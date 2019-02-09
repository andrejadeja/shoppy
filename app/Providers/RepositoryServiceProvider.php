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
        \App::bind(
            'App\Repositories\CategoryRepository',
            'App\Repositories\CategoryRepositoryEloquent'
            );

        \App::bind(
            'App\Repositories\ProductRepository',
            'App\Repositories\ProductRepositoryEloquent'
            );

        \App::bind(
            'App\Repositories\ShopRepository',
            'App\Repositories\ShopRepositoryEloquent'
            );


        \App::bind(
            'App\Repositories\SaleRepository',
            'App\Repositories\SaleRepositoryEloquent'
            );

        \App::bind(
            'App\Repositories\DiscountRepository',
            'App\Repositories\DiscountRepositoryEloquent'
            );
    }
}
