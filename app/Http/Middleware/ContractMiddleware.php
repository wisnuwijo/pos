<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class ContractMiddleware
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
        $current = date('Y-m-d');
        $to = date('Y-m-t');
        $getActiveContract = DB::table('contract')
            ->where([
                ["to", ">=", $current],
                ["is_verified", "1"],
            ])
            ->first();

        // redirect to renew page when the subscription is over
        if (!isset($getActiveContract) && url()->current() != url('/renew')) return redirect("/renew");

        // prevent the displaying renew page when the client alread paid the subscription
        if (isset($getActiveContract) && url()->current() == url('/renew')) return redirect("/");

        return $next($request);
    }
}
