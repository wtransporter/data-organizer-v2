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
     * Show form for editing given resource
     *
     * @param Candidate $candidate
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate, Project $project)
    {
        return view('admin.projects.edit', [
            'candidate' => $candidate,
            'project' => $project,
            'allTechnologies' => Technology::all()
        ]);
    }

    /**
     * Update given resource
     *
     * @param Candidate $candidate
     * @param Project $project
     * @param CreateCandidateProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(Candidate $candidate, Project $project, CreateCandidateProjectRequest $request)
    {
        $project->update($request->only(['title', 'description']));
        $project->assignTechnology($request->get('technologies'));
        
        return redirect()->route('candidates.projects.edit', [$candidate, $project])->with('message', 'Experience updated');
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
