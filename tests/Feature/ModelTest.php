<?php

namespace Tests\Feature;

use App\Services\ModelService;
use Tests\StubRawData;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use StubRawData;


    public function test_model_can_be_added_to_db()
    {
        $serverData = $this->createStubServerData();
        $modelService = resolve(ModelService::class);
        $model = $modelService->createModel($serverData->model_data);
        self::assertEquals($serverData->model_data,$model->name);
    }
}