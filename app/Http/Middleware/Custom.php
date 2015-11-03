<?php

namespace App\Http\Middleware;

use Closure;

class Custom
{

    /**
     * Create a new filter instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if ($this->auth->guest()) {
        if ($request->session()->has('users') && !is_null($request->session()->get('users'))) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('users/login');
            }
        }

        return $next($request);
    }
}
