<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyClasses\Cheker;
use App\MyClasses\Cart;
use App\MyModel\Test;
use App\MyModel\CustomerPlace;  
use App\MyModel\Product;
// use App\MyModel\Order;
use App\MyModel\Contact;
use App\MyModel\ActivationRequest;
// use App\User;
// use Session; 
use Alert;
use Auth; 
use DB;
use App\MyModel\Agent;
 
class CustomerController extends Controller
{
     public function index(){
        return view('guest.welcomee')->with('cafes',Cheker::cafeLists('%'));
     }
     
     public function autoSearch(Request $request)
     {
        // dd('Here');
        if($request->get('query')){ 
            $query = $request->get('query');
            $data = DB::table('users')
                        ->orwhere('org','like','%'.$query.'%')
                        ->select('org')
                        ->get();
            $limit = 8;
            $max = sizeof($data) < $limit ?sizeof($data):$limit;
            $output = '<ul class="dropdown-menu col-md-3" style="display:block;position:relative;">';
            for($i = 0;$i < $max;$i++){
                $output .= '<li><a href="#">'.$data[$i]->org.'</a></li>';
            }
            $output .='</ul>';
            //dd($output);
            echo $output;
        }
     }

    public function fech(Request $request){   
        $id = session()->get('cafe_id');
        if($request->get('query')){ 
            $query = $request->get('query');
            $data = DB::table('customer_places')
                        ->where('cafe_id',$id)
                        // ->where(function (Builder $query) {return $query
                        //->orwhere('telephone','like','%'.$query.'%')
                        ->where('exact_location','like','%'.$query.'%')//;})
                        ->select('exact_location')
                        ->get();
            $output = '<ul class="dropdown-menu col-md-12" style="display:block;position:relative;">';
            $limit = 7;
            $max = sizeof($data) < $limit ?sizeof($data):$limit;
            for($i = 0;$i < $max;$i++){
                $output .= '<li><a href="#">'.$data[$i]->exact_location.'</a></li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
    
    public function addToCart(Request $request)
    {
        $res = Cart::add($request);
        return response()->json([
            'totalCart' => $res,
            'success' => $request->quant,
        ]);
    }
     public function cafes(){
        $id = session('cafe_id');
        $data = Cheker::menuData($id);
        return view('guest.menu')->with('products', $data);
     }
    
    public function cartAdder(Request $request){

        if ($request->session()->has('cart')){
            $x = session()->get('cart');
            return view('guest.cart')->with('carts',$x);
           }
	    
    	Alert::error('ምንም አልመረጡም!', 'እባክዎ ካፌ መርጠው የሚፈልጉትን ነገር ወደ ማዘዣው ያስገቡ!');
        return redirect()->back();
    }
    public function removeCart($id)
    {
        return Cart::remove($id);
    } 
    public function orderer(Request $request)
    {
        
         return  Cart::order($request);     
    }
    public function specials($id)
    {
        $data = Cheker::getSpecials($id);
        return view('guest.specialDishs')->with('products', $data); 
    }
    public function contactUs(Request $request)
    {
        $data = $request->all();
        Contact::create($data);
        Alert::success('መልዕክቱ ተልኮዋል','እናመሰግናለን።');
        return redirect()->route('welcomee');
    }

    public function activate(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'max:30'],
            
         ]);

        if ($request->agent_phone != null) { 
            $validatedData = $request->validate(['agent_phone' => ['sometimes', 'numeric']]);

            $agent = Agent::where('telephone', $request->agent_phone)->first();
            if ($agent) {

                auth()->user()->agents()->attach($agent->id);
            }
            else{
                Alert::error('error','We dont recognize the agent, please fill your data correctly');
                return redirect()->back();
            }
        }
        DB::table('activation_requests')->updateOrInsert(['user_id' => auth()->user()->id],[
            'bank' =>  $request->bank,
            'name' =>  $request->name,
            'phone' =>  $request->phone,
            'email' =>  $request->email,
            'target' =>  $request->target,
        ]);
        return redirect()->route('confirmation.show');
        
    }
    public function confirm(Request  $request)
    {

        $validatedData = $request->validate([
            'txn' => ['required', 'string', 'min:4'],
            'name' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
         ]);
        $data = ActivationRequest::where('phone' , $request->phone);
        if ($data->exists()) {
            $data = $data->first();
            $data->txn = $request->txn;
            $data->save();
            Alert::info("success","ትዕዛዝዎን ተቀብለናል። እባክዎ ትዕዛዝዎን እስክናስተናግድ ድረስ በትዕግስት ይጠብቁን!");
            return redirect()->route('home');
        }
        Alert::error('info', 'ያስገቡት ስልክ ትዕዛዝ ማኖሪያ ውስጥ አላገኘነውም እባክዎ ደግመው በትክክል ያስገቡ');
        return redirect()->back();
    }
    public function activationStart()
    {
        $data = DB::table('activation_requests')->where('user_id', auth()->user()->id)->first();
        if ($data) {
            return redirect()->route('confirmation.show');
        }
        
        return view('adminPage.cafeAdmin.activation')->with('data', $data);
    }
    public function searchCafe(Request $request)
    {
        $cafe = $request->cafe;
        return view('guest.welcomee')->with('cafes',Cheker::cafeLists($cafe));
    }
}
                      