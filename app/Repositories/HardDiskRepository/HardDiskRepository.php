<?php

namespace App\Repositories\HardDiskRepository;

use App\Models\HardDisk;
use App\Repositories\BaseRepository;

class HardDiskRepository extends BaseRepository implements HardDiskRepositoryInterface
{
    public function __construct(HardDisk $hardDisk)
    {
        $this->model = $hardDisk;
    }
}
