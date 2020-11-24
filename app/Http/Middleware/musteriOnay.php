<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class musteriOnay
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
        if(Auth::user()->durum==0 )
        {

                $notification=array(
                    'messege'=>'Dikkat ! Sadece Onaylı Firmalar Giriş Yapabilir',
                    'alert-type'=>'error'
                );


            return back()->with($notification);
        }
        else
        {

            return $next($request);
        }
    }
}
