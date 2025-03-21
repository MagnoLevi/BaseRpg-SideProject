<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CharacterClass extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'description'
    ];

    public function subClasses()
    {
        return $this->hasMany(CharacterClass::class, 'parent_class_id');
    }

    public function parentClass()
    {
        return $this->belongsTo(CharacterClass::class, 'parent_class_id');
    }
}
