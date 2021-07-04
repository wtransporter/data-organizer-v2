<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Candidate;
use App\Models\Technology;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCandidateProjectRequest;

class CandidateProjectController extends Controller
{
    /**
     * Show form for creating new resource
     *
     * @param Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public function create(Candidate $candidate)
    {
        return view('admin.projects.create', [
            'candidate' => $candidate,
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Store given resource
     *
     * @param Candidate $candidate
     * @param CreateCandidateProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Candidate $candidate, CreateCandidateProjectRequest $request)
    {
        $attributes = $request->validated();
        unset($attributes['technologies']);

        $project = $candidate->projects()->create($attributes);
        $project->assignTechnology($request->get('technologies'));

        return redirect()->route('candidates.projects.create', $candidate)
            ->with('message', 'Project ' . $project->title . ' successfully added');
    }

    /**
     * Delete given resource from database
     *
     * @param Candidate $candidate
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate, Project $project)
    {
        $project->technologies()->detach();
        $project->delete();

        return redirect()->route('candidates.show', $candidate)->with('message', 'Project deleted');
    }
}
