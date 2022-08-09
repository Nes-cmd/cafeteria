<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{   
	protected $guarded = [];
    public function users(){
		return $this->belongsMany('App\User');
    }
}
