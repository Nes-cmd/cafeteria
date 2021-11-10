<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    protected $fillable = ['id', 'cafe_id','user_ip','product_user_id','item', 'quantity','total','customer_places_id'];
    protected $guarded = [];
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
}
