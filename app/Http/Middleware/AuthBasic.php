<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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
        if(Auth::onceBasic()){
            return response()->json(["message"=>"User Not Auth"],401);
        }else{
        return $next($request);
        }
    }
}
//composer require paragonie/random_compact=~2.0
//composer require laravel/passport=~4.0
