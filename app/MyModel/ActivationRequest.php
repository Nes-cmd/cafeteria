<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class ActivationRequest extends Model
{
    protected $fillable = ['bank', 'name', 'email', 'target', 'txn','phone','user_id'];

    public function users()
    {
    	return $this->belongsTo('App\User');
    }
}
