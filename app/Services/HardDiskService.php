<?php

namespace App\Services;

use App\Repositories\HardDiskRepository\HardDiskRepositoryInterface;

class HardDiskService
{
    private HardDiskRepositoryInterface $hardDiskRepository;

    public function __construct(HardDiskRepositoryInterface $hardDiskRepository)
    {
        $this->hardDiskRepository = $hardDiskRepository;
    }

    public function createHDD($hddData)
    {
        $name = $hddData;
        $type = $this->getHDDType($hddData); //Get HDD type
        $capacityString =  strtok($name, 'B').'B'; //Get storage in letters
        $capacity = $this->calculateCapacity($capacityString); //Calculated capacity form the string
        return $this->hardDiskRepository->create(['name' => $name, 'type' => $type, 'capacity' => $capacity]);
    }

    private function calculateCapacity($capacityString)
    {
        $numbers = array_map('intval', explode('x', $capacityString));
        $capacity = array_product($numbers);
        $byteData = substr($capacityString, -2);
        if ($byteData === 'GB') {
            $finalCapacity = match (true) {
                ($capacity <= 256) => '250GB',
                ($capacity <= 500 && $capacity > 256) => '500GB',
                ($capacity <= 1000 && $capacity > 500) => '1TB',
                ($capacity <= 2000 && $capacity > 1000) => '2TB',
                ($capacity <= 3000 && $capacity > 2000) => '3TB',
                ($capacity <= 4000 && $capacity > 3000) => '4TB',
                ($capacity <= 8000 && $capacity > 4000) => '8TB',
                ($capacity <= 12000 && $capacity > 8000) => '12TB',
                default => 0,
            };
        } else {
            $finalCapacity = $capacity . $byteData;
        }
        return $finalCapacity;
    }

    private function getHDDType($hddString)
    {
        $typeString = preg_split('/[\dx\d]*[G|T]B/', $hddString)[1];
        return preg_replace('/[^a-z]/i', '', $typeString);
    }

}
