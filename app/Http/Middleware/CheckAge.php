<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        $params = $request->all();
        if(isset($params['user_id']) || $params['user_id'] == 0){
            echo '未登录';exit;
        }
        //dd($params);
        return $next($request);
    }
}
