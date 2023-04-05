<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'model' => $this->model->name,
            'hdd' => $this->hard_disk->name,
            'ram' => $this->ram->name,
            'location' => $this->location->name,
            'price' => $this->price,
        ];
    }
}
