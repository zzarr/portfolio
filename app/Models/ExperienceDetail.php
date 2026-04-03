<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    protected $fillable = [
        'experience_id',
        'description',
    ];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
