<?php

namespace App\Http\Controllers\Web\Links;

use App\Http\Controllers\Controller;
use App\Models\LinkCategory;
use Illuminate\Http\Request;

class LinkCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = LinkCategory::all();

        return view('links.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\LinkCategory $linkCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function show(LinkCategory $linkCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\LinkCategory $linkCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(LinkCategory $linkCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\LinkCategory $linkCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LinkCategory $linkCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\LinkCategory $linkCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkCategory $linkCategory)
    {
        //
    }
}
