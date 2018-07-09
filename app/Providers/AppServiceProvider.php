<?php

namespace App\Providers;

use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function ($view){
            $getNumberUnRead=Notification::where('viewed',0)->where('user_id',Auth::user()->id)->get();
            $view->with('numberUnRead',$getNumberUnRead);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
