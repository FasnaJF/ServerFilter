<?php

namespace App\Console\Commands;

use App\Imports\ServersRawDataImport;
use App\Services\ProcessDataService;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Excel;

class ProcessExcelFile extends Command
{
    protected $signature = 'app:process-excel-file';
    protected $description = 'Import raw data to database';

    private ProcessDataService $processDataService;

    public function __construct(ProcessDataService $processDataService)
    {
        $this->processDataService = $processDataService;
        parent::__construct();
    }

    public function handle(): string
    {
        (new ServersRawDataImport())->import('servers.xlsx', null, Excel::XLSX); //Read the excel file to db
        $this->processDataService->formatRawData(); //format the db data to accessible data for filtering
        return 'done';
    }
}
