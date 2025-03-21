<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'description'
    ];

    public function subraces()
    {
        return $this->hasMany(Race::class, 'parent_race_id');
    }

    public function parentRace()
    {
        return $this->belongsTo(Race::class, 'parent_race_id');
    }
}
