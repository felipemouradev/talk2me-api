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

            $find = User::where('login',$data['login'])->where('password',$data['password'])->first();

            if (empty($find)) return response()->json(['user'=>false],401);

            $hash['token'] = hashEncrypt($find->toArray());
            //dd($find);
            $return = array_merge($find->toArray(),$hash);
            return response()->json(['user'=>$return],200);
        }

        return response()->json(['user'=>false],401);
    }
}
