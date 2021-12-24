<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VideoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('course_id')){
            $user_course = DB::table('user_course')->where('user_id',Auth::user()->id)->where('course_id',session()->get('course_id'))->first();
            if(isset($user_course)){
                return $next($request);
                session()->forget('course_id');
            }
            abort(501);
            //return back();
        }
        else{
            echo "chua lay dk session";
        }
        
    }
}
