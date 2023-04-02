<?php

namespace App\Services;

use App\Repositories\ModelRepository\ModelRepositoryInterface;

class ModelService
{
    private ModelRepositoryInterface $modelRepository;

    public function __construct(ModelRepositoryInterface $modelRepository)
    {
        $this->modelRepository = $modelRepository;
    }

    public function createModel($model)
    {
        return $this->modelRepository->create(['name'=>$model]);
    }

}
