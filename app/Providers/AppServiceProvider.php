<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\AdminServiceInterface;
use App\Services\AdminService;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\CommentService;
use App\Services\Contracts\PostServiceInterface;
use App\Services\PostService;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminServiceInterface::class, AdminService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
