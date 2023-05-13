<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\OrderRepository\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepository\OrderRepository;

use App\Repositories\CustomerRepository\Interfaces\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository\CustomerRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
