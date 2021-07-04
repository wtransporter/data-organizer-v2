<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        if (request()->expectsJson()) {
            return response(['status' => 'Technology successfully deleted.']);
        }

        return back();
    }

    /**
     * Store given resource to database
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $technology = Technology::create([
            'title' => $request->get('title')
        ]);

        if ($request->wantsJson()) {
            return response(['data' => $technology]);
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
            return response(['success' => 'Technology updated']);
        }

        return back();
    }
}
