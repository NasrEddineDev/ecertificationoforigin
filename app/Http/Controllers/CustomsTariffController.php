<?php

namespace App\Http\Controllers;

use App\Models\CustomsTariff;
use Illuminate\Http\Request;

class CustomsTariffController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\CustomsTariff  $customsTariff
     * @return \Illuminate\Http\Response
     */
    public function show(CustomsTariff $customsTariff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomsTariff  $customsTariff
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomsTariff $customsTariff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomsTariff  $customsTariff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomsTariff $customsTariff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomsTariff  $customsTariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomsTariff $customsTariff)
    {
        //
    }
}
