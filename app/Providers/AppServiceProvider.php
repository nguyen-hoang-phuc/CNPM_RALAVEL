<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\type_products;
use App\Cart;
use Session;
use App\products;

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
		view()->composer(['header','page.san_pham'],function($view) {
			$type_products = type_products::all();
			$promotion_product = products::where('promotion_price','<>',0)->paginate(6,['*'],'page');
			$view->with(['type_products'=>$type_products,'promotion_product'=>$promotion_product]);
		});
		view()->composer(['header','page.checkout'],function($view) {
			if(Session('cart')) {
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
				$view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
				
			}
		});
    }
}
