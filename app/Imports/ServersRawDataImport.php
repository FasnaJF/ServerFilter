<?php

namespace App\Imports;

use App\Models\ServersRawData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ServersRawDataImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    use Importable;
    use SkipsFailures;

    public function model(array $row)
    {
        return new ServersRawData([
            'model_data' => $row['model'],
            'ram_data' => $row['ram'],
            'hdd_data' => $row['hdd'],
            'location_data' => $row['location'],
            'price' => $row['price'],
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
