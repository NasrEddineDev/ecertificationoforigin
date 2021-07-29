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

            if (Auth::check() && Auth::user()->Role->name == "user") {
                if (!Auth::user()->hasVerifiedEmail()) {
                    return view('register', ['step' => Steps::ACTIVATION]);
                } else if (!Auth::user()->enterprise) {
                    // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    // $cities = City::all()->where('country_code', '==', 'DZ');
                    $activities = Activity::all();
                    $step = Steps::ENTERPRISE;
                    return view('register', compact('step', 'activities'));
                } else if (!Auth::user()->enterprise->manager_id) {
                    // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    // $cities = City::all()->where('country_code', '==', 'DZ');
                    // $cities = City::all()->where('state_code', '==', $state_code);
                    $step = Steps::MANAGER;
                    return view('register', compact('step'));
                } else if (!Auth::user()->enterprise->rc) {
                    // $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
                    // $cities = City::all()->where('country_code', '==', 'DZ');
                    // $cities = City::all()->where('state_code', '==', $state_code);
                    $step = Steps::ATTACHMENTS;
                    return view('register', compact('step'));
                } else if (Auth::user()->enterprise->status == 'DRAFT') {
                    return view('register', ['step' => Steps::CONFIRMATION]);
                }
                return redirect(RouteServiceProvider::HOME);
                // return view('register1', ['step' => Steps::CONFIRMATION]);
            }
            return view('register', ['step' => (Steps::REGISTRATION)]);
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
                if (!Auth::check()) {
                    $validator = $request->validate([
                        'username' => 'required|string|max:255|unique:users',
                        'email' => 'required|string|email|max:255|unique:users',
                        'password' => 'required|string|confirmed|min:8'
                    ]);

                    // process: add user and login
                    Auth::login($user = User::create([
                        'username' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'role_id' => Role::where('name', 'user')->first()->id,
                    ]));
                    event(new Registered($user));
                } else {
                    $validator = $request->validate([
                        'username' => 'required|string|max:255',
                        'email' => 'required|string|email|max:255',
                        'password' => 'required|string|confirmed|min:8',
                    ]);

                    if ($request->username != Auth::user()->username) {
                        Auth::user()->update(['username' => $request->username]);
                    }
                    if ($request->email != Auth::user()->email) {
                        Auth::user()->update(['email' => $request->email]);
                        Auth::user()->update(['email_verified_at' => null]);
                        $request->user()->sendEmailVerificationNotification();
                    }
                    if ($request->password != Auth::user()->password)
                        // if ($request->password != 'Test1988*' && !Hash::check($request->password, Auth::user()->password))
                        Auth::user()->update(['password' => Hash::make($request->password)]);
                }
                return response()->json([
                    'hasVerifiedEmail' => Auth::user()->hasVerifiedEmail(),
                    'step' => Steps::ACTIVATION,
                ], 200);
            } else if ($step == Steps::ACTIVATION) {
                //validate
                if ($request->user()->hasVerifiedEmail()) {
                    return response()->json([
                        'hasVerifiedEmail' => Auth::user()->hasVerifiedEmail(),
                        'step' => Steps::ENTERPRISE
                    ], 200);
                }

                return response()->json([
                    'message' => 'Email isn\'t verified',
                    'step' => Steps::ACTIVATION
                ], 200);
            } else if ($step == Steps::ENTERPRISE) {
                // validate
                if (!Auth::user()->enterprise) {
                    $request->validate([
                        'name_ar' => 'required|string|max:255|',
                        'name' => 'required|string|max:255|',
                        'name_fr' => 'required|string|max:255|',
                        'rc_number' => 'required|string|max:255|',
                        'nis_number' => 'required|string|max:255|',
                        'nif_number' => 'required|string|max:255|',
                        // 'activities' => 'required|array',
                        'exporter_type' => 'required|string|max:255|',
                        'legal_form' => 'required|string|max:255|',
                        'mobile' => 'required|string|',
                        'email_enterprise' => 'required|string|email|max:255|',
                        'tel' => 'nullable|string|max:255|',
                        'address_ar' => 'required|string|max:255|',
                        'address' => 'required|string|max:255|',
                        'address_fr' => 'required|string|max:255|',
                        'state_code' => 'required|string|max:255|',
                        'city_id' => 'required|string|max:255|',
                        'website' => 'nullable|url|max:255|',
                    ]);
                    // add enterprise
                    $enterprise = new Enterprise([
                        'name_ar' => $request->name_ar,
                        'name' => $request->name,
                        'name_fr' => $request->name_fr,
                        'rc_number' => $request->rc_number,
                        'nis_number' => $request->nis_number,
                        'nif_number' => $request->nif_number,
                        'legal_form' => $request->legal_form,
                        'exporter_type' => $request->exporter_type,
                        'export_activity_code' => $request->export_activity_code ? $request->export_activity_code : '',
                        'mobile' => $request->mobile,
                        'email' => $request->email_enterprise,
                        'tel' => $request->tel ? $request->tel : '',
                        'address_ar' => $request->address_ar,
                        'address' => $request->address,
                        'address_fr' => $request->address_fr,
                        'website' => $request->website ? $request->website : '',
                        'balance' => 100,
                        'status' => 'DRAFT',
                        'rc' => '',
                        'nif' => '',
                        'nis' => '',
                        'manager_id' => null,
                        'user_id' => Auth::Id(),
                        'city_id' => $request->city_id,
                    ]);

                    Auth::user()->enterprise()->save($enterprise);

                    foreach ($request->activities as $activity_id) {
                        $enterprise->activities()->attach($activity_id, ['enterprise_id' => $enterprise->id]);
                    }
                } else {
                    $request->validate([
                        'name_ar' => 'required|string|max:255|',
                        'name' => 'required|string|max:255|',
                        'name_fr' => 'required|string|max:255|',
                        'rc_number' => 'required|string|max:255|',
                        'nis_number' => 'required|string|max:255|',
                        'nif_number' => 'required|string|max:255|',
                        // 'activities' => 'required|array',
                        'exporter_type' => 'required|string|max:255|',
                        'legal_form' => 'required|string|max:255|',
                        'mobile' => 'required|string|',
                        'email_enterprise' => 'required|string|email|max:255|',
                        'tel' => 'nullable|string|max:255|',
                        'address_ar' => 'required|string|max:255|',
                        'address' => 'required|string|max:255|',
                        'address_fr' => 'required|string|max:255|',
                        'state_code' => 'required|string|max:255|',
                        'city_id' => 'required|string|max:255|',
                        'website' => 'nullable|url|max:255|',
                    ]);
                }
                // $destinationPath = 'enterprises/' . $enterprise->id .'/' . 'documents/';
                // if (!file_exists('data/'.$destinationPath)) {
                //     File::makeDirectory('data/'.$destinationPath, $mode = 0777, true, true);
                // }

                // $file = $request->file('rc');
                // if ($file) {
                //     $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
                //     Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                //     $enterprise->rc = $fileName;
                // }

                // $file = $request->file('nis');
                // if ($file) {
                //     $fileName = $enterprise->id.'_nis.'.$file->clientExtension();
                //     Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                //     $enterprise->nis = $fileName;
                // }
                // $file = $request->file('nif');
                // if ($file) {
                //     $fileName = $enterprise->id.'_nif.'.$file->clientExtension();
                //     Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                //     $enterprise->nif = $fileName;
                // }
                // $enterprise->update();
                return response()->json([
                    'message' => '',
                    'step' => Steps::MANAGER
                ], 200);

                // $activities = (array)json_decode($request->activities);
                // foreach($activities as $activity){
                //     $activity = new Activity([
                //         'code' => $request->activity_code,
                //         'name' => $request->activity_name,
                //         'enterprise_id' => $enterprise->id
                //     ]);
                //     $activity->save();
                // }


            } else if ($step == Steps::MANAGER) {
                //validate

                if (!Auth::user()->enterprise->manager_id) {
                    $request->validate([
                        'firstname_ar' => 'required|string|max:255|',
                        'firstname' => 'required|string|max:255|',
                        'lastname_ar' => 'required|string|max:255|',
                        'lastname' => 'required|string|max:255|',
                        'email_manager' => 'required|string|email|max:255|',
                        'mobile_manager' => 'required|string|',
                        'tel_manager' => 'nullable|string|max:255|',
                        'address_manager_ar' => 'required|string|max:255|',
                        'address_manager' => 'required|string|max:255|',
                        'state_code_manager' => 'required|string|max:255|',
                        'city_id_manager' => 'required|string|max:255|',
                        'birthday' => 'required|string|max:255|'
                    ]);
                    // process: add enterprise
                    $manager = new Manager([
                        'firstname_ar' => $request->firstname_ar,
                        'firstname' => $request->firstname,
                        'lastname_ar' => $request->lastname_ar,
                        'lastname' => $request->lastname,
                        'email' => $request->email_manager,
                        'mobile' => $request->mobile_manager,
                        'tel' => $request->tel_manager ? $request->tel_manager : '',
                        'address_ar' => $request->address_manager_ar,
                        'address' => $request->address_manager,
                        'city_id' => $request->city_id_manager,
                        'birthday' => $request->birthday,
                        'gender' => $request->gender
                    ]);

                    $manager->save();

                    Auth::user()->enterprise->update(['manager_id' => $manager->id]);
                } else {
                    $request->validate([
                        'firstname_ar' => 'required|string|max:255|',
                        'firstname' => 'required|string|max:255|',
                        'lastname_ar' => 'required|string|max:255|',
                        'lastname' => 'required|string|max:255|',
                        'email_manager' => 'required|string|email|max:255|',
                        'mobile_manager' => 'required|string|',
                        'tel_manager' => 'nullable|string|max:255|',
                        'address_manager_ar' => 'required|string|max:255|',
                        'address_manager' => 'required|string|max:255|',
                        'state_code_manager' => 'required|string|max:255|',
                        'city_id_manager' => 'required|string|max:255|',
                        'birthday' => 'required|string|max:255|'
                    ]);

                    if ($request->firstname_ar != Auth::user()->enterprise->manager->firstname_ar) {
                        Auth::user()->update(['firstname_ar' => $request->firstname_ar]);
                    }

                    if ($request->firstname != Auth::user()->enterprise->manager->firstname) {
                        Auth::user()->update(['firstname' => $request->firstname]);
                    }

                    if ($request->lastname_ar != Auth::user()->enterprise->manager->lastname_ar) {
                        Auth::user()->update(['lastname_ar' => $request->lastname_ar]);
                    }

                    if ($request->lastname != Auth::user()->enterprise->manager->lastname) {
                        Auth::user()->update(['lastname' => $request->lastname]);
                    }

                    if ($request->email_manager != Auth::user()->enterprise->manager->email) {
                        Auth::user()->update(['email' => $request->email_manager]);
                    }

                    if ($request->mobile_manager != Auth::user()->enterprise->manager->mobile) {
                        Auth::user()->update(['mobile' => $request->mobile_manager]);
                    }

                    if ($request->tel_manager != Auth::user()->enterprise->manager->tel) {
                        Auth::user()->update(['tel' => $request->tel_manager]);
                    }

                    if ($request->address_manager_ar != Auth::user()->enterprise->manager->address_ar) {
                        Auth::user()->update(['address_ar' => $request->address_manager_ar]);
                    }

                    if ($request->address_manager != Auth::user()->enterprise->manager->address) {
                        Auth::user()->update(['address' => $request->address_manager]);
                    }

                    if ($request->city_id_manager != Auth::user()->enterprise->manager->city_id) {
                        Auth::user()->update(['city_id' => $request->city_id_manager]);
                    }

                    if ($request->birthday != Auth::user()->enterprise->manager->birthday) {
                        Auth::user()->update(['birthday' => $request->birthday]);
                    }
                }
                return response()->json([
                    'message' => '',
                    'step' => Steps::ATTACHMENTS
                ], 200);
            } else if ($step == Steps::ATTACHMENTS) {
                // $request->validate([
                //     'file' => 'required',
                //     'file.*' => 'mimes:doc,pdf,docx,txt,zip,jpeg,jpg,png'
                // ]);
                // if($request->hasfile('file')) { 
                    $destinationPath = 'data/enterprises/' . (Auth::User()->Enterprise->id) . '/' . 'documents/testfolder/';
                    if (!file_exists($destinationPath)) {
                        File::makeDirectory($destinationPath, $mode = 0777, true, true);
                    }
                    foreach($request->file('files') as $file)
                    {

                        $fileName = mt_rand(100000,999999).'_'.'.'.$file->clientExtension();
                        Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                        // Auth::User()->Enterprise->rc = $fileName;
                        // if (image){
                        //     $signatureFileName = $manager->firstname . '_' . $manager->lastname . '_signature.' . $signature->clientExtension();
                        //     $image_resize = Image::make($signature->getRealPath());
                        //     $image_resize->resize(300, 300);
                        //     $image_resize->save($destinationPath . $signatureFileName);
                        // }
                        // else {
                        //     $file = $request->file('rc');
                        //     if ($file) {
                        //         $fileName = $enterprise->id.'_rc.'.$file->clientExtension();
                        //         Storage::disk('public')->put($destinationPath . $fileName, file_get_contents($file));
                        //         $enterprise->rc = $fileName;
                        //     }
                        // }
        
                        // $fileName = time().rand(0, 1000).pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        // $fileName = $fileName.'.'.$file->getClientOriginalExtension();
                        // $file->move(public_path(),$fileName);
                        // $input['file'] = $filename;
                        // Document::create($input);
                    }
                // } 

                // $signature = $request->signature;
                // $round_stamp = $request->round_stamp;
                // $square_stamp = $request->square_stamp;
                // if ($signature && $round_stamp && $square_stamp) {
                //     $destinationPath = 'data/enterprises/' . (Auth::User()->Enterprise->id) . '/' . 'documents/';
                //     if (!file_exists($destinationPath)) {
                //         File::makeDirectory($destinationPath, $mode = 0777, true, true);
                //     }

                //     $signatureFileName = $manager->firstname . '_' . $manager->lastname . '_signature.' . $signature->clientExtension();
                //     // Storage::disk('public')->put($destinationPath . $signatureFileName, file_get_contents($signature));
                //     $image_resize = Image::make($signature->getRealPath());
                //     $image_resize->resize(300, 300);
                //     $image_resize->save($destinationPath . $signatureFileName);

                //     $roundStampFileName = $manager->firstname . '_' . $manager->lastname . '_round_stamp.' . $round_stamp->clientExtension();
                //     // Storage::disk('public')->put($destinationPath . $roundStampFileName, file_get_contents($round_stamp));
                //     $image_resize = Image::make($round_stamp->getRealPath());
                //     $image_resize->resize(300, 300);
                //     $image_resize->save($destinationPath . $roundStampFileName);

                //     $squareStampFileName = $manager->firstname . '_' . $manager->lastname . '_square_stamp.' . $square_stamp->clientExtension();
                //     // Storage::disk('public')->put($destinationPath . $squareStampFileName, file_get_contents($square_stamp));
                //     $image_resize = Image::make($square_stamp->getRealPath());
                //     $image_resize->resize(300, 300);
                //     $image_resize->save($destinationPath . $squareStampFileName);

                //     $profile = new Profile([
                //         'firstname'  => '',
                //         'lastname'  => '',
                //         'birthday' => null,
                //         'gender'  => null,
                //         'address'  => '',
                //         'mobile'  => '',
                //         'agce_user_id'  => '',
                //         'signature'  => $signatureFileName,
                //         'round_stamp'  => $roundStampFileName,
                //         'square_stamp' => $squareStampFileName,
                //         'picture' => '',
                //         'city_id' => Auth::user()->enterprise->city_id,
                //         'language' => 'ar'
                //     ]);

                //     $profile->save();

                //     Auth::user()->update(['profile_id' => $profile->id]);
                // }

                return response()->json([
                    'message' => $request->hasfile('files'),
                    'step' => Steps::CONFIRMATION
                ], 200);
            } else if ($step == Steps::CONFIRMATION) {
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

            return view('register1', ['step' => $step]);
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
            if ($model == 'user') {
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
