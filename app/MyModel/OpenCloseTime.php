<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class OpenCloseTime extends Model
{
    protected $fillable = ['id', 'user_id', 'open_at', 'close_at', 'status'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
