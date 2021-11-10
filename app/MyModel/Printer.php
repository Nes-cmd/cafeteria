<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    protected $fillable = ['id', 'user_id', 'name', 'operator', 'purpose', 'status'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
