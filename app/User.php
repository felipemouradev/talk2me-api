<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $guarded = ['id'];
    protected $hidden = array('password');
}
