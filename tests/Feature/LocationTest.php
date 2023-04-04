<?php

namespace Tests\Feature;

use App\Services\LocationService;
use Tests\StubRawData;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use StubRawData;

    public function test_location_name_extracted()
    {
        $serverData = $this->createStubServerData();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals('Amsterdam', $location->location);
    }

    public function test_location_code_extracted()
    {
        $serverData = $this->createStubServerData();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals('AMS-01', $location->code);
    }

    public function test_location_data_added_to_db()
    {
        $serverData = $this->createStubServerData();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals($serverData->location_data, $location->name);
    }
}