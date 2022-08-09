<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\MyModel\Download;
use File;
use Alert; 
use App\User;
use DB;
use App\Notifications\Order;
use Notification;
use App\MyClasses\MyHtmlToDoc;


class ClousureController extends Controller
{
    public function viewCache()
    {
    	$status = Artisan::call('view:cache');
        dd(Artisan::output());
    }
    public function routeCache()
    {
    	$status = Artisan::call('route:cache');
        dd(Artisan::output());
    }
    public function configCache()
    {
    	$status = Artisan::call('config:cache');
        dd(Artisan::output());
    }
    public function clear()
    {
    	$status = Artisan::call('optimize:clear');
        dd(Artisan::output());
    }
    public function downloads()
    {
        return view('download.downloadList')->with('downloads', Download::all());
    }
    public function uploads()
    {
        return view('download.uploadShow');
    }
    public function uploadFile(Request $request)
    {
        $download = new Download;
        $ext = $request->file->extension();
        $name = $request->name.'.'.$ext;
        $path = $request->file->store('public/todownload');
        $size = $request->file('file')->getSize();
        
        $download->name = $name;
        $download->size = $size;
        $download->detail = $request->detail;;
        $download->url = $path;
        $download->save();
        Alert::toast('success','Uploaded successfully');
        return redirect()->route('download.list');
        
    }
    public function test()
    {
        return view('Test.htmlToDoc')->with('data', User::all());
    }
    public function index()
    {
        return view('adminPage.cafeAdmin.seatCustomize');
    }
    public function generateTable(Request $request)
    {
        $requirement = $request->number_of_table;
        $lang = $request->language;
        $myHtmlToDoc = new MyHtmlToDoc($lang, $requirement);

        return $myHtmlToDoc->generateDesired();
    }
     public function toggle(Request $request)
    {
        $table = $request->table;
        $id = $request->id;

        $data = DB::table($table)->where('id',$id)->get();
        $data = $data->toArray();
        
         if ($data[0]->status == 1) {
            $val = DB::table($table)->where('id',$id)->update(['status' => 0]);
            return 'Closing...';
         }
        $val = DB::table($table)->where('id',$id)->update(['status' => 1]);
        return 'Opening...';
    }
    public function testPrinter(){
        $printer = new \App\MyClasses\Printer();
        $printer->printReceit();
    }
    function delete(Request $request){
        $table = $request->table;
        $id = $request->id;
        $res = DB::table($table)->where('id', $id)->delete();
        return response()->json(['result' => $res]);
    }
    public function testNotif()
    {
        $user = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
        Notification::send($user, new Order($offerData));
        $user->notify(new Order($offerData));
        dd($user->notifications);
        dd('Task completed!');
    }
    public function send()
    {
        
    }
    public function sensorData(){
        $data = DB::table('sensor_datas')->get();
        dd($data);
    }
    public function testEspGet(Request $request){
        DB::table('sensor_datas')->insert([
                'device_id' => $request->id,
                'flame' => $request->flame,
                'smoke' => $request->smoke,
                'obstacle' => $request->obstacle,
            ]);
        return 'ok';
    }
// Route::get('details', function () {
// 	$ip = '50.90.0.1';
//     $data = \Location::get($ip);
//     dd($data);
// });
// Route::get('send-mail', function () {
//     $details = [
//         'title' => 'Mail from ItSolutionStuff.com',
//         'body' => 'This is for testing email using smtp'
//     ];
//     \Mail::to('nesrusadik5@gmail.com')->send(new \App\Mail\MyTestEmail($details)); 
//     dd("Email is Sent.");
// });
}
