<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Services\ProcessDataService;

class testController extends Controller
{
    private ProcessDataService $processDataService;

    public function __construct(ProcessDataService $processDataService)
    {
        $this->processDataService = $processDataService;
    }

    public function test()
    {
        $this->processDataService->formatRawData();
    }

    public function server()
    {
        $server = Server::where('location_id',7)->with('location')->get();

        return response()->json($server);
//        return response()->json($server->hard_disk);
    }
}
