<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateAvatarController extends Controller
{
    /**
     * Store candidate avatar
     *
     * @param Candidate $candidate
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image']
        ]);

        $candidate->update([
            'avatar' => $request->file('avatar')->store('avatars', 'public')
        ]);

        return response([], 204);
    }
}
