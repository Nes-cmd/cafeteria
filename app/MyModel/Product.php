<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['id','item_name', 'photo'];

    public function user()
    {
        return $this->belongsMany('App\User');
    }
    public function specials(){
        return $this->hasOne('App\MyModel\special_product');
    }
    public function types(){
        return $this->belongsToMany('App\MyModel\Product_type');
    }
}
