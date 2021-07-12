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

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function addTag($title)
    {
        return $this->tags()->create(['title' => $title]);
    }

    public function getAvatarAttribute($avatar)
    {
        return $avatar ? asset('storage/'. $avatar) : '/img/no-image.png';
    }

    public function scopeFilter($query, array $filters)
    {
        return $query->with('technologies')
            ->when($filters['search'], function($query, $search) {
                return $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('college', 'like', '%' . $search . '%')
                    ->orWhereHas('technologies', function($q) use ($search){
                        $q->where('title', 'like', '%' . $search . '%');
                    })->orWhereHas('tags', function($q) use ($search) {
                        $q->where('title', 'like', '%' . $search . '%');
                    });
            });
    }
}
