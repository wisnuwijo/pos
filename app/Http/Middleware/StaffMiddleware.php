<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class StaffMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role_id == 2 && is_null(Auth::user()->shift_record_id)) {
            // if current user role is staff and doesn't entry opening balance yet
            return redirect('/opening_balance');
        }

        return $next($request);
    }
}
