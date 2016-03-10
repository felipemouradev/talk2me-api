<?php

namespace App\Http\Middleware;

use Closure;

class Authorization
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
        $authorization = (!empty($_SERVER['HTTP_AUTHORIZATION'])) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
        if($authorization !=  null){
            $data = hashDecrypt($authorization);
            
            if( $data && count($data)==4 ){
                if (time() > $data['time']){
                    return response()->json(['reponse'=>'Token Expirado'],403);
                }
                return $next($request);
            }
        }
        return response()->json(['reponse'=>'Precisa estar logado para continuar'],403);
    }
}
