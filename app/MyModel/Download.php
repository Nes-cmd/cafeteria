<?php

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Download extends Model
{
    protected $fillable = ['id', 'name', 'detail', 'size', 'url'];
}
