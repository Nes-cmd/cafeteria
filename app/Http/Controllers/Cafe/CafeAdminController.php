<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use App\MyModel\Product;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\MyClasses\Cheker;
use App\MyModel\ProductUser;
use App\MyModel\Type;
use App\MyModel\Order; 
use App\MyModel\Income;
use App\MyClasses\Updater;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ValidateRequests;
use Illuminate\Support\Facades\DB;
use Image;
use App\MyClasses\ImageFilter;
use Illuminate\Support\Facades\Hash;
use App\MyClasses\Printer;

class CafeAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }
    public function index()
    {
        return view('adminPage.finishedOrders')->with('incomes', Cheker::getUserSold());
    }
    public function create() 
    {   
        $product = Product::all();
        $type = Type::all();
        return view('adminPage.addNewProduct')->with(['products' => $product,'types' => $type]);
    }
    public function store(ValidateRequests $request)
    {
        $data = $request->validated();
        $img = Image::make($request->file);
        $img = $img->filter(new ImageFilter());
        $path = 'public/uploads/'.$request->file->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
        \Storage::put( 'mystorage/'.$path, $img);
        // $img->save( 'mystorage/'.$path);
        $inputs = new Product;
        $inputs->photo = $path;
        $inputs->item_name = $data['item'];

       if ($inputs->save()) {
            $request->pid = $inputs->id;
            $this->makeProduct($request); 
            Alert::success('success','አዲሱ ምርትዎ ተመዝግቦዋል');
            return redirect()->back();
        }
        Alert::error('ይቅርታ ምርት ማስመዝገቡ አልተሳካም', 'እባክዎ ትንሽ ቆይተው ይሞክሩ');
        return back();
    }
    public function show($id)
    {
        /* Toggle product availablity */
        $product = ProductUser::where('id',$id)->first();
        if ($product->availablity == 1) {
               $product->availablity = 0;
           }
        else{
            $product->availablity = 1;
        }
        $product->save();
    }

    public function edit($pid)
    {
       return view('adminPage.changePhoto')->with('product', Cheker::getProduct($pid));
    }

    public function update(Request $request, $id)
    {   
        
        $update = new Updater();
        $validatedData = $request->validate([
            'file' => ['required', 'file', 'mimes:jpeg,bmp,png,jpg', 'max:3072'],
         ]);
        if ($update->updatePhoto($request)) {
            Alert::toast('ፎቶ ማደሱ ተጠናቆዋል','success');
            return redirect()->route('home');
        }else{
            Alert::error('ይቅርታ ሜኑ ማደሱ አልተሳካም', 'እባክዎ እንደገና ይሞክሩ');
            return redirect()->back();
        }
    }
    public function destroy($pid)
    {
        // $x = DB::table('product_user')->where('id',$pid)->delete();
        // if ($x == 1) {
        //     return response()->json([
        //         'success'=>$x,
        //         'message'=>'የመረጡት ምርት ተወግዶዋል'
        //     ]);
        // } 
        // return response()->json([
        //     'success'=>$x,
        //     'message'=>'ይቅርታ የሆነ ችግር ተፈጥሮዋል! ትንሽ ቆይተው ይሞክሩ!'
        // ]);
        dd('product destroy');
    }
    public function makeProduct(Request $request)
    {
        $vat = $request->price*15/100;
        $data = array([
            'user_id' => auth()->user()->id,
            'product_id' => $request->pid,
            'price' => $request->price,
            'descreption' => $request->desc,
            'type' => $request->type,
            'vat' => $vat,
        ]);
        $flag = DB::table('product_user')->insert($data);
        return response()->json([ 
            'success'=> $flag
        ]);
    }
    public function fastOrderShow()
    {
        //dd(Cheker::getUserProducts());
        return view('adminPage.fastOrder')->with('products', Cheker::getUserProducts());
    }
    public function finishFastOrder(Request $request)
    {
        if($request->has('receit')){
            $user = auth()->user();
            $printer = new Printer();
            $item = array($request->all());
            $res = $printer->printReceit($user, $item);
            if($res == 1){
                $placeId = $user->customerPlace()->where('exact_location', 'default')->first()->id;
                $income = new Income;
                $income->product_user_id = $request->pid;
                $income->cafe_id = auth()->user()->id;
                $income->quantity = $request->quant;
                $income->customer_places_id = $placeId;
                $income->total = $request->price*$request->quant;
                $res = $income->save();
                return response()->json([
                    'success' => $res,
                ]);
            }
            return response()->json([
                'success' => $res,
            ]);
            
        }
        $placeId = $user->customerPlace()->where('exact_location', 'default')->first()->id;
        $income = new Income;
        $income->product_user_id = $request->pid;
        $income->cafe_id = auth()->user()->id;
        $income->quantity = $request->quant;
        $income->customer_places_id = $placeId;
        $income->total = $request->price*$request->quant;
        $res = $income->save();

        return response()->json([
            'success' => $res,
        ]);
    }
    public function sellGroup(Request $request)
    {   
        $ids = json_decode($request->ids);
        if($request->has('receit')){
           
            $items = array();
            for ($i=0; $i < sizeof($ids); $i++) { 
                $id = $ids[$i];
                $income = new Income;
                $orders = Order::where('id', $id)->first();
                $income->product_user_id = $orders->product_user_id;
                $income->cafe_id = $orders->cafe_id;
                $income->quantity = $orders->quantity;
                $income->customer_places_id = $orders->customer_places_id;
                $income->total = $orders->total;

                $item = [];
                $item = ['name' =>  $orders->item,
                    'quant' =>  $orders->quantity,
                    'price' =>  $orders->total / $orders->quantity ,
                    ];
                array_push($items, $item);

                $orders = Order::where('id',$id)->delete();
                $income->save();
            }
            $user = auth()->user();
            $printer = new Printer;
            $res = $printer->printReceit($user, $items);

            if ($orders) {
                return response()->json([
                    'success'=> 1,
                    'message' => sizeof($ids).' ትዕዛዝ(ዎች) ውጥቶዋል',
                    'printer' => $res
                ]);
             }return response()->json([
                    'success'=> false,
                    'message' => 'ይቅርታ ችግር ተፈጥሮዋል! ትንሽ ቆይተው ደግመው ይሞክሩ!',
                    'printer' => $res
                ]);
            }
       
        for ($i=0; $i < sizeof($ids); $i++) { 
            $id = $ids[$i];
            $income = new Income;
            $orders = Order::where('id', $id)->first();
            $income->product_user_id = $orders->product_user_id;
            $income->cafe_id = $orders->cafe_id;
            $income->quantity = $orders->quantity;
            $income->customer_places_id = $orders->customer_places_id;
            $income->total = $orders->total;

            $orders = Order::where('id',$id)->delete();
            $income->save();
        }

        if ($orders) {
            return response()->json([
                'success'=> 1,
                'message' => sizeof($ids).' ትዕዛዝ(ዎች) ውጥቶዋል',
                'printer' => 1
            ]);
        }return response()->json([
                'success'=> false,
                'message' => 'ይቅርታ ችግር ተፈጥሮዋል! ትንሽ ቆይተው ደግመው ይሞክሩ!'
            ]);
    }
    public function finished(Request $request)
    {
        dd($request->availables);
        $id = auth()->user()->id;
        dd(DB::table('product_user')->where('user_id', $id)->update(['avaialablity', $request->availables]));
        
    }
    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'old_password' => ['required'],
            'password' => ['required' , 'string', 'min:6', 'confirmed'],
            
         ]);
        if(Hash::check($request->old_password, auth()->user()->password))
        {
            $user = auth()->user();
            $user->password = Hash::make($request->password);
            $user->save();
            Alert::success('Password changed','የይለፍ ቃልዎን በተሳካ ሁኔታ ቀይረዋል!');
            return redirect()->route('home');
        }
        else{
            Alert::error('Incorrect password','ያስገቡት የይለፍቃል ትክክል አይደለም።');
            return redirect()->back();
        }
    }
}
