<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class InvestorMiddleware
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
      $user = Auth::user();
      if($user->approved == 1){
          return $next($request);
      } else {
        return redirect('/login');
      }

    }
}
