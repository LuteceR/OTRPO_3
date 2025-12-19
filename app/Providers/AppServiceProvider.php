<?php

namespace App\Providers;

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
    // public function boot()
    // {
    //     //
    // }
    public function boot()
    {
        // $this->routes(function () {
        //     Route::middleware('web')
        //         ->group(base_path('routes/web.php'));

        //     Route::prefix('api')
        //         ->middleware('api')
        //         ->group(base_path('routes/api.php'));
        // });
    }

}
