<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'project_skill',
            'project_id',
            'skill_id'
        );
    }
    
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/public/projects/' . $value),
        );
    }
}
