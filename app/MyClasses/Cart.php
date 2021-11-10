<?php
namespace App\MyClasses;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\MyModel\CustomerPlace;  
use App\MyModel\Order;
use Alert;
use App\MyClasses\Printer;
use App\User;

class Cart 
{
	public static function add($request)
	{
		if($request->session()->has('cart')){
			$old = session()->get('cart');
		  }
		  else{$old = array();}
  
		  $x = array("item" => $request->item,"quantity"=>$request->quant,"product_userId" => $request->pid,"price" =>$request->price,"photo" => $request->photo);
		  array_push($old, $x);
		  session(['cart' => $old]);
		  return sizeof(session()->get('cart'));
	}
	public static function order($request)
	{
		$printer = new Printer();
		$cafe_id = session()->get('cafe_id');       
        //if(User::find($cafe_id)->hasSetting(['Strict'])){
            if($placeId = CustomerPlace::where('exact_location',$request['place'])->first()){
                $place_Id = $placeId->id;
                if ($placeId->code == $request->code) {

                    if (User::find($cafe_id)->isKnown($place_Id) && session()->has('cart')) {
                        $x = session()->get('cart');
                        foreach ($x as $cart) { 
                            $order = new Order;
                            $order->user_ip = request()->ip();
                            $order->cafe_id = session()->get('cafe_id');
                            $order->product_user_id = $cart['product_userId'];
                            $order->total = $cart['price']*$cart['quantity'];
                            $order->item = $cart['item'];
                            $order->customer_places_id = $place_Id;
                            $order->quantity = $cart['quantity'];
                            $y = $order->save();
                        }
                        if ($y) {
                            $printer = new Printer();
                            $res = $printer->printBono( session()->get('cafe_id'), $x, $request['place']);
                            dd($res);
                            session()->forget('cart');
                            session()->forget('cafe_id');
							session()->save();
							
                            Alert::success('Success', 'በተሳካ ሁኔታ አዘዋል! እኛን ስለመረጡ እናመሰኛለን።');
                            return redirect()->route('welcomee');
                        }
                        session()->forget('cart');
                        session()->forget('cafe_id');
                        session()->save();
                         Alert::error('ስህተት ተፈጥሮዋል', 'እባክዎ እንደገና ካፌ መርጠው ይዘዙ!');
                         return redirect()->route('welcomee');
                    }
                Alert::error('Unknown place', 'እባክዎ ቦታው በትክክል ያስገቡ');
                return redirect()->back();
            }
            Alert::error('Code doesn\'t mach', 'ያስገቡት ቦታና ኮድ አልተጣጣመም');
            return redirect()->back();
        } 
        Alert::error('Unregistered place', 'እባክዎ ቦታውን በትክክል ያስገቡ!');
       return redirect()->back(); 
	}

	public static function remove($id)
	{
		$x = Session::get('cart'); 
        for ($i=0; $i <sizeof($x) ; $i++) { 
             if(($x[$i]['product_userId']) == $id){
                 array_splice($x, $i,1);
                 break;
                }
            }
        session(['cart' => $x]);
        Alert::toast('የመረጡት ምርት ተወግዶዋል፡','info');
        return back()->with('carts', $x);
	}
}

?>