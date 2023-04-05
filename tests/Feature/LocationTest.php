<?php

namespace Tests\Feature;

use App\Models\ServersRawData;
use App\Services\LocationService;
use Tests\RawData;

class LocationTest extends RawData
{

    public function test_location_name_extracted()
    {
        $serverData = ServersRawData::first();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals('Amsterdam', $location->location);
    }

    public function test_location_code_extracted()
    {
        $serverData = ServersRawData::first();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals('AMS-01', $location->code);
    }

    public function test_location_data_added_to_db()
    {
        $serverData = ServersRawData::first();
        $locationService = resolve(LocationService::class);
        $location =  $locationService->createlocation($serverData->location_data);
        self::assertEquals($serverData->location_data, $location->name);
    }
}