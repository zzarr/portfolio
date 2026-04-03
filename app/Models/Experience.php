<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'is_current',
    ];

    public function details()
    {
        return $this->hasMany(ExperienceDetail::class);
    }
}
