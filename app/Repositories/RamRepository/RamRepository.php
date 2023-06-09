<?php

namespace App\Repositories\RamRepository;

use App\Models\Ram;
use App\Repositories\BaseRepository;

class RamRepository extends BaseRepository implements RamRepositoryInterface
{
    public function __construct(Ram $ram)
    {
        $this->model = $ram;
    }

    public function getByStorages($storages)
    {
        return $this->model->whereIn('capacity',$storages)->pluck('id');
    }
}
