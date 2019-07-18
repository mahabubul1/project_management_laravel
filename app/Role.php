<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('App\User','role_users','role_id','user_id');
    }

    public function permissions()
    {
    	return $this->belongsToMany('App\Permission','permission_role','role_id','permission_id');
    }
}
