<?php

namespace App\Traits;

use App\Models\Technology;

trait HasTechnology
{

    public function technologies()
    {
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    public function assignTechnology($technologies)
    {
        if (is_null($technologies)) {
            return $this->technologies()->detach();
        }

        return $this->technologies()->sync($technologies);
    }

}