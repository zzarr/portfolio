<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
