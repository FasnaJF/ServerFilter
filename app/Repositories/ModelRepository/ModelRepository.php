<?php

namespace App\Repositories\ModelRepository;

use App\Models\Model;
use App\Repositories\BaseRepository;

class ModelRepository extends BaseRepository implements ModelRepositoryInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
