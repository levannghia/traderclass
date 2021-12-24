<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MyCourse
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
        $token = $request->header('token');
        $api_token = DB::table('admins')->select('id','remember_token')->get();
        foreach ($api_token as $item) {
            if($token == $item->remember_token){
                return $next($request);
            }
        }
        if (!$request->header('token')) {
            return response()->json([
                'code' => 500,
                'status' => false,
                'mes' => 'token is required',
            ]);
        }
        return response()->json([
            'code' => 501,
            'status' => false,
            'mes' => 'bạn không được phép truy cập',
        ]);
        
    }
}
