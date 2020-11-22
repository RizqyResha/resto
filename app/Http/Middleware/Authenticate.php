<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $uri = $request->path();

        if($request->is('admin/*')){
            if (Auth::guard('admin')->check()) {
                return redirect('admin/');
            } 
        }
        // elseif ($request->is('/*')) {
        //     if (Auth::guard('pemilih')->check()) {
        //         return redirect('/');
        // }
    }
}
