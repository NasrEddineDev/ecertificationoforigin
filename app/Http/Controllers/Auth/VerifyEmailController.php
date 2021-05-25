<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\login;
use App\Models\User;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        // if (!Auth::check()){
        //     // $user = User::where('email', '=', $request->user()->email)->first();    
        //     $user = User::find($request->route('id'));
        //     // if (Hash::check($request->password, $user->password)) {
        //         if (Auth::login($user)) {
        //             event(new login($user));             
        //         }
        //     // }
        // }


        if ($request->user()->hasVerifiedEmail()) {
            // return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            return redirect()->route('registration_wizard');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        // Auth::login($request->user());
        // return redirect(RouteServiceProvider::HOME);
        return redirect()->route('registration_wizard');
        // return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
