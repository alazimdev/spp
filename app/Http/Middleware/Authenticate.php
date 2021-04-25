<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

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
        if(Auth::guard('student')->check()){
            return route('page-siswa-index');
        }else if(Auth::guard('web')->check()){
            return route('index');
        }
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
