<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifySession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        if($req->session()->has('username')){
            return $next($req);
        }else{
            $req->session()->flash('message','Invalid username');
            return redirect('/login');
        }
    }
}
