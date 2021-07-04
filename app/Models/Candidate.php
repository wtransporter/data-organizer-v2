<?php

namespace App\Models;

use App\Traits\HasTechnology;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory, HasTechnology;

    protected $guarded = [];

    protected $dates = [
        'birth_date'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
