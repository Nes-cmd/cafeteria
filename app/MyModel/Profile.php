<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
    	'user_id','url'
    ];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
