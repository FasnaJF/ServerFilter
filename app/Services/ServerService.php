<?php

namespace App\Services;

use App\Repositories\ServerRepository\ServerRepositoryInterface;

class ServerService
{
    private ServerRepositoryInterface $serverRepository;

    public function __construct(ServerRepositoryInterface $serverRepository)
    {
        $this->serverRepository = $serverRepository;
    }

    public function createServer($data)
    {
        return $this->serverRepository->create($data);
    }

}
