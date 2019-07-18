<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'username', 'email', 'password', 'image', 'phone', 'company_name', 'verify_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role','role_users','user_id','role_id');
    }

    public function orders(){
        return $this->belongsToMany('App\Task','task_user','client_id','task_id');
    }

    public function tasks(){
        $role = $this->roles->first()->slug;
        return $this->belongsToMany('App\Task','task_user',$role.'_id','task_id');
    }

    public function hasRole($permission)
    {
        foreach($this->roles as $role) {
            if ($role->slug == $permission) {
                return true;
            }
        }

        return false;
    }

    public function hasPermission($privilege)
    {
        foreach( $this->roles as $role ) {
            foreach ( $role->permissions as $permission ) {
                if ($permission->slug == $privilege) {
                    return true;
                }
            }  
        }

        return false;
    }
}
