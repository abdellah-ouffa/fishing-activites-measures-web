<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Constant;
use Auth;

class AdminMiddlware
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
        if(!Auth::check()) {
            return redirect('/login');
        }

        if(!auth()->user()->is_active) {
            Auth::logout();
            return redirect('/login');
        }

        if(auth()->user()->role == Constant::USER_ROLES['admin']) {
            return $next($request);
        } else {
            abort(403);
        }
    }
}
