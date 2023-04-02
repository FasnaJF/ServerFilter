<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    private array $repositories = [
        BaseRepositoryInterface::class => BaseRepository::class,
    ];

    public function register()
    {
        foreach ($this->repositories as $contracts => $eloquentClass) {
            $this->app->bind(
                $contracts,
                $eloquentClass
            );
        }
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
