<?php

namespace App\Http\Controllers\Web\Meetups;

use App\Models\Meetup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meetups = Meetup::all();

        return view('meetups.index', compact('meetups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meetups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function show(Meetup $meetup)
    {
        return view('meetups.show', compact('meetup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function edit(Meetup $meetup)
    {
        return view('meetups.edit', compact('meetup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meetup $meetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meetup $meetup)
    {
        $meetup->delete();

        return back();
    }
}
