<?php

namespace App\Console\Commands;

use App\Imports\ServersRawDataImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ProcessExcelFile extends Command
{
    protected $signature = 'app:process-excel-file';

    protected $description = 'Import raw data to database';

    public function handle(): string
    {
        $fail_count = 0;
        $import = new ServersRawDataImport();
        $import->import(public_path('servers.xlsx'));

        foreach ($import->failures() as $failure) {
            $fail_count ++;
            Log::info($failure);
        }
        Log::info('Number of row(s) failed for servers import is: '.$fail_count);

        return 'done';
    }
}
