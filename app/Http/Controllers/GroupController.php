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
}
