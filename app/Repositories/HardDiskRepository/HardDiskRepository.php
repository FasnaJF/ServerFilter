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

    public function whereBetween($from, $to)
    {
        $fromStorage = $this->getGBValue($from);
        $toStorage = $this->getGBValue($to);
        return $this->model->whereBetween('storage', [$fromStorage, $toStorage])->pluck('id');
    }

    protected function getGBValue($capacity)
    {
        $type = substr($capacity, -2);
        $value = intval(str_replace($type, '', $capacity));
        if ($type == 'GB') {
            return $value;
        } else {
            return $value * 1000;
        }
    }

    public function getByType($hddType)
    {
        return $this->model->where('type', $hddType)->pluck('id');
    }

    public function getDistinctHDDTypes()
    {
        return $this->model->select('id', 'type')->get()->unique('type');
    }
}
