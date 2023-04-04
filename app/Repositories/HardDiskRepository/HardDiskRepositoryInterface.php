<?php

namespace App\Repositories\HardDiskRepository;

use App\Repositories\BaseRepositoryInterface;

interface HardDiskRepositoryInterface extends BaseRepositoryInterface
{

    public function whereBetween($from,$to);

    public function getByType($hddType);

    public function getDistinctHDDTypes();
}
