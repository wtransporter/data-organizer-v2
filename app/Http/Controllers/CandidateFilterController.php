<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class CandidateFilterController extends Controller
{
    public function index()
    {
        return Candidate::filter(request(['search']))->latest()->paginate(12);
    }
}
