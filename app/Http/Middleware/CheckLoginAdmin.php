<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    const ADMIN_PERMISSION = 0;

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
            if ($user->permission == self::ADMIN_PERMISSION) {
                return $next($request);
            } else {
                return redirect('/admin/login');
            }
        } else {
            return redirect('/admin/login');
        }

    }
}
