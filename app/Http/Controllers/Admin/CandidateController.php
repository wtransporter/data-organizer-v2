<?php

namespace App\Http\Controllers\Admin;

use App\Models\Candidate;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;

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
            return Candidate::with('technologies')->latest()->paginate(12);
        }

        return view('dashboard');
    }

    /**
     * Show specified resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('admin.candidates.show', [
            'candidate' => $candidate->load(['technologies', 'projects', 'projects.technologies', 'tags']),
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Display form for editing given resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        return view('admin.candidates.edit', [
            'candidate' => $candidate->load('tags'),
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Display form for creating new resource
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.candidates.create', [
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Undocumented function
     *
     * @param Candidate $candidate
     * @param StoreCandidateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Candidate $candidate, StoreCandidateRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $candidate->update($attributes);
        $candidate->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.edit', $candidate)->with('message', 'Candidate updated');
    }

    /**
     * Store a newly created resource
     * 
     * @param Candidate $candidate
     * @param StoreCandidateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, StoreCandidateRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $newCandidate = $candidate->create($attributes);

        $newCandidate->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.projects.create', $newCandidate)->with('message', 'Candidate successfully added. You can add experience');
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
