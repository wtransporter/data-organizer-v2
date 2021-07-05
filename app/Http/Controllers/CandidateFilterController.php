<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class CandidateFilterController extends Controller
{
    public function index()
    {
        $search = request()->get('search');

        return Candidate::with('technologies')->when($search, function($query) use ($search) {
            return $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('college', 'like', '%' . $search . '%')
                ->orWhereHas('technologies', function($q) use ($search){
                    $q->where('title', 'like', '%' . $search . '%');
                })->orWhereHas('tags', function($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
        })->latest()->paginate(12);
    }
}
