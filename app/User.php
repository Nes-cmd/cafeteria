<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Fname','Lname', 'work_place', 'telephone', 'org','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customerPlace(){
        return $this->hasMany('App\MyModel\CustomerPlace','cafe_id');
    }
    public function orders(){
        return $this->hasMany('App\MyModel\Order','cafe_id');
    }
    public function activatioRequest()
    {
        return $this->hasOne('App\MyModel\ActivationRequest');
    }
    public function product()
    {
        return $this->belongsToMany('App\MyModel\Product', 'product_user')->withPivot('id', 'descreption','type', 'vat','price', 'status');
    }
    
    public function incomes()
    {
        return $this->hasMany('App\MyModel\Income','cafe_id');
    }
    
    public function profile()
    {
        return $this->hasOne('App\MyModel\Profile');
    }
    public function isKnown($placeId){
        if ($this->customerPlace()->where('id',$placeId)->first()) {
            return true;
        }return false;
    }


    public function settings(){
        return $this->belongsToMany('App\MyModel\Setting','setting_user','user_id','setting_id');
    }
    public function roles(){
        return $this->belongsToMany('App\MyModel\Role');
    }
    public function hasAnyRoles($roles){
        if ($this->roles()->whereIn('name',$roles)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }
     public function hasSetting($setting){
        if ($this->settings()->where('name',$setting)->first()) {

            return true;
        }
        return false;
    }
    public function OpenCloseTime()
    {
        return $this->hasOne('App\MyModel\OpenCloseTime');
    }
    public function agents(){
        return $this->belongsToMany('App\MyModel\Agent');
    }
    public function printers(){
        return $this->hasMany('App\MyModel\Printer');
    }
    
}
