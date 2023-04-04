<?php

namespace App\Repositories\RamRepository;

use App\Repositories\BaseRepositoryInterface;

interface RamRepositoryInterface extends BaseRepositoryInterface
{
    public function getByStorages($storages);
}
