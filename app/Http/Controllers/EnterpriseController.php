<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Storage;
use App\Events\EnterprisePendingEvent;
use App\Events\EnterpriseActivatedEvent;
use App\Events\EnterpriseSuspendedEvent;
use App\Events\EnterpriseStoppedEvent;

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
        try {
            //
            $enterprises = (Auth::User()->role->name == 'user') ? Auth::User()->Enterprise : Enterprise::all();
            return view('enterprises.index', compact('enterprises'));
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
            $categories = Category::all();
            return view('enterprises.create', compact('categories'));
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
            $enterprise = new Enterprise([
                'name' => $request->name,
                'legal_form' => $request->legal_form,
                'exporter_type' => $request->exporter_type,
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
            
            $file = $request->file('rc');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_rc.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->rc = $fileName;
            }
            $file = $request->file('nis');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_nis.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->nis = $fileName;
            }
            $file = $request->file('nif');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_nif.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public/data')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->nif = $fileName;
            }
            $enterprise->update();

            return redirect()->route('enterprises.index')
                ->with('success', 'Enterprise created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
        try {
            //
            $categories = Category::all();
            $enterprise = Enterprise::find($id);
            // $activities_codes = $enterprise->activities()->pluck('code')->join(',');
            return view('enterprises.edit', compact('enterprise', 'categories'));
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
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //
            $enterprise = Enterprise::find($id);
            $enterprise->name = $request->name;
            $enterprise->legal_form = $request->legal_form;
            $enterprise->exporter_type = $request->exporter_type;
            $enterprise->address = $request->address;
            $enterprise->email = $request->email;
            $enterprise->mobile = $request->mobile;
            $enterprise->tel = $request->tel;
            $enterprise->website = $request->website;
            $enterprise->fax = $request->fax;
            $enterprise->city_id = ($request->city_id) ? $request->city_id : $enterprise->city_id;
            if (Auth::User()->role->name != 'user') {
                if ($request->status == "PENDING")
                            event(new EnterprisePendingEvent($enterprise));
                else if ($request->status == "ACTIVATED")
                            event(new EnterpriseActivatedEvent($enterprise));
                else if ($request->status == "SUSPENDED")
                            event(new EnterpriseSuspendedEvent($enterprise));
                else if ($request->status == "STOPPED")
                            event(new EnterpriseStoppedEvent($enterprise));
                            
                $enterprise->status = $request->status;
            }

            $enterprise->activities()->detach();
            foreach ($request->activities as $activity_id) {
                $enterprise->activities()->attach($activity_id, [
                    'enterprise_id' => $enterprise->id,
                ]);
            }

            $file = $request->file('rc');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_rc.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->rc = $fileName;
            }
            $file = $request->file('nis');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_nis.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->nis = $fileName;
            }
            $file = $request->file('nif');
            if ($file) {
                $destinationPath = 'enterprises/' . $enterprise->id . '/' . 'documents/';
                $fileName = $enterprise->id . '_nif.' . $file->clientExtension();
                if (!file_exists('data/' . $destinationPath)) {
                    File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                }
                Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                $enterprise->nif = $fileName;
            }
            $enterprise->update();

            return redirect()->route('enterprises.index')
                ->with('success', 'Enterprise created successfully.');
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
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
