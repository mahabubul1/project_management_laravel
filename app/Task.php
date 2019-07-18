<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    public function client()
    {
    	return $this->belongsToMany('App\User','task_user','task_id','client_id');
    }

    public function manager()
    {
    	return $this->belongsToMany('App\User','task_user','task_id','manager_id');
    }

    public function writer()
    {
    	return $this->belongsToMany('App\User','task_user','task_id','writer_id');
    }

    public function type()
    {
    	return $this->belongsTo('App\TaskType');
    }

    public function status()
    {
    	return $this->belongsTo('App\Status');
    }
}
