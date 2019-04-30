<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        // [2019-10-10 10:00:00]127.0.0.1 --- /index
        // 记录该请求的路径
        $path = $request -> path();
        $ip = $request -> ip();
        $str = '['.date('Y-m-d H:i:s').']'.$ip.' --- '.$path;
        // 将字符串路径存入到日志文件中
        file_put_contents('request.log',$request."\r\n",FILE_APPEND);
        return $next($request);
    }
}
