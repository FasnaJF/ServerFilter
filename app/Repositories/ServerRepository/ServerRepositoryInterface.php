<?php

namespace App\Repositories\ServerRepository;

use App\Repositories\BaseRepositoryInterface;

interface ServerRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllByHDD($hardDisks);

    public function getAllByRAM($rams);

    public function getAllByLocation($locations);

    public function getAllById($serverIds);
}
