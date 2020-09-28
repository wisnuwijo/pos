<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (url()->current() == url('/')) {
            $checkDashboardAccess = DB::table('access')
                                    ->where([
                                        ['role_id', Auth::user()->role_id],
                                        ['module_id', 1]
                                    ])
                                    ->first();

            if (isset($checkDashboardAccess)) {
                return $next($request);
            } else {
                return abort('403');
            }
        } else {
            $currentUrl = substr(url()->current(), strlen(url('/').'/'));
            $explode = explode('/', $currentUrl);

            if (count($explode) > 1) {
                $currentUrl = $explode[0];
            }

            $getModule = DB::table('module')
                        ->where('url', $currentUrl)
                        ->first();

            $detectAccess = DB::table('access')
                            ->where([
                                ['role_id', Auth::user()->role_id],
                                ['module_id', isset($getModule) ? $getModule->id : '']
                            ])
                            ->first();

            if (isset($detectAccess)) {
                return $next($request);
            }

            return abort('403');
        }
    }
}
