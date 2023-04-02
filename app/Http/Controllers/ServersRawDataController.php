<?php

namespace App\Http\Controllers;

use App\Imports\ServersRawDataImport;
use Maatwebsite\Excel\Facades\Excel;

class ServersRawDataController extends Controller
{
    public function import()
    {
        Excel::import(new ServersRawDataImport(), 'servers.xlsx');
        return redirect('/')->with('success', 'All good!');
    }
}
