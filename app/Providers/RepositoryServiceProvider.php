<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\HardDiskRepository\HardDiskRepository;
use App\Repositories\HardDiskRepository\HardDiskRepositoryInterface;
use App\Repositories\LocationRepository\LocationRepository;
use App\Repositories\LocationRepository\LocationRepositoryInterface;
use App\Repositories\ModelRepository\ModelRepository;
use App\Repositories\ModelRepository\ModelRepositoryInterface;
use App\Repositories\RamRepository\RamRepository;
use App\Repositories\RamRepository\RamRepositoryInterface;
use App\Repositories\ServerRepository\ServerRepository;
use App\Repositories\ServerRepository\ServerRepositoryInterface;
use App\Repositories\ServersRawDataRepository\ServersRawDataRepository;
use App\Repositories\ServersRawDataRepository\ServersRawDataRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    private array $repositories = [
        BaseRepositoryInterface::class => BaseRepository::class,
        ServersRawDataRepositoryInterface::class => ServersRawDataRepository::class,
        ModelRepositoryInterface::class => ModelRepository::class,
        RamRepositoryInterface::class => RamRepository::class,
        HardDiskRepositoryInterface::class => HardDiskRepository::class,
        LocationRepositoryInterface::class => LocationRepository::class,
        ServerRepositoryInterface::class => ServerRepository::class,

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
