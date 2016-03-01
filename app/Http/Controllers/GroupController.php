<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Group;
class GroupController extends Controller
{
    /**
     * [return groups]
     * @return [type] [description]
     */
    public function index(){
        return response()->json(Group::all());
    }

    public function store(Request $request){
        $data = $request->all();

        if (!empty($data)) {
            $save = Group::create($data);
            if ($save) {
                return response()->json(['response'=>$data],200);
            }
        }
        return response()->json(['response'=>false],403);
    }
}
