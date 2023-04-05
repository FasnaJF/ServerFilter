<?php

namespace Tests\Feature;

use App\Models\HardDisk;
use App\Models\ServersRawData;
use App\Services\HardDiskService;
use App\Services\LocationService;
use App\Services\ModelService;
use App\Services\RamService;
use App\Services\ServerService;
use Tests\RawData;

class ServerTest extends RawData
{
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

    public function test_server_can_be_filtered_by_hdd_type()
    {
        $response = $this->post('/api/servers/', ['type' => 'SATA']);
        ($response->assertJsonCount(3));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_hdd_capacity()
    {
        $response = $this->post('/api/servers/', ['capacity' => [0,'2TB']]);
        ($response->assertJsonCount(5));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_hdd_capacity_and_type_sata()
    {
        $response = $this->post('/api/servers/', ['capacity' => [0,'2TB'],'type' => 'SATA']);
        ($response->assertJsonCount(2));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_hdd_capacity_and_type_ssd()
    {
        $response = $this->post('/api/servers/', ['capacity' => [0,'2TB'],'type' => 'SSD']);
        ($response->assertJsonCount(3));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_location()
    {
        $response = $this->post('/api/servers/', ['location' => 'Singapore']);
        ($response->assertJsonCount(1));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_location_and_hdd_type_ssd()
    {
        $response = $this->post('/api/servers/', ['location' => 'Singapore', 'type'=>'SSD']);
        ($response->assertJsonCount(0));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_location_and_hdd_type_sata()
    {
        $response = $this->post('/api/servers/', ['location' => 'Singapore', 'type'=>'SATA']);
        ($response->assertJsonCount(1));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_location_and_hdd_capacity()
    {
        $response = $this->post('/api/servers/', ['location' => 'Singapore', 'capacity' => [0,'2TB']]);
        ($response->assertJsonCount(1));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_ram_storage()
    {
        $response = $this->post('/api/servers/', ['storage' => ['32GB']]);
        ($response->assertJsonCount(3));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_ram_storage_and_location()
    {
        $response = $this->post('/api/servers/', ['storage' => ['32GB'],'location'=>'Singapore']);
        ($response->assertJsonCount(1));
        $response->assertStatus(200);
    }

    public function test_server_can_be_filtered_by_ram_storages_and_location()
    {
        $response = $this->post('/api/servers/', ['storage' => ['32GB','16GB'],'location'=>'Hong Kong']);
        ($response->assertJsonCount(1));
        $response->assertStatus(200);
    }
}