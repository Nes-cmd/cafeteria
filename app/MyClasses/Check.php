<?php

namespace App\MyClasses;

use App\MyModel\SpecialProduct;
use Carbon\Carbon;
/**
 * 
 */
class Check
{
	private $current_user;
	private $profile;
	function __construct($id)
	{
		$this->current_user = $id;
    }
    public function isSpecial($pid){
        return SpecialProduct::where('product_user_id',$pid)->exists();
    }
}
?>