<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\AlgeriaCity;
use Illuminate\Http\Request;

class CityController extends Controller
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
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }

    public function getCities($state_code)
    {
        //        
        try {
        $data = [];
        $cities = AlgeriaCity::all()->where('wilaya_code', '=', $state_code);
        $cities = $cities->map(function($items){
            $data['value'] = $items->id;
            $data['text'] = App()->currentLocale() == 'ar' ? $items->commune_name : $items->commune_name_ascii;
            return $data;
            });
        return response()->json([ 'cities' => $cities]);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }

    public function getAlgerianCities($state_code)
    {
        try {
        $data = [];
        $cities = AlgeriaCity::all()->where('wilaya_code', '=', $state_code);
        $cities = $cities->map(function($items){
            $data['value'] = $items->id;
            $data['text'] = App()->currentLocale() == 'ar' ? $items->commune_name : $items->commune_name_ascii;
            return $data;
            });
        return response()->json([ 'cities' => $cities]);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }
}
