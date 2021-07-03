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
        if (request()->wantsJson()) {
            return Candidate::paginate(12);
        }

        return view('dashboard');
    }

    /**
     * Delete given resource
     *
     * @param Candidate $candidate
     * @return void
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Candidate successfully deleted.']);
        }

        return back();
    }
}
