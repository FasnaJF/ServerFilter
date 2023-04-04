<?php

namespace Database\Seeders;

use App\Models\ServersRawData;
use Illuminate\Database\Seeder;

class ServersRawDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'model_data' => 'Dell R210Intel Xeon X3440',
                'ram_data' => '16GBDDR3',
                'hdd_data' => '2x2TBSATA2',
                'location_data' => 'AmsterdamAMS-01',
                'price' => '€49.99',
            ],
            [
                'model_data' => 'RH2288v32x Intel Xeon E5-2650V4',
                'ram_data' => '128GBDDR4',
                'hdd_data' => '2x480GBSSD',
                'location_data' => 'AmsterdamAMS-01',
                'price' => '€227.99',
            ],
            [
                'model_data' => 'RH2288v32x Intel Xeon E5-2650V4',
                'ram_data' => '128GBDDR4',
                'hdd_data' => '2x120GBSSD',
                'location_data' => 'AmsterdamAMS-01',
                'price' => '€227.99',
            ],
            [
                'model_data' => 'HP DL180G62x Intel Xeon E5620',
                'ram_data' => '32GBDDR3',
                'hdd_data' => '8x300GBSAS',
                'location_data' => 'Washington D.C.WDC-01',
                'price' => '$170.99',
            ],
            [
                'model_data' => 'HP DL180G62x Intel Xeon E5620',
                'ram_data' => '32GBDDR3',
                'hdd_data' => '2x1TBSATA2',
                'location_data' => 'SingaporeSIN-11',
                'price' => 'S$228.00',
            ],
            [
                'model_data' => 'Dell R730XD2x Intel Xeon E5-2650v4',
                'ram_data' => '128GBDDR4',
                'hdd_data' => '4x480GBSSD',
                'location_data' => 'FrankfurtFRA-10',
                'price' => '€395.99',
            ],
            [
                'model_data' => 'HP DL180G62x Intel Xeon E5620',
                'ram_data' => '32GBDDR3',
                'hdd_data' => '2x1TBSATA2',
                'location_data' => 'Hong KongHKG-10',
                'price' => 'S$228.00',
            ],
        ];
        foreach ($data as $datum) {
            ServersRawData::firstOrCreate($datum);
        }
    }
}
