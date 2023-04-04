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

    public function getAllServers()
    {
        return $this->serverRepository->getAll();
    }

    public function getServersByHardDiskId($hardDisks)
    {
        return $this->serverRepository->getAllByHDD($hardDisks)->toArray();
    }

    public function getServersByRAMId($rams)
    {
        return $this->serverRepository->getAllByRAM($rams)->toArray();
    }

    public function getServersByLocationId($locations)
    {
        return $this->serverRepository->getAllByLocation($locations)->toArray();
    }

    public function getServersById($serverIds)
    {
        return $this->serverRepository->getAllById($serverIds);
    }
}
