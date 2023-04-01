<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\OrderRepository\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepository\OrderRepository;



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
