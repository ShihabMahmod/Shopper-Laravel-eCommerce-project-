<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Http\Request;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         $email = $request->session()->get('user_email');
         $password = $request->session()->get('user_password');

         if(!$email && !$password)
         {
             return redirect('/login');
         }

        return $next($request);
    }
}
