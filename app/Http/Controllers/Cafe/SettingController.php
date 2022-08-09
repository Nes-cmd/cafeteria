<?php

namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyModel\Setting;
use App\MyClasses\Cheker;
use App\MyModel\Role;
use App\User;
use Alert;
use DB;
use App\MyModel\Printer;;
class SettingController extends Controller
{
    public function index()
    {
    	$setting = Setting::all();
        $data = auth()->user()->OpenCloseTime()->get();
        $printers = auth()->user()->printers()->get();
        return view('adminPage.cafeAdmin.setting')
                ->with([
                    'settings' => $setting,
                    'data' => $data,
                    'printers' => $printers,
                    ]);
    }
    public function change(Request $request)
    {
    	$user = auth()->user();
        
        $user->settings()->sync($request->settings);
        if ($user->hasSetting('Free-trial mode')) {
            if (!$user->hasRole('cafe_admin')) {
                $role = Role::select('id')->where('name', 'cafe_admin')->first();
                $user->roles()->attach($role);
            }
        }
        Alert::toast('እድሳቱ ተጠናቆዋል።', 'success');
        return redirect()->route('home');
    }
    function addPrinter(Request $request){
        
        DB::table('printers')->updateOrInsert(
            ['user_id' => auth()->user()->id, 'name' => $request->printer_name],
            ['operator' => $request->operator, 'purpose' => $request->purpose, 'connector_port' => $request->connector_port?$request->connector_port:9100]
        );
        Alert::toast('printer registered successfully' ,'success');
        return redirect()->route('home');
    }
    function showPrinterForm(){
        return view('adminPage.cafeAdmin.addPrinter');
    }
    function deletePrinter($id){
        //$res = DB::table('printers')->where('id', $id)->delete();
        $res = Printer::where('id', $id)->delete();
        return response()->json(['success' => $res]);
    }

    // public function fileUploadPost2(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required',
    //     ]);
 
    //    $title = time().'.'.request()->file->getClientOriginalExtension();
  
    //    $request->file->move(public_path('docs'), $title);
    //     return response()->json(['success'=>'File Uploaded Successfully']);
    // }
}
