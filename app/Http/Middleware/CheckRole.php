<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class CheckRole
{
   /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        foreach ($roles as $role) {
            $role_id = Role::where('name', $role)->first()->id;
            if ($request->user()->role_id == $role_id) {
                return $next($request);
            }
        }
        abort(403);
    }
}