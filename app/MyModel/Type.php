<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $fillable = ['id', 'name'];
	protected $guarded = [];
    public function products(){
	    return $this->belongsTomany('App\MyModel\Product');
    }
}
