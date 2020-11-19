<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class CnewsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $user = Auth::user();
        $username=$user->username;
        if($role != ''){
            $arRole=explode('|',$role);
        }
        if(!in_array($username, $arRole)){
            return redirect()->route('admin.users.index')->with('msg','Bạn chưa có quyền truy cập.');
        }
        return $next($request);
    }
}
