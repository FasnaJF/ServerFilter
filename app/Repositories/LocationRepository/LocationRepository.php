<?php

namespace App\Repositories\LocationRepository;

use App\Models\Location;
use App\Repositories\BaseRepository;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $location)
    {
        $this->model = $location;
    }

    public function getByName($location)
    {
        return $this->model->where('location',$location)->pluck('id');
    }

    public function getAllLocationNames()
    {
        return $this->model->select(['id','location'])->get();
    }
}
