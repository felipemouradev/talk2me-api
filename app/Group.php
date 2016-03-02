<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
class Group extends Model
{
    //
    protected $guarded = ['id'];

    public static function getGroupBySlug($slug) {

        $data = Group::select(['id','group_name'])->where('group_slug',$slug)->first()->toArray();

        $return = (!empty($data)) ? $data : null;

        return $data;
    }
}
