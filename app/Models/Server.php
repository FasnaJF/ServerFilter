<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloModel;

class Server extends EloModel
{
    use HasFactory;

    protected $guarded = [];

    public function hard_disk()
    {
        return $this->hasOne(HardDisk::class,'id','hdd_id');
    }

    public function ram()
    {
        return $this->hasOne(Ram::class,'id','ram_id');
    }

    public function model()
    {
        return $this->hasOne(Model::class,'id','model_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class,'id','location_id');
    }
}
