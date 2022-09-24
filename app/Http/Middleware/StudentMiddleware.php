<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            //admin role == 1
            //student role == 2
            if(Auth::user()->user_level == '2'){

                return $next($request);

            }else{

                return redirect('/');
                // return $next($request);
            }

        }else{
            return redirect('/')->with('message', 'Please Login');

        }
        return $next($request);
    }
}
