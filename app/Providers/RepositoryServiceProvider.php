<?php

namespace App\Providers;

use App\Modules\Cart\Repositories\CartSessionRepository;
use App\Modules\Cart\Repositories\ICartRepository;
use App\Modules\Order\Repositories\IOrderRepository;
use App\Modules\Order\Repositories\OrderRepository;
use App\Modules\Product\Repositories\IProductRepository;
use App\Modules\Product\Repositories\ProductRepository;
use App\Modules\User\Repositories\IUserRepository;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
        $this->app->bind(ICartRepository::class, CartSessionRepository::class);
    }
}
