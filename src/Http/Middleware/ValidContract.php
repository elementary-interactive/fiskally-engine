<?php

namespace ElementaryInteractive\FiskallyEngine\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use ElementaryInteractive\FiskallyEngine\Models\Contract;

class ValidContract
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
        /** Check wether the current contract is accepted or not.
         */
        if (is_null(Auth::user()->contract_accepted) || Contract::active()->id != Auth::user()->contract_accepted)
        {
            return redirect(route('app.contract'));
        }

        return $next($request);
    }
}