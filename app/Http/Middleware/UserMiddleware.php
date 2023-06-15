<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // User Banned and Unbanned
        if(Auth::check() && Auth::user()->isban){
            $banned = Auth::user()->isban=='1';
            Auth::logout();
            if($banned == 1){
                $message = "Your Account has been banned. Please contact with admin";
            }
            return redirect()->route('login')->with('status',$message)->withErrors([
                'banned' => "Your Account has been banned. Please contact with admin",
                ]);
        }

        //Check User Active and Inactive
        if(Auth::check()){
            $expireTime = Carbon::now()->addSecond(60);
            Cache::put('user-is-online'.Auth::user()->id,true,$expireTime);
            User::find(Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }

        //Check User
        if(Auth::check() && Auth::user()->role_id == 2){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }


}
