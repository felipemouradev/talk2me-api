<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Group;
class Message extends Model
{
    //
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function getMessegesByGroup($slug){
        $group_slug = Group::getGroupBySlug($slug);

        if ($group_slug != null) {
            $data = self::where('group_id',$group_slug['id'])->orderBy('id','DESC')->with('user')->paginate(20);
            return $data;
        }

        return null;
    }
}
