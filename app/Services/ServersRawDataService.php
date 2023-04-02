<?php

namespace App\Services;

use App\Repositories\ServersRawDataRepository\ServersRawDataRepositoryInterface;

class ServersRawDataService
{
    private ServersRawDataRepositoryInterface $rawDataRepository;

    public function __construct(ServersRawDataRepositoryInterface $rawDataRepository)
    {
        $this->rawDataRepository = $rawDataRepository;
    }

    public function getBrandById($id)
    {
        return $this->rawDataRepository->getById($id);
    }

    public function createBrand($data)
    {
        return $this->rawDataRepository->create($data);
    }

    public function deleteBrand($id)
    {
        return $this->rawDataRepository->deleteById($id);
    }
}
