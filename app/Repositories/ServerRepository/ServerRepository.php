<?php

namespace App\Repositories\ServerRepository;

use App\Models\Server;
use App\Repositories\BaseRepository;

class ServerRepository extends BaseRepository implements ServerRepositoryInterface
{
    public function __construct(Server $server)
    {
        $this->model = $server;
    }

    public function getAllByHDD($hardDisks)
    {
        return $this->model->whereIn('hdd_id', $hardDisks)->pluck('id');
    }

    public function getAllByRAM($rams)
    {
        return $this->model->whereIn('ram_id', $rams)->pluck('id');
    }

    public function getAllByLocation($locations)
    {
        return $this->model->whereIn('location_id', $locations)->pluck('id');
    }

    public function getAllById($serverIds)
    {
        return $this->model->whereIn('id', $serverIds)->with(
            'hard_disk:id,name',
            'ram:id,name',
            'location:id,name',
            'model:id,name'
        )->get();
    }

    public function getAll($sortBy = null)
    {
        return $this->model->with(
            'hard_disk:id,name',
            'ram:id,name',
            'location:id,name',
            'model:id,name'
        )->get();
    }

}
