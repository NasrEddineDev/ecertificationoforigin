<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Steps;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Support\Facades\Storage;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Enterprise;
use App\Models\Manager;
use App\Models\Profile;
use App\Models\State;
use App\Models\City;
use App\Models\Activity;
use Illuminate\Support\Facades\App;
use File;
use Storage;
use Image;

class RegisterController extends Controller
{
    // public $currentStep = config('enums.steps.REGISTRATION');
    // PUBLIC $currentStep = Steps::REGISTRATION;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['guest', 'auth']);
        // $this->middleware(['verified']);
    }

    /**
     * Show the registration wizard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
        // App::setLocale('ar');
        // session()->put('locale', 'ar');
        $locale = App::currentLocale();
        
        // if (App::isLocale('ar')) {
        //     App::setLocale('ar');
        // }
        // else if (App::isLocale('en')) {
        //     App::setLocale('en');
        // }
        // else if (App::isLocale('fr')) {
        //     App::setLocale('fr');
        // }

        if (Auth::check() && Auth::user()->Role->name == "user")
        {
            if (!Auth::user()->hasVerifiedEmail()) {
                return view('registration_wizard', ['step' => Steps::ACTIVATION]);
            }
            else if (! Auth::user()->enterprise){
                // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                // $cities = City::all()->where('country_code', '==', 'DZ');
                $activities = Activity::all();
                $step = Steps::ENTERPRISE;
                return view('registration_wizard', compact('step', 'activities'));
            }
            else if (! Auth::user()->enterprise->manager_id ){
                // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                // $cities = City::all()->where('country_code', '==', 'DZ');
                // $cities = City::all()->where('state_code', '==', $state_code);
                $step = Steps::MANAGER;
                return view('registration_wizard', compact('step'));
            }
            else if (Auth::user()->enterprise->status == 'DRAFT'){
                return view('registration_wizard', ['step' => Steps::CONFIRMATION]);
            }
            return redirect(RouteServiceProvider::HOME);
            // return view('registration_wizard', ['step' => Steps::CONFIRMATION]);
        }
        return view('register', ['step' => Steps::REGISTRATION]);
        // return redirect(RouteServiceProvider::HOME);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        try {
        $step = (int)$request->step;
            if ($step == Steps::REGISTRATION) {
                //validate
                if (!Auth::check()){
                $validator = $request->validate([
                    'username' => 'required|string|max:255|unique:users',
                    'email' => 'required|string|email|confirmed|max:255|unique:users',
                    'password' => 'required|string|confirmed|min:8',
                ]);

                // process: add user and login
                Auth::login($user = User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => Role::where('name', 'user')->first()->id,
                ]));
                event(new Registered($user));
                }
                return response()->json([
                    'message' => 'Verify your email',
                    'step' => Steps::ACTIVATION
                ], 200);
            } else if ($step == Steps::ACTIVATION) {
                //validate
                if ($request->user()->hasVerifiedEmail()) {
                    return response()->json([
                        'message' => 'Email is verified',
                        'step' => Steps::ENTERPRISE
                    ], 200);
                }

                return response()->json([
                    'message' => 'Email isn\'t verified',
                    'step' => Steps::ACTIVATION
                ], 200);
                 
            } else if ($step == Steps::ENTERPRISE) {
                //validate
                // $request->validate([
                //     'username' => 'required|string|max:255|',//unique:users',
                //     'email' => 'required|string|email|confirmed|max:255|',//unique:users',
                //     'password' => 'required|string|confirmed|min:8',
                // ]);
                // process: add enterprise

                $enterprise = new Enterprise([
                    'name' => $request->name,
                    // 'activity_type' => $request->activity_type,
                    // 'activity_type_name' => $request->activity_type_name ? $request->activity_type_name : '',
                    'legal_form' => $request->legal_form,
                    'exporter_type' => $request->exporter_type,
                    // 'export_activity_code' => $request->export_activity_code ? $request->export_activity_code : '',
                    'address' => $request->address_enterprise,
                    'email' => $request->email_enterprise,
                    'mobile' => $request->mobile_enterprise,
                    'tel' => $request->tel_enterprise ? $request->tel_enterprise : '',
                    'website' => $request->website ? $request->website : '',
                    'fax' => $request->fax_enterprise ? $request->fax_enterprise : '',
                    'balance' => 100,
                    'status' => 'DRAFT',
                    'rc' => '',
                    'rc_number' => $request->rc_number,
                    'nif' => '',
                    'nif_number' => $request->nif_number,
                    'nis' => '',
                    'nis_number' => $request->nis_number,
                    'manager_id' => null,
                    'user_id' => Auth::Id(),
                    'city_id' => $request->city_id,
                ]);

                Auth::user()->enterprise()->save($enterprise);
   
                foreach (explode(',', $request->activities) as $activity_id) {
                    $enterprise->activities()->attach($activity_id, [
                        'enterprise_id' => $enterprise->id,
                    ]);
                }

                $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
                if (!file_exists('data/'.$destinationPath)) {
                    File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
                }

                $file = $request->file('rc');
                if ($file) {
                    $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
                    Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                    $enterprise->rc = $fileName;
                }

                $file = $request->file('nis');
                if ($file) {
                    $fileName = $enterprise->id.'_nis.'.$file->clientExtension();
                    Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                    $enterprise->nis = $fileName;
                }
                $file = $request->file('nif');
                if ($file) {
                    $fileName = $enterprise->id.'_nif.'.$file->clientExtension();
                    Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                    $enterprise->nif = $fileName;
                }
                $enterprise->update();
                return response()->json([
                    'message' => '',
                    'step' => Steps::MANAGER
                ], 200);
                 
                $activities = (array)json_decode($request->activities);
                foreach($activities as $activity){
                    $activity = new Activity([
                        'code' => $request->activity_code,
                        'name' => $request->activity_name,
                        'enterprise_id' => $enterprise->id
                    ]);
                    $activity->save();
                }


            } else if ($step == Steps::MANAGER) {
                //validate
                // $request->validate([
                //     'username' => 'required|string|max:255|',//unique:users',
                //     'email' => 'required|string|email|confirmed|max:255|',//unique:users',
                //     'password' => 'required|string|confirmed|min:8',
                // ]);
                // process: add enterprise
                $manager = new Manager([
                    'firstname' => $request->firstname_manager,
                    'lastname' => $request->lastname_manager,
                    'birthday' => $request->birthday_manager,
                    'gender' => $request->gender_manager,
                    'address' => $request->address_manager,
                    'email' => $request->email_manager,
                    'mobile' => $request->mobile_manager,
                    'tel' => $request->tel_manager,
                    'city_id' => $request->city_id_manager
                ]);
                
                $signature = $request->signature;
                $round_stamp = $request->round_stamp;
                $square_stamp = $request->square_stamp;
                if( $signature && $round_stamp && $square_stamp ) {
                    $destinationPath ='data/enterprises/'. (Auth::User()->Enterprise->id) .'/'.'documents/';
                    if (!file_exists($destinationPath)) {
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }

                    $signatureFileName = $manager->firstname.'_'.$manager->lastname.'_signature.'.$signature->clientExtension();
                    // Storage::disk('public')->put($destinationPath . $signatureFileName, file_get_contents($signature));
                    $image_resize = Image::make($signature->getRealPath());              
                    $image_resize->resize(300, 300);
                    $image_resize->save($destinationPath . $signatureFileName);

                    $roundStampFileName = $manager->firstname.'_'.$manager->lastname.'_round_stamp.'.$round_stamp->clientExtension();
                    // Storage::disk('public')->put($destinationPath . $roundStampFileName, file_get_contents($round_stamp));
                    $image_resize = Image::make($round_stamp->getRealPath());              
                    $image_resize->resize(300, 300);
                    $image_resize->save($destinationPath . $roundStampFileName);

                    $squareStampFileName = $manager->firstname.'_'.$manager->lastname.'_square_stamp.'.$square_stamp->clientExtension();
                    // Storage::disk('public')->put($destinationPath . $squareStampFileName, file_get_contents($square_stamp));
                    $image_resize = Image::make($square_stamp->getRealPath());              
                    $image_resize->resize(300, 300);
                    $image_resize->save($destinationPath . $squareStampFileName);

                    $profile = new Profile([
                        'firstname'  => '',
                        'lastname'  => '',
                        'birthday' => null,
                        'gender'  => null,
                        'address'  => '',
                        'mobile'  => '',
                        'agce_user_id'  => '',
                        'signature'  => $signatureFileName,
                        'round_stamp'  => $roundStampFileName,
                        'square_stamp' => $squareStampFileName,
                        'picture' => '',
                        'city_id' => Auth::user()->enterprise->city_id,
                        'language' => 'ar'
                    ]);

                    $profile->save();
                    
                    Auth::user()->update(['profile_id' => $profile->id]);
                }

                $manager->save();

                Auth::user()->enterprise->update(['manager_id' => $manager->id]);

                return response()->json([
                    'message' => $request->firstname_manager,
                    'step' => Steps::CONFIRMATION
                ], 200);
            }                
            // else if ($step == Steps::EXPORT_MANAGER) {
            //     //validate
            //     // $request->validate([
            //     //     'username' => 'required|string|max:255|',//unique:users',
            //     //     'email' => 'required|string|email|confirmed|max:255|',//unique:users',
            //     //     'password' => 'required|string|confirmed|min:8',
            //     // ]);
            //     // process: add enterprise
            //     $export_manager = new ExportManager([
            //         'firstname' => $request->firstname_export_manager,
            //         'lastname' => $request->lastname_export_manager,
            //         'birthday' => $request->birthday_export_manager,
            //         'gender' => $request->gender_export_manager,
            //         'position' => $request->position_export_manager,
            //         // 'status' => 0,
            //         'address' => $request->address_export_manager,
            //         'email' => $request->email_export_manager,
            //         'mobile' => $request->mobile_export_manager,
            //         'tel' => $request->tel_export_manager
            //     ]);

            //     if( $file = $request->stamp ) {
            //         $destinationPath ='data/enterprises/'. (Auth::User()->Enterprise->id) .'/export-manager\/';
            //         // $destinationPath = storage_path( 'app/public/export_manager' );
            //         $fileName = $export_manager->firstname.' '.$export_manager->lastname.' stamp.'.$file->clientExtension();
                    
            //         $request->file('stamp')->storeAs($destinationPath, $fileName);
            //         Auth::user()->stamp = $fileName;
            //     }

            //     // Auth::user()->enterprise()->manager()->export_manager()->save($export_manager);
                
            //     $export_manager->save();

            //     Auth::user()->enterprise->update(['export_manager_id' => $export_manager->id]);

                
            //     if( $file = $request->signature ) {
            //         $destinationPath ='enterprises/'. (Auth::User()->Enterprise->id) .'/export-manager\/';
            //         // $destinationPath = storage_path( 'app/public/export_manager' );
            //         $fileName = $export_manager->firstname.' '.$export_manager->lastname.' signature.'.$file->clientExtension();
            //         $request->file('signature')->storeAs($destinationPath, $fileName);

            //         $signature = new Signature([
            //             'title' => 'First signature',
            //             'description' => 'Created at registration',
            //             'signature' => $fileName,
            //             'user_id' => Auth::user()->id
            //         ]);

            //         $signature->save();
            //         // Auth::user()->enterprise()->export_manager()->signature()->save($signature);

            //         // Auth::user()->enterprise()->manager()->export_manager()->signature()->save($signature);
            //     }

            //     return response()->json([
            //         'message' => '',
            //         'step' => Steps::CONFIRMATION
            //     ], 200);
                 
            // } 
            else if ($step == Steps::CONFIRMATION) {
                //validate
                // if ($request->user()->hasVerifiedEmail()) {
                //     return response()->json([
                //         'message' => '',
                //         'step' => config('enums.steps.')
                //     ], 200);
                // }
                Auth::user()->enterprise->update(['status' => 'PENDING']);

                return response()->json([
                    'message' => '',
                    'url' => RouteServiceProvider::HOME
                ], 200);
                //process
                 
            } else {
                $step = $this->wizard->getBySlug($step);
            }
        // } catch (StepNotFoundException $e) {
        //     abort(404);
        // }

        return view('registration_wizard', ['step' => $step]);
        return redirect()->route('wizard.user', [$this->wizard->nextSlug()]);
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }

    public function isExist($model, $property, $value)
    {
        try {
        return false;
        if ($model == 'user'){
            $user = User::where($property, '=', $value)->first();
            if ($user) return true;
        }
        return false;
    } catch (Throwable $e) {
        report($e);
        Log::error($e->getMessage());

        return false;
    }
    }
}
