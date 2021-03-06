<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Enums\Steps;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        try {
            if ($request->recaptchaIsChecked == 'false')
                return response()->json([
                    'recaptchaIsChecked' => $request->recaptchaIsChecked,
                    'result' => 'failed',
                    'errors' => ['recaptcha' => __('Captcha must be checked')]
                ], 422);

            $request->validate([
                'email' => 'required|string|email|max:255|', //unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::where('email', '=', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if (Auth::login($user, $request->has('remember'))) {
                    event(new login($user));
                }
            }

            if (!Auth::check())
                return response()->json([
                    'result' => 'failed',
                    'errors' => ['email' => __('Credentials are incorrect'), 'password' => __('Credentials are incorrect')]
                ], 422);
            else {
                if (Auth::user()->role->name != 'user')
                    return response()->json([
                        'result' => 'success',
                        'message' => '',
                        'url' => url(RouteServiceProvider::HOME)
                    ], 200);

                if (
                    !Auth::user()->hasVerifiedEmail() || !Auth::user()->enterprise || !Auth::user()->enterprise->manager_id
                    || Auth::user()->enterprise->status == 'DRAFT'
                ) {
                    return response()->json([
                        'result' => 'success',
                        'message' => '',
                        'url' => route('register1')
                    ], 200);
                }
                return response()->json([
                    'result' => 'success',
                    'message' => '',
                    'url' => url(RouteServiceProvider::HOME)
                ], 200);
            }
        } catch (Throwable $e) {
            // } catch(\Illuminate\Database\QueryException $ex){ 
            report($e);
            Log::error($e->getMessage());

            return response()->json([
                'result' => 'failed',
                'errors' => ['email' => __('Internal Server Error'), 'password' => __('Internal Server Error')]
                // 'errors' => ['email' => __('Credentials are incorrect'), 'password' => __('Credentials are incorrect')]
            ], 422);

            return false;
        }
        // if (Auth::user()->role->name != 'user') return redirect(RouteServiceProvider::HOME);

        // if (!Auth::user()->hasVerifiedEmail()) {
        //     return view('registration_wizard', ['step' => Steps::ACTIVATION]);
        // }
        // else if (! Auth::user()->enterprise){
        //     $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
        //     $cities = City::all()->where('country_code', '==', 'DZ');
        //     $activities = Activity::all();
        //     $step = Steps::ENTERPRISE;
        //     return view('registration_wizard', compact('step', 'states', 'cities', 'activities'));
        // }
        // else if (! Auth::user()->enterprise->manager_id ){
        //     $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
        //     $cities = City::all()->where('country_code', '==', 'DZ');
        //     // $cities = City::all()->where('state_code', '==', $state_code);
        //     $step = Steps::MANAGER;
        //     return view('registration_wizard', compact('step', 'states', 'cities'));
        // }
        // else if (Auth::user()->enterprise->status == 'DRAFT'){
        //     return view('registration_wizard', ['step' => Steps::CONFIRMATION]);
        // }

        // return redirect(RouteServiceProvider::HOME);
    }
    // public function store(LoginRequest $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email|max:255|',//unique:users',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     $user = User::where('email', '=', $request->email)->first();    

    //     if (Hash::check($request->password, $user->password)) {
    //         if (Auth::login($user)) {
    //             event(new login($user));
    //         }
    //     }


    //     if (Auth::user()->role->name != 'user') return redirect(RouteServiceProvider::HOME);

    //     if (!Auth::user()->hasVerifiedEmail()) {
    //         return view('registration_wizard', ['step' => Steps::ACTIVATION]);
    //     }
    //     else if (! Auth::user()->enterprise){
    //         $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
    //         $cities = City::all()->where('country_code', '==', 'DZ');
    //         $activities = Activity::all();
    //         $step = Steps::ENTERPRISE;
    //         return view('registration_wizard', compact('step', 'states', 'cities', 'activities'));
    //     }
    //     else if (! Auth::user()->enterprise->manager_id ){
    //         $states = State::all()->where('country_code', '==', 'DZ')->sortBy('iso2');
    //         $cities = City::all()->where('country_code', '==', 'DZ');
    //         // $cities = City::all()->where('state_code', '==', $state_code);
    //         $step = Steps::MANAGER;
    //         return view('registration_wizard', compact('step', 'states', 'cities'));
    //     }
    //     else if (Auth::user()->enterprise->status == 'DRAFT'){
    //         return view('registration_wizard', ['step' => Steps::CONFIRMATION]);
    //     }

    //     return redirect(RouteServiceProvider::HOME);
    // }
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
