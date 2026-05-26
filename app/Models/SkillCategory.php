<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $table = 'skill_categories';

    protected $fillable = [
        'name',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class, 'skill_category_id');
    }
}
