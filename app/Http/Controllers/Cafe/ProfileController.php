<?php
namespace App\Http\Controllers\Cafe;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\MyModel\Profile;
use App\MyClasses\Updater;
use App\User;
use Alert;
use Auth;
use DB;
use Image;
use Response;

class ProfileController extends Controller
{ 
     public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function profileEditor()
    {
    	$user = DB::table('users')
            ->leftjoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->select('users.*','profiles.url')
            ->where('users.id',Auth::user()->id)
            ->get();
    	return view('admin.users.editPhoto')->with('user', $user);
    }
    public function updateProfile(Request $request)
    {
    	$validatedData = $request->validate([
            'Fname' => ['required', 'string','max:25'],
            'Lname' => ['required', 'string','max:25'],
            'email' => ['required', 'string','email'],
            'org' => ['required', 'string','max:100'],
            'work_place' => ['required','string','max:100'],
            'telephone' => ['required', 'numeric', 'min:10'],
            'file' => ['sometimes', 'file', 'mimes:jpeg,bmp,png,jpg,gif,svg', 'max:2048'],
        ]);
        
        $update = new Updater();
		if ($update->updateProfile($request)) {
			Alert::toast('ፕሮፋይል ማደሱ ተጠናቆዋል','success');
	        return redirect()->route('home');
		    }
		Alert::error('ይቅርታ ፕሮፋይል ማደሱ አልተሳካም', 'እባክዎ እንደገና ይሞክሩ');
        return redirect()->back();
	 }
     public function download()
     {
        $file ='C:/xampp/htdocs/cafeteria/storage/app/public/profile/pNtiBNiYLHEaFPK3Iu2wwok69L7Jz50dycscfjEM.jpeg';
        $header = array( 'Content-Type' => 'image/jpeg' );

        return Response::download($file, 'Download Test photo.jpeg', $header);
     }
 }
