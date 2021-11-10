<?php

namespace App\Http\Controllers\Cafe;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\MyModel\Product;
use App\MyClasses\Cheker;
use App\MyModel\Income;
use App\MyModel\Order;
use Auth;
use App\MyClasses\Updater;
use App\MyModel\CustomerPlace;
use App\MyModel\ProductUser;

class CafeAdminController2 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('active');
    }
    public function index()
    {   
        return view('adminPage.menuViewer')->with('products',Cheker::getUserProducts());
    }
    public function create()
    {
        return view('adminPage.addCustomer')->with('customers',Cheker::getUserCustomer());
    }
    public function store(Request $request)
    {
        $code = $request->code;
        if($code == null){
            $request->validate([
            'exact_location' => ['required', 'string'],
            'telephone' => ['required', 'numeric'],   
        ]);
           $code = substr($request->telephone, strlen($request->telephone)-4);
        }
        else{
            $request->validate([
            'exact_location' => ['required', 'string'],
            'code' => ['required', 'max:4'],   
        ]);
            $code = $request->code;
        }
        CustomerPlace::create([
            'cafe_id' => Auth::user()->id,
            'exact_location' => $request->exact_location,
            'telephone' => $request->telephone,
            'code' => $code
        ]);
        Alert::toast('ደንበኛው ተመዝግቦዋል።','success');
        return redirect()->back();
    }
    public function show($user_id) 
    {
        return view('adminPage.orders')->with('orders', Cheker::getCafeOrders($user_id));
    }
    public function edit($pid)
    {   
        $product = ProductUser::where('id',$pid)->get();
        //dd(auth()->user()->product()->where('pivot_id',$pid)->get());
        return view('adminPage.menuEditor')->with('product',$product);
    }
    public function update(Request $request, $id)
    {
        $updater = new Updater();
        if($updater->updateMenu( $request)) {
            Alert::success('success','ሜኑ ማደሱ ተሳክቶዋል');
            return redirect()->route('cafe2.adminPage.index');
        }else{
            Alert::error('Error','ይቅርታ ሜኑ ማደሱ አልተሳካም እባክዎ እንደገና ይሞክሩ');
            return redirect()->back();
        }
    }
    public function destroy($pid)
    {
        dd($pid);
    }
}
 