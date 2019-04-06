<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
/**
 * This is just for test purpose and later time the other injection will be done from here.
 */

class DI extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }//boot

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // error_log("DI Provider : ");
    }//register

    
}//class
