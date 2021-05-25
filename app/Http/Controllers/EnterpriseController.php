<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Storage;

class EnterpriseController extends Controller
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
        $enterprises = (Auth::User()->role->name == 'user' ) ? Auth::User()->Enterprise : Enterprise::all();
        return view('enterprises.index', compact('enterprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('enterprises.create',compact('categories'));
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
        $enterprise = new Enterprise([
            'name' => $request->name,
            'activity_type' => $request->activity_type,
            'legal_form' => $request->legal_form,
            'exporter_type' => $request->exporter_type,
            'export_activity_code' => $request->export_activity_code,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'tel' => $request->tel,
            'website' => $request->website,
            'fax' => $request->fax,
            'balance' => 0,
            'status' => $request->status,
            'user_id' => Auth::Id(),
            'rc' => '',
            'nif' => '',
            'nis' => '',
            'manager_id' => null,
            'export_manager_id' => null,
        ]);

        Auth::user()->enterprise()->save($enterprise);

        // if ($file = $request->rc){
        //     $destinationPath ='data/enterprises/'. $enterprise->id .'/documents\/';
        //     $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
        //     $request->file('rc')->storeAs($destinationPath, $fileName);
        //     $enterprise->rc = $fileName;
        // }
        $file = $request->file('rc');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->rc = $fileName;
        }
        $file = $request->file('nis');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_nis.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->nis = $fileName;
        }
        $file = $request->file('nif');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_nif.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->nif = $fileName;
        }
        $enterprise->update();

        return redirect()->route('enterprises.index')
                        ->with('success','Enterprise created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $enterprise = Enterprise::find($id);
        return view('enterprises.edit',compact('enterprise', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $enterprise = Enterprise::find($id);
        $enterprise->name = $request->name;
        $enterprise->activity_type = $request->activity_type;
        $enterprise->legal_form = $request->legal_form;
        $enterprise->exporter_type = $request->exporter_type;
        $enterprise->export_activity_code = $request->export_activity_code;
        $enterprise->address = $request->address;
        $enterprise->email = $request->email;
        $enterprise->mobile = $request->mobile;
        $enterprise->tel = $request->tel;
        $enterprise->website = $request->website;
        $enterprise->fax = $request->fax;
        if (Auth::User()->role->name != 'user'){
            // $enterprise->balance = $request->balance;
            $enterprise->status = $request->status;    
        }

        $file = $request->file('rc');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->rc = $fileName;
        }
        $file = $request->file('nis');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_nis.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->nis = $fileName;
        }
        $file = $request->file('nif');
        if ($file) {
            $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
            $fileName = $enterprise->id.'_nif.'.$file->clientExtension();
            if (!file_exists('data/'.$destinationPath)) {
                File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
            }
            Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
            $enterprise->nif = $fileName;
        }
        $enterprise->update();

        return redirect()->route('enterprises.index')
                        ->with('success','Enterprise created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }
}