<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;

class TagController extends Controller
{

    /**
     * Store given resource to database
     *
     * @param TagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
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

        return back();
    }
}
