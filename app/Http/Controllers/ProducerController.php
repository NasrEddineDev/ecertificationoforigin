<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProducerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producers = (Auth::User()->role->name == 'user' ) ? Auth::User()->Enterprise->producers : Producer::all();
        return view('producer.index', compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();
        $categories = Category::all();
        return view('producer.create', compact('countries', 'categories'));
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
        $producer = new Producer([
            'name' => $request->name,
            'legal_form' => $request->legal_form ? $request->legal_form : '',
            'activity_type' => $request->activity_type ? $request->activity_type : '',
            'type' => '',
            // 'activity_type_name' => !$request->activity_type ? $request->activity_type_name : '',
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'website' => $request->website ? $request->website : '',
            'tel' => $request->tel ? $request->tel : '',
            'fax' => $request->fax ? $request->fax : '',
            'enterprise_id' => Auth::User()->Enterprise->id
        ]);
        $producer->save();

        return redirect()->route('producers.index')
                        ->with('success','Producer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producer = Producer::find($id);
        return view('producers.show',compact('producer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        $countries = Country::all();
        $categories = Category::all();
        $producer = Producer::find($id);
        return view('producers.edit',compact('producer', 'countries', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $producer = Producer::find($id);
        $producer->name = $request->name;
        $producer->legal_form = $request->legal_form;
        $producer->activity_type = $request->activity_type;
        $producer->type = $request->type;
        $producer->address = $request->address;
        $producer->email = $request->email;
        $producer->mobile = $request->mobile;
        $producer->website = $request->website;
        $producer->tel = $request->tel;
        $producer->fax = $request->fax;
        $producer->save();

        return redirect()->route('producers.index')
                        ->with('success','Producer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producer  $producer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        
        $producer = Producer::find($id);
        if ($producer){
            $producer->delete();
            return response()->json([
                'message' => 'Producer deleted successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'Producer not found'
        ], 404);
        // return redirect()->route('producers.index')->with('success','Producer deleted successfully');
    }
}
