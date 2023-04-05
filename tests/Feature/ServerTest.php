<?php

namespace Tests\Feature;

use App\Models\ServersRawData;
use App\Services\HardDiskService;
use App\Services\LocationService;
use App\Services\ModelService;
use App\Services\RamService;
use App\Services\ServerService;
use Database\Seeders\ServersRawDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\StubRawData;
use Tests\TestCase;

class ServerTest extends TestCase
{
//    use StubRawData;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(ServersRawDataSeeder::class);
    }

    public function test_server_data_added_to_db()
    {
        $serverData = ServersRawData::first();
        $ramService = resolve(RamService::class);
        $ram = $ramService->createRam($serverData->ram_data);
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createHDD($serverData->hdd_data);
        $locationService = resolve(LocationService::class);
        $location = $locationService->createlocation($serverData->location_data);
        $modelService = resolve(ModelService::class);
        $model = $modelService->createModel($serverData->model_data);
        $serverService = resolve(ServerService::class);
        $server = $serverService->createServer([
                'model_id' => $model->id,
                'ram_id' => $ram->id,
                'hdd_id' => $hdd->id,
                'location_id' => $location->id,
                'price' => $serverData->price,
            ]
        );
        self::assertEquals($serverData->price, $server->price);
        self::assertEquals($model->id, $server->model_id);
        self::assertEquals($ram->id, $server->ram_id);
        self::assertEquals($hdd->id, $server->hdd_id);
        self::assertEquals($location->id, $server->location_id);
    }
}