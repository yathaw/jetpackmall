<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Brand;
use App\Subcategory;
use App\Township;


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
        Schema::defaultStringLength(191);

        $brands = Brand::all();
        $randomBrands = Brand::all()->random(3);
        $subcategories = Subcategory::all()->random(11);
        $townships = Township::all();

        View::share('data', [$brands, $subcategories,$randomBrands,$townships]);

    }









    
}
