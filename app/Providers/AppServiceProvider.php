<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use App\Setting;
use App\AuditTrail\Activity\RepositoryInterface as ActivityRepository;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Moderator\RepositoryInterface', 'App\Moderator\EloquentRepository');
        $this->app->bind('App\Officer\RepositoryInterface', 'App\Officer\EloquentRepository');
        $this->app->bind('App\Lookup\RepositoryInterface', 'App\Lookup\EloquentRepository');
        $this->app->bind('App\AuditTrail\Activity\RepositoryInterface', 'App\AuditTrail\Activity\EloquentRepository');
        $this->app->bind('App\Gallery\RepositoryInterface', 'App\Gallery\EloquentRepository');
    }

}
