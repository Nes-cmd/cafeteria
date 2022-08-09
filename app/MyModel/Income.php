<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['id', 'product_user_id','quantity', 'customer_place_id','total','cafe_id'];

    public function productUser()
    {
    	return $this->belongsTo('App\MyModel\ProductUser');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
