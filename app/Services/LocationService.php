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
        $code = substr($locationData, -6); //Get the code from location string
        $location = str_replace($code, '', $locationData); //Get location name from location string
        return $this->locationRepository->create(['name' => $locationData, 'location' => $location, 'code' => $code]);
    }

    public function getLocationByName($location)
    {
        return $this->locationRepository->getByName($location);
    }

    public function getAllLocations()
    {
        return $this->locationRepository->getAllLocationNames();
    }
}
