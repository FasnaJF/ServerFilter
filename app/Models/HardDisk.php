<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardDisk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function servers()
    {
        return $this->belongsToMany(Server::class);
    }
}
