<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;
use App\Models\Enterprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImporterController extends Controller
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
        try {
            $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
            return view('importers.index', compact('importers'));
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
        try {
            //
            $countries = Country::all();
            $categories = Category::all();
            $enterprises = Enterprise::all();
            return view('importers.create', compact('countries', 'categories', 'enterprises'));
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
        try {
            //
            $importer = new Importer([
                'name' => $request->name,
                'legal_form' => $request->legal_form ? $request->legal_form : '',
                'activity_type_name' => $request->category_id == "19" ? $request->activity_type_name : '',
                'address' => $request->address ? $request->address : '',
                'email' => $request->email,
                'mobile' => $request->mobile,
                'website' => $request->website ? $request->website : '',
                'tel' => $request->tel ? $request->tel : '',
                'fax' => $request->fax ? $request->fax : '',
                'category_id' => $request->category_id,
                'state_id' => $request->state_id,
                'enterprise_id' => (Auth::User()->role->name == 'user') ? (Auth::User()->Enterprise ? Auth::User()->Enterprise->id : null) 
                                    : $request->input('enterprise_id')
            ]);
            $importer->save();

            return redirect()->route('importers.index')
                ->with('success', 'Importer created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //
            $importer = Importer::find($id);
            return view('importers.show', compact('importer'));
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            //        
            $countries = Country::all();
            $categories = Category::all();
            $importer = Importer::find($id);
            $enterprises = Enterprise::all();
            $states = State::where('country_id', '=', $importer->state->country_id)->orderBy('iso2')->get();
            return view('importers.edit', compact('importer', 'countries', 'states', 'categories', 'enterprises'));
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
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //
            $importer = Importer::find($id);
            $importer->name = $request->name;
            $importer->legal_form = $request->legal_form;
            $importer->activity_type_name = $request->category_id == "19" ? $request->activity_type_name : '';
            $importer->address = $request->address;
            $importer->email = $request->email;
            $importer->mobile = $request->mobile;
            $importer->website = $request->website;
            $importer->tel = $request->tel;
            $importer->fax = $request->fax;
            $importer->category_id = $request->category_id;
            $importer->state_id = $request->state_id;
            $importer->enterprise_id = (Auth::User()->role->name == 'user') ? (Auth::User()->Enterprise ? Auth::User()->Enterprise->id : null) 
                                : $request->input('enterprise_id');
            $importer->save();

            return redirect()->route('importers.index')
                ->with('success', 'Importer updated successfully');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //   
        try {

            if (str_contains($id, ',')) {
                foreach (explode(',', $id) as $code) {
                    $importer = Importer::find($id);
                    if ($importer) {
                        $importer->delete();
                    }
                }
                return response()->json([
                    'message' => 'Importers deleted successfully'
                ], 200);
            } else {
                $importer = Importer::find($id);
                if ($importer) {
                    $importer->delete();
                    return response()->json([
                        'message' => 'Importer deleted successfully'
                    ], 200);
                }
            }
            return response()->json([
                'message' => 'Importer not found'
            ], 404);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }


    public function getImporter($id)
    {
        try {
            //
            $importer = Importer::find($id);
            return response()->json([
                'importer' => $importer,
                'category' => $importer->category,
                'state' => $importer->state,
                'country' => $importer->state->country
            ]);
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }
}
