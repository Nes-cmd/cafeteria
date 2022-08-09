<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Alert;
use App\MyModel\OpenCloseTime;
class OpenCloseController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
        $this->middleware('active');
    }
    public function show()
    {
        $data = auth()->user()->OpenCloseTime()->get();
    	return view('adminPage.cafeAdmin.openCloseTime')->with('data', $data);
    }
    public function save(Request $request)
    {
    	$data = [ 
    		'open_at' => $request->open,
    		'close_at' => $request->close,
    	];
    	
        $x = DB::table('open_close_times')->updateOrInsert(['user_id' => auth()->user()->id] ,$data);
       
        if ($x) {
            Alert::toast('ሰዐት ማደሱ ተጠናቆዋል','success');
	        return redirect()->route('home');
		    }
		Alert::error('ይቅርታ! ሰዐት ማደሱ አልተሳካም', 'እባክዎ እንደገና ይሞክሩ');
        return redirect()->back();
    }
    public function checkCloseOpenTime()
    {
    	$datas = OpenCloseTime::all()->sortBy('user_id');
        return view('admin.users.OpenCloseChanger')->with(['times' => $datas ]);
    }
   
}
