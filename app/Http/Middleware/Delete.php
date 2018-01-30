<?php

namespace Drstock\Http\Middleware;

use Closure;

class Delete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$admin)
    {
        $user =$request->user();
        return($user->acces==$admin?$next($request):redirect('/dashboard'));
    }
}
