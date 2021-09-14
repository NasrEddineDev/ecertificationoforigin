<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;
use App\Models\Enterprise;
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
        try {
            $producers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->producers : Producer::all();
            return view('producers.index', compact('producers'));
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
        try {
            $countries = Country::all();
            $categories = Category::all();
            $enterprises = Enterprise::all();
            return view('producers.create', compact('countries', 'categories', 'enterprises'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $producer = new Producer([
                'name' => $request->name,
                'legal_form' => $request->legal_form ? $request->legal_form : '',
                'activity_type_name' => $request->category_id == "99" ? $request->activity_type_name : '',
                'address' => $request->address,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'website' => $request->website ? $request->website : '',
                'tel' => $request->tel ? $request->tel : '',
                'fax' => $request->fax ? $request->fax : '',
                'category_id' => $request->category_id,
                'state_id' => $request->state_id,
                'enterprise_id' => Auth::User()->Enterprise ? Auth::User()->Enterprise->id : ''
            ]);
            $producer->save();

            return redirect()->route('producers.index')
                ->with('success', 'Producer created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $producer = Producer::find($id);
            return view('producers.show', compact('producer'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $countries = Country::all();
            $categories = Category::all();
            $producer = Producer::find($id);
            $states = State::where('country_id', '=', $producer->state->country_id)->orderBy('iso2')->get();
            return view('producers.edit', compact('producer', 'countries', 'states', 'categories'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
    
            $producer = Producer::find($id);
            $producer->name = $request->name;
            $producer->legal_form = $request->legal_form;
            $producer->activity_type_name = $request->category_id == "99" ? $request->activity_type_name : '';
            $producer->type = $request->type;
            $producer->address = $request->address;
            $producer->email = $request->email;
            $producer->mobile = $request->mobile;
            $producer->website = $request->website;
            $producer->tel = $request->tel;
            $producer->fax = $request->fax;
            $producer->category_id = $request->category_id;
            $producer->state_id = $request->state_id;
            $producer->save();

            return redirect()->route('producers.index')
                ->with('success', 'Producer updated successfully');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            $producer = Producer::find($id);
            if ($producer) {
                $producer->delete();
                return response()->json([
                    'message' => 'Producer deleted successfully'
                ], 200);
            }

            return response()->json([
                'message' => 'Producer not found'
            ], 404);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
        // return redirect()->route('producers.index')->with('success','Producer deleted successfully');
    }
}
