<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $user_type = $user->user_type;

        $prefix = 'admin';
        $name_prefix = 'admin.';

        if ($user_type === 'user') {
            $prefix = 'user';
            $name_prefix = 'user.';
        }

        $request->attributes->set('prefix', $prefix);
        $request->attributes->set('name_prefix', $name_prefix);

        return $next($request);
    }
}
