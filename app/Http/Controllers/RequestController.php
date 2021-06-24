<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
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
try {
        $requests = (Auth::User()->role->name == 'user' ) ? Auth::User()->Requests : ModelsRequest::all();
        return view('requests.index', compact('requests'));
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
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
