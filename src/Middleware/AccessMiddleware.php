<?php

namespace Shortcodes\Roles\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AccessMiddleware
{
   public function handle($request, Closure $next, $role)
    {
        $roles = array_except(func_get_args(), [0,1]);

        $userHasAccess = false;

        foreach ($roles as $role) {
            if (Auth::user()->is($role)) {
                $userHasAccess = true;
            }
        }

        if (!$userHasAccess && !in_array(Auth::user()->email, config('access.admins'))) {
            return response()->json(['message' => 'You don\'t have permission to perform this action'], 403);
        }

        return $next($request);
    }
}
