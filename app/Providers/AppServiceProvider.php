<?php

namespace App\Providers;

use App\Models\ProductCart;
use Facade\FlareClient\View;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

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
        FacadesView::composer('*',function($view){
            $cart_count=ProductCart::where('user_id',auth()->id())->count();
            $view->with('cart_count',$cart_count);
        });

        PaginationPaginator::useBootstrap();// for panigation with bootstrap css not tailwind css
    }
}
