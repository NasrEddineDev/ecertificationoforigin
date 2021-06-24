<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Enterprise;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
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
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function getActivities(Request $request)
    {
        try {
    	$data = [];
        if($request->has('q')){
            $search = $request->q;
            $data = (empty($request->q)) ? Activity::all() : Activity::where('code','LIKE',"%$search%")->get();
            //select("id","code", "")            		

        }
        return response()->json($data);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }
    public function getSelectedActivities($enterprise_id)
    {
        try {
        $enterprise = Enterprise::find($enterprise_id);
        return response()->json([ 'activities' => $enterprise->activities]);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }

}
