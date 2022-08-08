<?php

namespace App\Providers;

use App\Models\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\View;
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
        view::composer(['frontpage.*','layouts.dashboard'],function($view){
           $view->with('user_pic',User::getUserImage());
        });

        view::composer(['frontpage.*'],function($view){
            $view->with('latest_posts',Post::getLatestPost());
        });

//        view::composer(['frontpage.*','posts.edit'],function($view){
//            $view->with('images',Post::getPostImage());
//        });

    }

}
