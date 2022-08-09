<?php
namespace App\MyClasses;

use App\MyModel\Product;
use App\MyModel\SpecialProduct;
use Illuminate\Support\Facades\File;
use App\MyModel\Profile;
use App\User;
use DB;
use App\MyModel\ProductUser;
use Image;
use App\MyClasses\ImageFilter;

class Updater {
	public function updateMenu($request)
	{
    if ($request->special == 'on') {

        if(!(\App\MyClasses\Cheker::isSpecial($request->id))) {
            SpecialProduct::create([
            'product_user_id' => $request->id,
            'user_id' => $request->uid,
        ]);     
    }}
    else{
        if(\App\MyClasses\Cheker::isSpecial($request->id)) {
            SpecialProduct::where('product_user_id',$request->id)->delete();
        }
    }
    $data = [
        'type' => $request->type,
        'price' => $request->price,
        'descreption' => $request->descreption,
        'vat' => $request->price*15/100,
        'updated_at' => \Carbon\Carbon::now(),
    ];
   $products = DB::table('product_user')
                    ->where('id', $request->id)
                    ->update($data);
    return  $products;
	}

	public function updatePhoto($request){
	   $inputs = Product::find($request->id);
        
        $img = Image::make($request->file);
        $img->filter(new ImageFilter());
        $npath = 'public/uploads/'.$request->file->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
        $img->save('mystorage/'.$npath);
        
        $oldpath = '/mystorage/'.$inputs->photo;
        $path = str_replace('\\','/',public_path()).$oldpath;
        
        if (File::exists(($path))) {
            unlink($path);

            }
         $inputs->item_name = $request->item_name;
        $inputs->photo = $npath;
        return $inputs->save();		
	}
    public function updateProfile($request)
    {
        $validatedData = $request->all();
        $user = auth()->user();
        $user->Fname = $validatedData['Fname'];
        $user->Lname = $validatedData['Lname'];
        $user->email = $validatedData['email'];
        $user->work_place = $validatedData['work_place'];
        $user->org = $validatedData['org'];
        $user->telephone = $validatedData['telephone'];
        if ($request->hasFile('file')) {

            $img = Image::make($request->file);
            $img->filter(new ImageFilter());
            $newpath = 'public/profile/'.$request->file->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
            $img->save('mystorage/'.$newpath);
           
            $user_profile = Profile::where('user_id',$request->id)->first();
            if($user_profile == null) {
                Profile::create([
                    'user_id' => $request->id,
                    'url' => $newpath
                ]);
            }else{ 
                $oldpath = '/mystorage/'.$user_profile->url;
                $public_path = str_replace('\\','/',public_path()).$oldpath;
                if (File::exists(($public_path))) {
                    unlink($public_path);
                   // File::delete(($newpath));
                }
                $user_profile->url = $newpath;   
                $user_profile->save();
            } 
        }
        
        return $user->save();    
    }
}
?>