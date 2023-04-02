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
}
