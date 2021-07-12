<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\App;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return redirect('/');
        }
    }
    public function handle($request, Closure $next)
    {
        //check here if the user is authenticated
        if ( ! $this->auth->user() )
        {
            return redirect('/');
        }

        if ($this->auth->user()->profile && $this->auth->user()->profile->language){
            App::setLocale($this->auth->user()->profile->language);
        }
        return $next($request);
    }
}