<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
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
            if(Auth::user()->user_level == '1'){

                return $next($request);

            }else{

                return redirect('/students/dashboard');
                // return $next($request);
            }

        }else{
            return redirect('/login')->with('message', 'Please Login');

        }
        return $next($request);
    }
}
