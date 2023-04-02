<?php

namespace App\Jobs;

use App\Models\Server;
use App\Services\HardDiskService;
use App\Services\LocationService;
use App\Services\ModelService;
use App\Services\RamService;
use App\Services\ServerService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessServerData implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(
        ModelService $modelService,
        RamService $ramService,
        HardDiskService $hardDiskService,
        LocationService $locationService,
        ServerService $serverService
    ): void {
        foreach ($this->data as $datum) {
            $model = $modelService->createModel($datum->model_data);
            $ram = $ramService->createRam($datum->ram_data);
            $hdd = $hardDiskService->createHDD($datum->hdd_data);
            $location = $locationService->createLocation($datum->location_data);
            $price = $datum->price;
            $serverService->createServer([
                'model_id'=>$model->id,
                'ram_id'=>$ram->id,
                'hdd_id'=>$hdd->id,
                'location_id'=>$location->id,
                'price'=>$price,
            ]);
        }
    }
}
