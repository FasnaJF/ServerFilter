<?php

namespace App\Services;

use App\Repositories\LocationRepository\LocationRepositoryInterface;

class LocationService
{
    private LocationRepositoryInterface $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function createLocation($locationData)
    {
        $location = substr($locationData, -6); //Get location name from location string
        $code = str_replace($location, '', $locationData); //Get the code from location string
        return $this->locationRepository->create(['name' => $locationData, 'location' => $location, 'code' => $code]);
    }
}
