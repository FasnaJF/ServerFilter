<?php

namespace App\Repositories\LocationRepository;

use App\Repositories\BaseRepositoryInterface;

interface LocationRepositoryInterface extends BaseRepositoryInterface
{
    public function getByName($location);

    public function getAllLocationNames();
}
