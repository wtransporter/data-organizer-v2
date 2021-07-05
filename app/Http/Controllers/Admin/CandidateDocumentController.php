<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateDocumentController extends Controller
{
    /**
     * Store candidate document
     *
     * @param Candidate $candidate
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, Request $request)
    {
        $request->validate([
            'document' => ['required']
        ]);

        $candidate->update([
            'document' => $request->file('document')->store('documents', 'public')
        ]);

        return $candidate;
    }
}
