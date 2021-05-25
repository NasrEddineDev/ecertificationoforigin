<?php

namespace App\Http\Controllers;

use App\Models\RequestCO;
use Illuminate\Http\Request;

class RequestCOController extends Controller
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
        return view('request_cos');
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
     * @param  \App\Models\RequestCO  $requestCO
     * @return \Illuminate\Http\Response
     */
    public function show(RequestCO $requestCO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestCO  $requestCO
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestCO $requestCO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestCO  $requestCO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestCO $requestCO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestCO  $requestCO
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCO $requestCO)
    {
        //
    }
}