<?php

namespace App\Providers;

use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SchoolInterface::class,SchoolRepository::class);
        $this->app->bind(StudentInterface::class,StudentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
