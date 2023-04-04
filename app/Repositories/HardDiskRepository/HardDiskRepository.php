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

    public function whereBetween($from,$to)
    {
        $fromHDD =  $this->model->where('capacity',$from)->first();
        $toHDD =  $this->model->where('capacity',$to)->first();
        $fromStorage = $fromHDD?$fromHDD->storage: 0;
        $toStorage = $toHDD?$toHDD->storage: 0;
        return $this->model->whereBetween('storage',[$fromStorage,$toStorage])->pluck('id');
    }

    public function getByType($hddType)
    {
        return $this->model->where('type',$hddType)->pluck('id');
    }

    public function getDistinctHDDTypes()
    {
        return $this->model->select('id','type')->get()->unique('type');
    }

}
