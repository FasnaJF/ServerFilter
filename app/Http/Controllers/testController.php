<?php

namespace App\Http\Controllers;

use App\Repositories\ServersRawDataRepository\ServersRawDataRepository;
use App\Services\ProcessDataService;
use Illuminate\Http\Request;

class testController extends Controller
{
    private ProcessDataService $processDataService;

    public function __construct(ProcessDataService $processDataService)
    {
        $this->processDataService = $processDataService;
    }
    public function test(){
        $this->processDataService->formatRawData();
    }
}
