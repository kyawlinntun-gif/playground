<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // if($request->user()->hasRole($role1) || $request->user()->hasRole($role2))
        // {
        //     return $next($request);            
        // }

        foreach($roles as $role){
            if ($request->user()->hasRole($role)){
                return $next($request);
            }
        }

        // return response('Unauthorized.', 401);
        abort(401, 'Unauthorized');
    }
}
