<?php
namespace App\Providers;
use App\repository\Post_Repo_I;
use App\repository\Post_Repo_Impl;
use Illuminate\Support\Facades\Schema; //Import Schema
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
        //
        Schema::defaultStringLength(191); //Solved by increasing StringLength

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // error_log("AppServiceProvider : ");
        $this->app->bind(Post_Repo_I::class, Post_Repo_Impl::class);
    }//register
}//class
