<?php

namespace Shortcodes\Roles\Middleware;

use Closure;

class AccessMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->is($role) || !in_array($request->user->email, config('access.admins'))) {
            return $this->response('You don\'t have permission to perform this action', 403);
        }

        return $next($request);
    }
}
