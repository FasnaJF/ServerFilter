<?php

namespace Tests;

use App\Models\ServersRawData;

trait StubRawData
{
    protected ServersRawData $rawData;

    public function createStubServerData(array $data = [])
    {
        $rawData = ServersRawData::create([
            'model_data' => 'Dell R210Intel Xeon X3440',
            'ram_data' => '16GBDDR3',
            'hdd_data' => '2x2TBSATA2',
            'location_data' => 'AmsterdamAMS-01',
            'price' => '€49.99',
        ]);
        return $this->rawData = $rawData;
    }
}