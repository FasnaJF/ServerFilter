<?php

namespace Tests;

use App\Models\ServersRawData;
use App\Services\HardDiskService;
use App\Services\LocationService;
use App\Services\ModelService;
use App\Services\RamService;
use App\Services\ServerService;
use Database\Seeders\ServersRawDataSeeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RawData extends TestCase
{
    use DatabaseTransactions;
    protected ServersRawData $rawData;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(ServersRawDataSeeder::class);

        $serverData = ServersRawData::all();
        foreach ($serverData as $serverDatum){
            $ramService = resolve(RamService::class);
            $ram = $ramService->createRam($serverDatum->ram_data);
            $hddService = resolve(HardDiskService::class);
            $hdd = $hddService->createHDD($serverDatum->hdd_data);
            $locationService = resolve(LocationService::class);
            $location = $locationService->createlocation($serverDatum->location_data);
            $modelService = resolve(ModelService::class);
            $model = $modelService->createModel($serverDatum->model_data);
            $serverService = resolve(ServerService::class);
            $server = $serverService->createServer([
                    'model_id' => $model->id,
                    'ram_id' => $ram->id,
                    'hdd_id' => $hdd->id,
                    'location_id' => $location->id,
                    'price' => $serverDatum->price,
                ]
            );
        }

    }
}