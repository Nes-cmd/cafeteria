<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\MyClasses\dataFecher;
use App\MyClasses\Check;
use Auth; 
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('DataService', function($app){
            if (Auth::check()) {
                return new dataFecher(Auth::user()->id);
            }
            return new dataFecher(0);
        });
        $this->app->bind('DataFech', function($app){
            if (Auth::check()) {
                return new Check();
            }
            return new Check();
        });

        app()->bind('Hello',function(){
            return 'hello binding';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Option 1
        //View::share('varible','data');
        //Option 2

        // View::composer(['list views'],function($view){
        //     $view->with('variable',Model::where())
        // });

    }
}
