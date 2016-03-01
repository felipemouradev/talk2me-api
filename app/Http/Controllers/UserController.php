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

        return response()->json(['response'=>$data]);
    }

    public function create(Request $request){
        $data = $request->all();
        if (!empty($data)) {
            $save = User::create($data);
            if(isset($data['password'])) {
                $data['password'] = md5($data['password']);
            }
            if ($save) {
                return response()->json(['response'=>$data],200);
            }
        }
        return response()->json(['response'=>false],403);
    }
}
