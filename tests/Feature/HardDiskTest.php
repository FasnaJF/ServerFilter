<?php

namespace Tests\Feature;

use App\Models\ServersRawData;
use App\Services\HardDiskService;
use Database\Seeders\ServersRawDataSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\StubRawData;
use Tests\TestCase;

class HardDiskTest extends TestCase
{
    use StubRawData;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(ServersRawDataSeeder::class);
    }

    public function test_hdd_capacity_extracted()
    {
        $serverData = $this->createStubServerData();
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createHDD($serverData->hdd_data);
        self::assertEquals('4TB', $hdd->capacity);
    }

    public function test_hdd_capacity_extracted_for_less_than_250gb()
    {
        $serverData = ServersRawData::where('hdd_data', '2x120GBSSD')->first();
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createHDD($serverData->hdd_data);
        self::assertEquals('250GB', $hdd->capacity);
    }

    public function test_hdd_capacity_extracted_for_less_than_1000gb_more_than_500_gb()
    {
        $serverData = ServersRawData::where('hdd_data', '2x480GBSSD')->first();
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createHDD($serverData->hdd_data);
        self::assertEquals('1TB', $hdd->capacity);
    }

    public function test_hdd_type_extracted()
    {
        $serverData = $this->createStubServerData();
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createhdd($serverData->hdd_data);
        self::assertEquals('SATA', $hdd->type);
    }

    public function test_hdd_data_added_to_db()
    {
        $serverData = $this->createStubServerData();
        $hddService = resolve(HardDiskService::class);
        $hdd = $hddService->createhdd($serverData->hdd_data);
        self::assertEquals($serverData->hdd_data, $hdd->name);
    }
}