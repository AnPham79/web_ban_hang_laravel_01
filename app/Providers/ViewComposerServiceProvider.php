<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.header', function ($view) {
            $totalQuantity = 0;
            if (session()->has('role')) {
                $cartItems = Cart::where('user_id', session()->get('id'))->get();
                $totalQuantity = $cartItems->sum('quantity_prd');
            }
            $view->with('totalQuantity', $totalQuantity);
        });
    }
}
