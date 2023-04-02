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
}
