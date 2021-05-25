<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class EnsureUserInformationIsFilled extends Middleware
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
        // dd($this->auth->user()->enterprise()->exists());
        // if ($this->auth->user() && $this->auth->user()->Role->name == "user")
        // {
        //     if ((!$this->auth->user()->hasVerifiedEmail()) || (! $this->auth->user()->enterprise()->exists()) ||
        //     (! $this->auth->user()->enterprise->manager_id) 
        //     || ($this->auth->user()->enterprise->status == 'DRAFT')){
        //         return redirect()->route('registration_wizard');
        //     }
        // }
        return $next($request);
    }
}
