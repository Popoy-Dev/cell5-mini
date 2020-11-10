<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
   {
   	if ($this->app->environment() == 'local') {
   		$this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
   	}
   }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
