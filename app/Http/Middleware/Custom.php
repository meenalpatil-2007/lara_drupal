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
        if (is_null($request->session()->get('user'))) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                //return redirect()->action('UserController@getLogin');
                //return View('auth.login');
            }
        }

        return $next($request);
    }
}
