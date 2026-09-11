<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(
          \App\Contracts\Roles\RoleRepositoryInterface::class,
           \App\Repositories\Roles\RoleRepository::class
        );

       $this->app->bind(
           \App\Contracts\Roles\RoleSyncServiceInterface::class,
           \App\Services\Roles\RoleSyncService::class
        );

      $this->app->bind(
         \App\Contracts\Roles\RoleAssignmentServiceInterface::class,
            \App\Services\Roles\RoleAssignmentService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}