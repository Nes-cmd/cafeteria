<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class ProductUser extends Model
{
	protected $table = 'product_user';
    protected $fillable = ['id', 'user_id', 'product_id', 'price', 'vat', 'descreption', 'status'];

    public function incomes()
    {
    	return $this->hasMany('App\MyModel\Income');
    }
    public function orders()
    {
    	return $this->hasMany('App\MyModel\Order');
    }
    public function specialProduct()
    {
        return $this->hasOne('App\MyModel\SpecialProduct');
    }

}
