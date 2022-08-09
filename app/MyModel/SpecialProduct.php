<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class SpecialProduct extends Model
{
    protected $guarded = [];

    public function products(){
        return $this->belongsTo('App\MyModel\ProductUser');
    }
}
