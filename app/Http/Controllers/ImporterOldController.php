<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use Illuminate\Http\Request;

class ImporterController extends Controller
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
        return view('importers');
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
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function show(Importer $importer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function edit(Importer $importer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Importer $importer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Importer $importer)
    {
        //
    }
}
