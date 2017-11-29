<?php

namespace App\Http\Controllers\Web\Discounts;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::all();

        return view('discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discounts.create');
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
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Discount     $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Discount $discount
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return back();
    }
}
