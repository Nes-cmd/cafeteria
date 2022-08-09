<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['id', 'name', 'phone', 'email', 'subject', 'body'];
}
