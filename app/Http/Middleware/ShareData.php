<?php

namespace App\Http\Middleware;
use Carbon\Carbon;
use Closure;

class ShareData
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
        $today = Carbon::today();
        view()->share('today', $today);
        return $next($request);
    }
}
