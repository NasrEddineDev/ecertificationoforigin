<?php

namespace App\Http\Controllers;

use App\Models\Importer;
use App\Models\Country;
use App\Models\State;
use App\Models\Category;
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
        //
        $importers = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise->importers : Importer::all();
        return view('importers.index', compact('importers'));
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
        return view('importers.create', compact('countries', 'categories'));
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
        $importer = new Importer([
            'name' => $request->name,
            'legal_form' => $request->legal_form ? $request->legal_form : '',
            'type' => '',
            // 'activity_type_name' => $request->category_id == "99" ? $request->activity_type_name : '',
            'address' => $request->address ? $request->address : '',
            'email' => $request->email,
            'mobile' => $request->mobile,
            'website' => $request->website ? $request->website : '',
            'tel' => $request->tel ? $request->tel : '',
            'fax' => $request->fax ? $request->fax : '',
            'category_id' => $request->category_id,
            'state_id' => $request->state_id,
            'enterprise_id' => Auth::User()->Enterprise->id
        ]);
        $importer->save();

        return redirect()->route('importers.index')
            ->with('success', 'Importer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $importer = Importer::find($id);
        return view('importers.show', compact('importer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Importer  $importer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        
        $countries = Country::all();
        $categories = Category::all();
        $importer = Importer::find($id);
        $states = State::where('country_id', '=', $importer->state->country_id)->orderBy('iso2')->get();
        return view('importers.edit', compact('importer', 'countries', 'states', 'categories'));
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
        //
        $importer = Importer::find($id);
        $importer->name = $request->name;
        $importer->legal_form = $request->legal_form;
        // $importer->activity_type_name = $request->category_id == "99" ? $request->activity_type_name : '';
        $importer->type = $request->type;
        $importer->address = $request->address;
        $importer->email = $request->email;
        $importer->mobile = $request->mobile;
        $importer->website = $request->website;
        $importer->tel = $request->tel;
        $importer->fax = $request->fax;
        $importer->category_id = $request->category_id;
        $importer->state_id = $request->state_id;
        $importer->save();

        return redirect()->route('importers.index')
            ->with('success', 'Importer updated successfully');
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

        // return redirect()->route('importers.index')->with('success','Importer deleted successfully');
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
    }


    public function getImporter($id)
    {
        //
        $importer = Importer::find($id);
        return response()->json([ 'importer' => $importer]);
    }
}
