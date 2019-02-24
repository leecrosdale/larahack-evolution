<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAlive
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

        if ($request->user()->health === 0) {
            return redirect(route('user.dead'));
        }

        return $next($request);
    }
}
