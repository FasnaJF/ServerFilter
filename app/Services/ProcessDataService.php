<?php

namespace App\Services;

use App\Jobs\ProcessServerData;
use App\Repositories\ServersRawDataRepository\ServersRawDataRepositoryInterface;

class ProcessDataService
{
    private ServersRawDataRepositoryInterface $serversRawDataRepository;

    public function __construct(ServersRawDataRepositoryInterface $serversRawDataRepository)
    {
        $this->serversRawDataRepository = $serversRawDataRepository;
    }

    public function formatRawData()
    {
        $data = $this->serversRawDataRepository->getAll();
        ProcessServerData::dispatch($data);
    }
}
