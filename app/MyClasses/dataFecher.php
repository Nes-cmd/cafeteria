<?php

namespace App\MyClasses;

use App\MyModel\SpecialProduct;
use App\MyModel\Product;
use App\User;
use App\MyModel\Income;
use Illuminate\Support\Facades\DB;
use App\MyModel\Order;
use App\MyModel\Profile;
use App\MyModel\ProductUser;
use App\MyModel\OpenCloseTime;
use Carbon\Carbon;
/**
 * 
 */
class dataFecher
{
	private $current_user;
	private $profile;
	function __construct($id)
	{
		$this->current_user = $id;
    }
    public function getCurrentUser()
    {
    	if ($this->current_user > 0) {
    		return auth()->user();
    	}
    	return $this->current_user;
    }
    public function getUserProducts(){
        return ($this->getCurrentUser()->product()->orderBy('item_name')->get());
    }
    public function isSpecial($pid){
        return SpecialProduct::where('product_user_id',$pid)->exists();
    }
    public function getProduct($id){
        return Product::where('id',$id)->get();
    }
    public function getUserCustomer(){
        return ($this->getCurrentUser()->customerPlace()->get());
    }
    public function getUserProfile(){
        $x = $this->getCurrentUser()->profile();
        if ($x->exists()) {
            return $x->first()->url;
        }return false;
    } 
    public function getUserSold(){
        //dd($this->getCurrentUser()->incomes()->with('productUser')->get());
        $sold = DB::table('incomes')
                            ->join('product_user', 'incomes.product_user_id', 'product_user.id')
                            ->join('products', 'product_user.product_id', 'products.id')
                            ->join('customer_places', 'incomes.customer_places_id', '=', 'customer_places.id')
                            ->select('incomes.*','products.item_name','customer_places.exact_location')
                            ->where('incomes.cafe_id', $this->current_user)
                            ->get();
        return($sold);
    }
    public function menuData($id){
        
        session()->put(['cafe_id' => $id, 'org_name' => User::where('id',$id)->first()->org]);
        
        $data = array( 
            'drink' =>  array(),
            'msa' =>  array(),
            'kurs' =>  array(),
            'erat' =>  array(),
            'other' =>  array()
        );
        
        $prod = User::find($id)->product()->orderBy('item_name')->get();
        for ($i=0; $i < sizeOf($prod); $i++) { 
            if(($prod[$i]->pivot->type) == 'ትኩስ ነገር' || ($prod[$i]->pivot->type) == 'ለጅማሮ' || ($prod[$i]->pivot->type) == 'ማቆያ'){
                array_push($data['drink'], $prod[$i]);
            }
            elseif(($prod[$i]->pivot->type) == 'ምሳ'){
                array_push($data['msa'], $prod[$i]);
            }
            elseif(($prod[$i]->pivot->type) == 'ቁርስ'){
                array_push($data['kurs'], $prod[$i]);
            }   
            elseif(($prod[$i]->pivot->type) == 'እራት'){
                array_push($data['erat'], $prod[$i]);
            }
            else{
                array_push($data['other'], $prod[$i]);
            }
        }
    return($data);
    }
    public function cafeLists($flag)
    {

        $cafes = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('open_close_times', 'users.id', '=', 'open_close_times.user_id')
            ->select('users.*','role_user.role_id','profiles.url', 'open_close_times.close_at', 'open_close_times.open_at', 'open_close_times.status')
            ->where('role_id', 3)
            ->where('org','like','%'.$flag.'%')
            ->get();
        return $cafes;
    }
    public function getSpecials($id)
    {
        session()->put(['cafe_id' => $id, 'org_name' => User::where('id',$id)->first()->org]);
        $data2 = array( 
            'spOther' =>  array(),
            'spDish' =>  array(),
        );
        $specials = DB::table('product_user')
                            ->join('special_products', 'product_user.id', '=', 'special_products.product_user_id')
                            ->join('products', 'product_user.product_id', '=', 'products.id')
                            ->orderBy('item_name')
                            ->where('special_products.user_id', $id)
                            ->get();
        
        for ($i=0; $i < sizeOf($specials); $i++) { 
            if (($specials[$i]->type == 'መጠጥ') || ($specials[$i]->type == 'ሌላ')) {
                array_push($data2['spOther'], $specials[$i]);
            }else{
                array_push($data2['spDish'], $specials[$i]);
            }
        }
        return ($data2);
    }
    public function getCafeOrders($id)
    {
        $orders = DB::table('orders')
                            ->join('customer_places', 'orders.customer_places_id', '=', 'customer_places.id')
                            ->select('orders.*', 'customer_places.exact_location')
                            ->where('orders.cafe_id', $id)
                            ->get();
        session()->put(['order' => sizeOf($orders)]);
        return $orders;
    }
    
}
?>