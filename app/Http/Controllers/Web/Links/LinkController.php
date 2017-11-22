<?php

namespace App\Http\Controllers\Web\Links;

use App\Http\Controllers\Controller;
use App\Http\Requests\Links\LinkRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * LinkController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index', 'show']);
        $this->middleware('admin', ['only' => 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderby('created_at', 'desc')->paginate(24);

        return view('links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LinkRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LinkRequest $request)
    {
        $link = new Link();

        $created = $link->create([
            'link_category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Link $link
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return redirect($link->url.'?ref=phpmap');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Link $link
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Link         $link
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $updated = $link->update([
            'link_category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'url' => $request->get('url'),
            'user_id' => Auth::user()->id
        ]);

        return redirect('/links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Link $link
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->back();
    }
}
