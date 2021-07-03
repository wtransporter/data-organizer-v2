<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Http\Controllers\Controller;

class TechnologyController extends Controller
{
    /**
     * Display list of resources
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            return Technology::all();
        }

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
}
