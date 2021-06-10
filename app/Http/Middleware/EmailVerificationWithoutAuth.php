<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\login;
use App\Models\User;

class EmailVerificationWithoutAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()){
            $user = User::find($request->route('id'));
                if (Auth::login($user)) {
                    event(new login($user));             
                }
        }

        return $next($request);
    }
}
