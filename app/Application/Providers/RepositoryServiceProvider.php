<?php

namespace App\Application\Providers;

use Domain\Users\IUsersDbRepository;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Users\UsersDbRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUsersDbRepository::class, UsersDbRepository::class);
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
