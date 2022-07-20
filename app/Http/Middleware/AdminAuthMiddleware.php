<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        if ($request->is('admin/users') || $request->is('admin/users/*')){
//            echo 'Đây là module users';
//        }else{
//            echo 'Đây không phải module users';
//        }

//        if ($request->isMethod('POST')){
//            echo 'Đây là POST';
//        }
        //return redirect('/');
        return $next($request);
    }
}
