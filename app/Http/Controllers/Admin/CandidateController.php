<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;

class CandidateController extends Controller
{
    /**
     * Display list of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', [
            'candidates' => Candidate::paginate(12)
        ]);
    }
}
