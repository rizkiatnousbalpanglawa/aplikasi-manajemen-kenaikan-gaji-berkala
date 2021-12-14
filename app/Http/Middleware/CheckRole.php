<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{

    public function handle($request, Closure $next)
    {
        //jika akun yang login sesuai dengan role 
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home

        $roles = array_slice(func_get_args(), 2);

        $cekLogin = \Auth::user();

        if ($cekLogin) {
            foreach ($roles as $role) {
                $user = \Auth::user()->role;
                if ($user == $role) {
                    return $next($request);
                }else {
                    redirect('/login');
                }
            }
        }else {
            return redirect('/login');
        }

    }
}
