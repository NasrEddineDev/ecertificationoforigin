<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\AlgeriaCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
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
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
    public function getStates($country_id)
    {
        //        

        $data = [];
        $states = State::where('country_id', '=', $country_id)->orderBy('iso2')->get();
        $states = $states->map(function ($items) {
            $data['value'] = $items->id;
            $data['text'] = $items->iso2 . ' ' . __($items->name);
            return $data;
        });

        return response()->json(['states' => $states]);
    }
    public function getAlgerianStates()
    {
        //        
        $data = [];
        $states = collect(DB::select("select DISTINCT ac.wilaya_code , ac.wilaya_name, ac.wilaya_name_ascii from algeria_cities ac order by ac.wilaya_code"))
                    ->map(function ($items) {
                    $data['value'] = $items->wilaya_code;
                    $data['text'] = $items->wilaya_code . ' ' . (App()->currentLocale() == 'ar' ? $items->wilaya_name : $items->wilaya_name_ascii);
                    return $data;
        });
        return response()->json(['states' => $states]);
    }
}
