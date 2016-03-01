<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Message;
class MessageController extends Controller
{
    //
    //
    public function index(){
        $data = Message::with('user')->paginate(8);
        return response()->json(['response'=>$data]);
    }
    public function store(Request $request){
        $data = $request->all();
        //dd($data);
        if (!empty($data)) {
            $save = Message::create($data);
            if ($save) {
                return response()->json(['response'=>$data],200);
            }
        }
        return response()->json(['response'=>false],403);
    }
}
