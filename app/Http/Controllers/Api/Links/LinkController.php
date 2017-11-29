<?php

namespace App\Http\Controllers\Api\Links;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page') ?? '15';

        $links = Link::with('category', 'author')->paginate($perPage);

        return LinkResource::collection($links);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = $request->user()->links->create([
            'title'            => $request->get('title'),
            'url'              => $request->get('url'),
            'link_category_id' => $request->get('category_id'),
        ]);

        return LinkResource::make($created);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = Link::find($id)->with('category', 'author');

        return LinkResource::make($link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $link = Link::find($id);

        $updated = $link->update([
            'title'            => $request->get('title'),
            'url'              => $request->get('url'),
            'link_category_id' => $request->get('category_id'),
        ]);

        return LinkResource::make($updated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::find($id);

        $link->delete();

        return LinkResource::make($link);
    }
}
