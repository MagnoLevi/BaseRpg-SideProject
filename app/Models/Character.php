<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'campaign_id',
        'race_id',
        'class_id',
        'name',
        'level',
        'background',
        'description'
    ];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
