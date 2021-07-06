<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TechnologyFormRequest;

class TechnologyController extends Controller
{
    /**
     * Display list of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.technologies.index');
    }

    /**
     * Delete given resource
     *
     * @param Technology $technology
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return response()->json([
            'message' => 'Technology successfully deleted.'
        ]);
    }

    /**
     * Store given resource to database
     *
     * @param TechnologyFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TechnologyFormRequest $request)
    {
        $technology = Technology::create([
            'title' => $request->get('title')
        ]);

        if ($request->wantsJson()) {
            return response([
                'message' => 'Technology created',
                'data' => $technology
            ]);
        }
        
        return back();
    }

    /**
     * Update given resource
     *
     * @param Technology $technology
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Technology $technology, Request $request)
    {
        $technology->update([
            'title' => $request->get('title')
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Technology updated']);
        }

        return back();
    }
}
