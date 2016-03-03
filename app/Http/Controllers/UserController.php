<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
        $data = User::all();

        if(empty($data)) return response()->json(['response'=>'Sem usuarios cadastrados'],404);
        return response()->json(['response'=>$data]);
    }

    public function store(Request $request){
        $data = $request->all();
        if (!empty($data)) {
            if(isset($data['password'])) {
                $data['password'] = md5($data['password']);
            }
            $save = User::create($data);

            if ($save) {
                return response()->json(['response'=>"Salvo com sucesso"],200);
            }
        }
        return response()->json(['response'=>false],403);
    }
}
