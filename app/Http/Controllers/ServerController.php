<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequest;
use App\Http\Resources\ServerResource;
use App\Services\HardDiskService;
use App\Services\LocationService;
use App\Services\RamService;
use App\Services\ServerService;

class ServerController extends Controller
{
    private ServerService $serverService;
    private HardDiskService $hardDiskService;
    private RamService $ramService;
    private LocationService $locationService;

    public function __construct(
        ServerService $serverService,
        HardDiskService $hardDiskService,
        RamService $ramService,
        LocationService $locationService
    ) {
        $this->serverService = $serverService;
        $this->hardDiskService = $hardDiskService;
        $this->ramService = $ramService;
        $this->locationService = $locationService;
    }

    public function index(FilterRequest $request)
    {
        $locations = $this->locationService->getAllLocations();
        $types = $this->hardDiskService->getHDDTypes();
        $servers = $this->filterServers($request);
        return view('dashboard', compact('servers','locations','types'));

    }

    public function filterServers(FilterRequest $request)
    {
        $serverIds = [];
        $serverIdsUpdated = false;
        $capacity = $request->input('capacity');
        $hddType = $request->input('type');
        $storages = $request->input('storage');
        $location = $request->input('location');
        if(!$capacity && !$hddType && !$storages && !$location){
            return $this->getAllServers();
        }
        if ($capacity) {
            $hddMatchingServerIds = $this->getServerByStorage($capacity);
//            if ($hddMatchingServerIds) {
                $serverIds = $hddMatchingServerIds;
                $serverIdsUpdated = true;
//            }
        }
        if ($hddType) {
            $typeMatchingServerIds = $this->getServerByHDDType($hddType);
//            if ($typeMatchingServerIds) {
                if ($serverIds || $serverIdsUpdated) {
                    $serverIds = array_intersect($serverIds, $typeMatchingServerIds);
                    $serverIdsUpdated = true;
                } else {
                    $serverIds = $typeMatchingServerIds;
                }
//            }
        }
        if ($storages) {
            $ramMatchingServerIds = $this->getServerByRAM($storages);
//            if ($ramMatchingServerIds) {
                if ($serverIds || $serverIdsUpdated) {
                    $serverIds = array_intersect($serverIds, $ramMatchingServerIds);
                    $serverIdsUpdated = true;
                } else {
                    $serverIds = $ramMatchingServerIds;
                }
//            }
        }
        if ($location) {
            $locationMatchingServerIds = $this->getServerByLocation($location);
//            if ($locationMatchingServerIds) {
                if ($serverIds || $serverIdsUpdated) {
                    $serverIds = array_intersect($serverIds, $locationMatchingServerIds);
                } else {
                    $serverIds = $locationMatchingServerIds;
                }
//            }
        }
//        return $this->serverService->getServersById($serverIds);
        return ServerResource::collection($this->serverService->getServersById($serverIds));

    }

    protected function getAllServers()
    {
        return $this->serverService->getAllServers();
    }

    protected function getServerByStorage($capacity)
    {
        $fromCapacity = $capacity[0];
        $toCapacity = $capacity[1];
        $hardDisks = $this->hardDiskService->getHardDisksByStorage($fromCapacity, $toCapacity);
        return $this->serverService->getServersByHardDiskId($hardDisks);
    }

    protected function getServerByHDDType($hddType)
    {
        $hardDisks = $this->hardDiskService->getHardDisksByType($hddType);
        return $this->serverService->getServersByHardDiskId($hardDisks);
    }

    protected function getServerByRAM($storages)
    {
        $rams = $this->ramService->getRamByStorage($storages);
        return $this->serverService->getServersByRAMId($rams);
    }

    protected function getServerByLocation($location)
    {
        $locationId = $this->locationService->getLocationByName($location);
        return $this->serverService->getServersByLocationId($locationId);
    }
}
