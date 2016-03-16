<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
class AuthController extends Controller
{
    //
    public function requestToken(Request $request){
        $data = $request->all();
        if (!empty($data['login']) && !empty($data['password'])){

            $find = User::where('login',$data['login'])->where('password',md5($data['password']))->first();

            if (empty($find)) return response()->json(['user'=>false],401);

            $hash['token'] = hashEncrypt($find->toArray());

            $return = array_merge($find->toArray(),$hash);

            return response()->json(['user'=>$return],200);
        }

        return response()->json(['user'=>false],401);
    }

    public function getNewToken(){
        $hash = (!empty($_SERVER['HTTP_AUTHORIZATION'])) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
        if (!is_null($hash)) {

            $descryp = hashDecrypt($hash);
            if (count($descryp)!=4) return response()->json(['user'=>"Tentativa invalida! "],401);
            $descryp['time'] = time()+60*60;
            $hash = hashDecrypt($hash);

            $descryp['token'] = hashEncrypt($descryp);


            return response()->json(['user'=>$descryp],200);
        }
    }

}
