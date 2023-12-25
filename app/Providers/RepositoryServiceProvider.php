<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Interfaces\CategoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Interfaces\BookInterface::class, \App\Repositories\BookRepository::class);
        $this->app->bind(\App\Interfaces\AuthorInterface::class, \App\Repositories\AuthorRepository::class);
        $this->app->bind(\App\Interfaces\UserInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Interfaces\PermissionInterface::class, \App\Repositories\PermissionRepository::class);
        // $this->app->bind(\App\Interfaces\PermissionInterface::class, \App\Repositories\PermissionRepository::class);
        // $this->app->bind(\App\Interfaces\TaskInterface::class, \App\Repositories\TaskRepository::class);
        // $this->app->bind(\App\Interfaces\TeamInterface::class, \App\Repositories\TeamRepository::class);
        // $this->app->bind(\App\Interfaces\RoleInterface::class, \App\Repositories\RoleRepository::class);
        // $this->app->bind(\App\Interfaces\ProjectInterface::class, \App\Repositories\ProjectRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
