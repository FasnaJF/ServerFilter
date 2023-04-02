<?php

namespace App\Repositories\ServersRawDataRepository;

use App\Models\ServersRawData;
use App\Repositories\BaseRepository;

class ServersRawDataRepository extends BaseRepository implements ServersRawDataRepositoryInterface
{
    public function __construct(ServersRawData $rawData)
    {
        $this->model = $rawData;
    }
}
