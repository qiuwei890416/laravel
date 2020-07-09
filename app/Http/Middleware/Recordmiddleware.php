<?php

namespace App\Http\Middleware;

use Closure;

class Recordmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //日志存储
    public function handle($request, Closure $next)
    {
//        $url = $request->ip() .'-'.$request->get('name');
//        dump($request->ip());
//        file_put_contents('./request.txt',$url."\r\n",FILE_APPEND);
        return $next($request);
    }
}
