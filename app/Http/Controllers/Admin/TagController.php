<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    /**
     * Store given resource to database
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create([
            'candidate_id' => $request->get('candidate_id'),
            'title' => $request->get('title')
        ]);

        if ($request->wantsJson()) {
            return response(['data' => $tag]);
        }
        
        return back();
    }

    /**
     * Delete given resource
     *
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Tag successfully deleted.']);
        }

        return back();
    }
}
