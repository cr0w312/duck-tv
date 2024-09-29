<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use App\Repositories\Interfaces\ApplicationRepositoryInterface;
use App\Repositories\NewsRepository;
use App\Repositories\VideoRepository;
use App\Repositories\ApplicationRepository;


class RepositoryServiceProvider extends ServiceProvider
{

    public $bindings = [
        NewsRepositoryInterface::class => NewsRepository::class,
        VideoRepositoryInterface::class => VideoRepository::class,
        ApplicationRepositoryInterface::class => ApplicationRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind();
    }
}
