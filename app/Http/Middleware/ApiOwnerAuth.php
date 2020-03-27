<?php

namespace App\Http\Middleware;

use App\Model\Owner;
use Closure;

class ApiOwnerAuth
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
        $api_token  = isset($request->api_token) ? htmlspecialchars($request->api_token) : null;
        $check_token = Owner::select('id')->where('owner_key', $api_token)->first();
        if($api_token != null && $check_token != null){
            $user = Owner::where('id', $check_token['id'])->where('owner_key', $api_token)->first();
            if($user != null){
                return $next($request);
            }else{
                return response([
                    'status' => 'error',
                    'data' => 'User not loggedin'
                ], 404);
            }
        }else{
            return response([
                'status' => 'error',
                'data' => 'Unauthorised'
            ], 401);
        }
    }
}
