<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'concentration',
        'range',
        'duration',
        'casting_time',
        'cooldown',
        'aoe',
        'description'
    ];

    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
