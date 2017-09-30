<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ColaboradorMiddleware
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
        $role = Auth::user()->role;

        if($role->id == 3 || $role->id == 1 || $role->id == 2){
                return $next($request);
        }else{
               return redirect()->route('error.index');
        }
        
    }
}
