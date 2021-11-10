<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	//protected $fillable = ['descreption'];
    protected $guarded = [];
    public function users(){
		return $this->belongsMany('App\User');
    }
}
