<?php

namespace App\Services;

use App\Repositories\RamRepository\RamRepositoryInterface;

class RamService
{
    private RamRepositoryInterface $ramRepository;

    public function __construct(RamRepositoryInterface $ramRepository)
    {
        $this->ramRepository = $ramRepository;
    }

    public function createRam($ramData)
    {
        $splitData = explode('GB', $ramData);
        $capacity = $splitData[0].'GB'; //Get capacity of RAM
        $type = $splitData[1]; //Get type of RAM
        $name = $ramData;
        return $this->ramRepository->create(['name'=>$name, 'type' => $type, 'capacity' => $capacity]);
    }

}
