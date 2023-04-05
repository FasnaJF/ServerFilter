<?php

namespace Tests\Feature;

use App\Models\ServersRawData;
use App\Services\ModelService;
use Tests\RawData;

class ModelTest extends RawData
{


    public function test_model_can_be_added_to_db()
    {
        $serverData = ServersRawData::first();
        $modelService = resolve(ModelService::class);
        $model = $modelService->createModel($serverData->model_data);
        self::assertEquals($serverData->model_data,$model->name);
    }
}