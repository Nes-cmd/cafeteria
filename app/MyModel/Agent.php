<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'email', 'telephone', 'bank_account', 'bank_name', 'address', 'qualification'];
    
    public function users(){
		return $this->belongsToMany('App\User','users');
    }
}
