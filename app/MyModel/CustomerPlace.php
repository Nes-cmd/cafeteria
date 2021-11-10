<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class CustomerPlace extends Model
{
    protected $fillable = ['cafe_id','exact_location','telephone', 'code'];
    protected $guarded = [];
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
