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
        if (!$request->session()->has('user') 
        && (!$request->is('user/*') 
        || $request->is('user/logout'))) {
            return redirect('user/login');
        }
        elseif ($request->session()->has('user') 
        && ($request->is('user/*') 
        && !$request->is('user/logout'))) {
            return redirect('/');
        }
        
        return $next($request);
    }
}
