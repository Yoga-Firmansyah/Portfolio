<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_skill', 'skill_id', 'project_id');
    }

    protected function icon(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url('/storage/public/skills/' . $value),
        );
    }
}
