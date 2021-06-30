<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\AlgeriaCity;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use File;
use Storage;
use Image;

class AccountController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        try {
            //
            $categories = Category::all();
            $user = Auth::User();
            // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
            // $states = State::where('country_code', '=', 'DZ')->orderBy('iso2')->get();
            // $cities = '';
            // if (! Auth::user()->profile->city_id)
            // $cities = AlgeriaCity::all()->where('wilaya_code', '==', $user->profile->city->wilaya_code);
            // else $cities = City::all()->where('country_code', '==', 'DZ');
            return view('account', compact('user', 'categories'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tab)
    {
        try {
            //
            switch ($tab) {
                case 'account': {
                        if ($request->username && !empty($request->username)) {
                            Auth::User()->update(['username' => $request->username]);
                        }
                        if ($request->email && !empty($request->email)) {
                            Auth::User()->update(['email' => $request->email]);
                        }
                        if ($request->old_password && !empty($request->old_password)) {
                            if (
                                $request->new_password && !empty($request->new_password) && $request->new_password_confirmation
                                && !empty($request->new_password_confirmation) && ($request->new_password == $request->new_password_confirmation)
                            ) {
                                Auth::User()->update(['password' => Hash::make($request->new_password)]);
                            }
                        }
                        return redirect()->route('account.edit')
                            ->with('success', 'Account edited successfully.');
                        break;
                    }
                case 'basic': {
                        if ($request->firstname && !empty($request->firstname)) {
                            Auth::User()->profile->update(['firstname' => $request->firstname]);
                        }
                        if ($request->lastname && !empty($request->lastname)) {
                            Auth::User()->profile->update(['lastname' => $request->lastname]);
                        }
                        if ($request->gender && !empty($request->gender)) {
                            Auth::User()->profile->update(['gender' => $request->gender]);
                        }
                        if ($request->birthday && !empty($request->birthday)) {
                            Auth::User()->profile->update(['birthday' => $request->birthday]);
                        }
                        if ($request->mobile && !empty($request->mobile)) {
                            Auth::User()->profile->update(['mobile' => $request->mobile]);
                        }
                        if ($request->address && !empty($request->address)) {
                            Auth::User()->profile->update(['address' => $request->address]);
                        }
                        if ($request->city_id && !empty($request->city_id)) {
                            Auth::User()->profile->update(['city_id' => $request->city_id]);
                        }
                        $profilePicture = $request->file('profile_picture');
                        if ($profilePicture) {
                            $destinationPath = (Auth::user()->Role->name == "user") ?
                                'enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'dri/' . Auth::User()->id . '/';
                            if (!file_exists('data/' . $destinationPath)) {
                                File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                            }
                            $profilePictureFileName = Auth::User()->profile->id . '_profile_picture.' . $profilePicture->clientExtension();
                            Storage::disk('public')->put($destinationPath . $profilePictureFileName, file_get_contents($profilePicture));
                            Auth::User()->profile->update(['picture' => $profilePictureFileName]);
                        }
                        return redirect()->route('account.edit')
                            ->with('success', 'Account edited successfully.');
                        break;
                    }
                case 'enterprise': {
                        if ($request->name && !empty($request->name)) {
                            Auth::User()->Enterprise->update(['name' => $request->name]);
                        }
                        if ($request->activity_type && !empty($request->activity_type)) {
                            Auth::User()->Enterprise->update(['activity_type' => $request->activity_type]);
                        }
                        if ($request->activity_type_name && !empty($request->activity_type_name)) {
                            Auth::User()->Enterprise->update(['activity_type_name' => $request->activity_type_name]);
                        }
                        if ($request->mobile && !empty($request->mobile)) {
                            Auth::User()->Enterprise->update(['mobile' => $request->mobile]);
                        }
                        if ($request->state_id && !empty($request->state_id)) {
                            Auth::User()->Enterprise->update(['state_id' => $request->state_id]);
                        }
                        if ($request->address && !empty($request->address)) {
                            Auth::User()->Enterprise->update(['address' => $request->address]);
                        }
                        if ($request->website && !empty($request->website)) {
                            Auth::User()->Enterprise->update(['website' => $request->website]);
                        }
                        if ($request->legal_form && !empty($request->legal_form)) {
                            Auth::User()->Enterprise->update(['legal_form' => $request->legal_form]);
                        }
                        if ($request->exporter_type && !empty($request->exporter_type)) {
                            Auth::User()->Enterprise->update(['exporter_type' => $request->exporter_type]);
                        }
                        if ($request->export_activity_code && !empty($request->export_activity_code)) {
                            Auth::User()->Enterprise->update(['export_activity_code' => $request->export_activity_code]);
                        }
                        if ($request->nif_number && !empty($request->nif_number)) {
                            Auth::User()->Enterprise->update(['nif_number' => $request->nif_number]);
                        }
                        if ($request->nis_number && !empty($request->nis_number)) {
                            Auth::User()->Enterprise->update(['nis_number' => $request->nis_number]);
                        }
                        if ($request->rc_number && !empty($request->rc_number)) {
                            Auth::User()->Enterprise->update(['rc_number' => $request->rc_number]);
                        }
                        if ($request->email && !empty($request->email)) {
                            Auth::User()->Enterprise->update(['email' => $request->email]);
                        }
                        if ($request->enterprise_city_id && !empty($request->enterprise_city_id)) {
                            Auth::User()->Enterprise->update(['city_id' => $request->enterprise_city_id]);
                        }
                        if ($request->tel && !empty($request->tel)) {
                            Auth::User()->Enterprise->update(['tel' => $request->tel]);
                        }
                        if ($request->fax && !empty($request->fax)) {
                            Auth::User()->Enterprise->update(['fax' => $request->fax]);
                        }

                        $destinationPath = (Auth::user()->Role->name == "user") ?
                            'enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'dri/' . Auth::User()->id . '/';
                        if (!file_exists('data/' . $destinationPath)) {
                            File::makeDirectory('data/' . $destinationPath, $mode = 0777, true, true);
                        }
                        $nif = $request->file('nif');
                        if ($nif) {
                            $nifFileName = Auth::user()->Enterprise->id . '_nif.' . $nif->clientExtension();
                            Storage::disk('public')->put($destinationPath . $nifFileName, file_get_contents($nif));
                            Auth::User()->Enterprise->update(['nif' => $nifFileName]);
                        }
                        $nis = $request->file('nis');
                        if ($nis) {
                            $nisFileName = Auth::user()->Enterprise->id . '_nis.' . $nis->clientExtension();
                            Storage::disk('public')->put($destinationPath . $nisFileName, file_get_contents($nis));
                            Auth::User()->Enterprise->update(['nis' => $nisFileName]);
                        }
                        $rc = $request->file('rc');
                        if ($rc) {
                            $rcFileName = Auth::user()->Enterprise->id . '_rc.' . $rc->clientExtension();
                            Storage::disk('public')->put($destinationPath . $rcFileName, file_get_contents($rc));
                            Auth::User()->Enterprise->update(['rc' => $nifFileName]);
                        }
                        return redirect()->route('account.edit')
                            ->with('success', 'Account edited successfully.');
                        break;
                    }
                case 'signature_stamp': {
                        $signature = $request->file('signature');

                        $destinationPath = (Auth::user()->Role->name == "user") ?
                            'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/';
                        if (!file_exists($destinationPath)) {
                            File::makeDirectory($destinationPath, $mode = 0777, true, true);
                        }
                        if ($signature) {
                            $signatureFileName = Auth::User()->profile->id . '_signature.' . $signature->clientExtension();
                            Auth::User()->profile->update(['signature' => $signatureFileName]);
                            $image_resize = Image::make($signature->getRealPath());
                            $image_resize->resize(300, 300);
                            $image_resize->save($destinationPath . $signatureFileName);
                        }
                        $squareStamp = $request->file('square_stamp');
                        if ($squareStamp) {
                            $squareStampFileName = Auth::User()->profile->id . '_square_stamp.' . $squareStamp->clientExtension();
                            Auth::User()->profile->update(['square_stamp' => $squareStampFileName]);
                            $image_resize = Image::make($squareStamp->getRealPath());
                            $image_resize->resize(300, 150);
                            $image_resize->save($destinationPath . $squareStampFileName);
                        }
                        if (Auth::user()->Role->name == "user") {
                            $roundStamp = $request->file('round_stamp');
                            if ($roundStamp) {
                                $roundStampFileName = Auth::User()->profile->id . '_round_stamp.' . $roundStamp->clientExtension();
                                Auth::User()->profile->update(['round_stamp' => $roundStampFileName]);
                                $image_resize = Image::make($roundStamp->getRealPath());
                                $image_resize->resize(300, 300);
                                $image_resize->save($destinationPath . $roundStampFileName);
                            }
                        }
                        return redirect()->route('account.edit')
                            ->with('success', 'Account edited successfully.');
                        break;
                    }
                case 'manager': {
                        if ($request->firstname && !empty($request->firstname)) {
                            Auth::User()->Enterprise->Manager->update(['firstname' => $request->firstname]);
                        }
                        if ($request->lastname && !empty($request->lastname)) {
                            Auth::User()->Enterprise->Manager->update(['lastname' => $request->lastname]);
                        }
                        if ($request->gender && !empty($request->gender)) {
                            Auth::User()->Enterprise->Manager->update(['gender' => $request->gender]);
                        }
                        if ($request->birthday && !empty($request->birthday)) {
                            Auth::User()->Enterprise->Manager->update(['birthday' => $request->birthday]);
                        }
                        if ($request->manager_city_id && !empty($request->manager_city_id)) {
                            Auth::User()->Enterprise->Manager->update(['city_id' => $request->manager_city_id]);
                        }
                        if ($request->mobile && !empty($request->mobile)) {
                            Auth::User()->Enterprise->Manager->update(['mobile' => $request->mobile]);
                        }
                        if ($request->tel && !empty($request->tel)) {
                            Auth::User()->Enterprise->Manager->update(['tel' => $request->tel]);
                        }
                        if ($request->address && !empty($request->address)) {
                            Auth::User()->Enterprise->Manager->update(['address' => $request->address]);
                        }
                        if ($request->email && !empty($request->email)) {
                            Auth::User()->Enterprise->Manager->update(['email' => $request->email]);
                        }
                        return redirect()->route('account.edit')
                            ->with('success', 'Account edited successfully.');
                        break;
                    }
            }
        } catch (Throwable $e) {
            report($e);
            Log::error($e->getMessage());

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
