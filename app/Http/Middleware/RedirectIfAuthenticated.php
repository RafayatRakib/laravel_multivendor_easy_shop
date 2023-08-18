<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if(Auth::check() && Auth::user()->role == 'user'){
                    return redirect()->route('user.dashboard');
                }
                if(Auth::check() && Auth::user()->role == 'vendor'){
                    return redirect()->route('vendor.dashboard');
                }
                if(Auth::check() && Auth::user()->role == 'admin'){
                    return redirect()->route('admin.dashboard');
                }
            }

            // if(Auth::user()){
                // if($request->user()->role ==='admin'){
                //     return redirect()->route('admin.dashboard');
                // }elseif($request->user()->role === 'vendor'){
                //     return redirect()->route('vendor.dashboard');
                // }elseif($request->user()->role ==='user'){
                //     return redirect()->route('user.dashboard');
                // }
                
                // if($request->user()->role === 'vendor'){
                //     return redirect()->route('vendor.dashboard');
                // }elseif($request->user()->role ==='user'){
                //     return redirect()->route('user.dashboard');
                // }    
            // }

        }

        return $next($request);
    }
}