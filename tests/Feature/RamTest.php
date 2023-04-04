<?php

namespace Tests\Feature;

use App\Services\RamService;
use Tests\StubRawData;
use Tests\TestCase;

class RamTest extends TestCase
{
    use StubRawData;


    public function test_ram_storage_extracted()
    {
        $serverData = $this->createStubServerData();
        $ramService = resolve(RamService::class);
        $ram = $ramService->createRam($serverData->ram_data);
        self::assertEquals('16GB',$ram->capacity);
    }

    public function test_ram_type_extracted()
    {
        $serverData = $this->createStubServerData();
        $ramService = resolve(RamService::class);
        $ram = $ramService->createRam($serverData->ram_data);
        self::assertEquals('DDR3',$ram->type);
    }

    public function test_ram_data_added_to_db()
    {
        $serverData = $this->createStubServerData();
        $ramService = resolve(RamService::class);
        $ram = $ramService->createRam($serverData->ram_data);
        self::assertEquals($serverData->ram_data,$ram->name);
    }
}