<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    const ADMIN_PERMISSION = 0;
    const CENTER_PERMISSION = 2;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            $user = Auth::user();
            if ($user->permission == self::ADMIN_PERMISSION || $user->permission == self::CENTER_PERMISSION ) {
                return $next($request);
            } else {
                return redirect(route('admin.login'));
            }
        } else {
            return redirect(route('admin.login'));
        }

    }
}
