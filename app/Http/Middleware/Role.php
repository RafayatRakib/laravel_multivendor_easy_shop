<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\ElseIf_;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if($request->user()->role !== $role){
            if($request->user()->role ==='admin'){
                return redirect()->route('admin.dashboard');
            }elseif($request->user()->role === 'vendor'){
                return redirect()->route('vendor.dashboard');
            }elseif($request->user()->role ==='user'){
                return redirect()->route('user.dashboard');
            }
            // return redirect('dashboard');
        }
        return $next($request);
    }
}
