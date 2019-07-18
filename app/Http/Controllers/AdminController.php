<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendUserDetailsMail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Service;
use App\Project;
use App\Setting;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function createUser( Request $request )
    {
        if($request->ajax()){
            $validator = \Validator::make($request->all(), [
                'full_name'     => 'required|string|max:255',
                'username'      => 'required|string|max:255|unique:users',
                'email'         => 'required|string|email|max:255|unique:users',
                'password'      => 'required|string|min:6',
                'role'          => 'required',
                'picture'       => 'image|mimes:jpeg,jpg,png,gif',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            $fileName = 'avatar.png';

            if($request->hasFile('picture')) {
                $picture = $request->file('picture');

                //you also need to keep file extension as well
                $fileName = time().'.'.$picture->getClientOriginalExtension();

                //using the array instead of object
                // $image['filePath'] = $fileName;
                $dir = 'uploads/users/'.$request->username;

                if(!Storage::disk('public')->has( $dir )){
                    Storage::disk('public')->makeDirectory( $dir );
                }

                $path = public_path( $dir.'/'.$fileName );
                // open an image file
                $img = Image::make( $picture );

                // now you are able to resize the instance
                $img->resize(320, 240);

                // and insert a watermark for example
                // $img->insert('public/watermark.png');

                // finally we save the image as a new file
                $img->save( $path );
            }

            $user_role          = Role::findOrFail($request->role);
            $user               = new User;
            $user->full_name    = $request->full_name;
            $user->username     = $request->username;
            $user->email        = $request->email;
            $user->password     = Hash::make($request->password);
            $user->image        = $fileName;
            $user->phone        = $request->phone;
            $user->company_name = $request->company_name;
            $user->active       = 1;
            $user->save();
            $user->roles()->attach($user_role,[
                'created_at'    => now(),
                'updated_at'    => now()
            ]);

            if($user){
                Mail::to($user->email)->send(new SendUserDetailsMail($user,['password'=>$request->password]));
                 return response()->json([
                    'success'       => true,
                    'user'          =>$user,
                    'role'          =>$user_role,
                    'image_path'   => '/uploads/users/',
                ]);
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function getUser( Request $request )
    {

        if($request->ajax()){

            $id = $request->id;

            $user = User::findOrFail($id);

            if($user){
                return response()->json([
                    'success'           => true,
                    'user'              => $user,
                    'current_roles'     => $user->roles,
                    'roles'             => Role::all(),
                ]);
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function getProfile( Request $request )
    {

        if($request->ajax()){

            $id = $request->id;

            $user = User::findOrFail($id);

            if($user){
                $view = view('admin.pages.getProfile',compact('user'))->render();
                return response()->json([
                    'success'   => true,
                    'view'      => $view
                ]);
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function viewProfile($id,Request $request)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.profileView',compact('user'));
    }

    public function editUser(Request $request)
    {
        if($request->ajax()){
            $validator = \Validator::make($request->all(), [
                'full_name'     => 'required|string|max:255',
                'email'         => 'required|string|email|max:255|unique:users,email,'.$request->id,
                'role'          => 'required',
                'picture'       => 'image|mimes:jpeg,jpg,png,gif',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            $user_role          = Role::findOrFail($request->role);
            $user               = User::findOrFail($request->id);
            $user->full_name    = $request->full_name;
            $user->email        = $request->email;
            

            if($request->hasFile('picture')) {
                $picture = $request->file('picture');

                //you also need to keep file extension as well
                $fileName = time().'.'.$picture->getClientOriginalExtension();

                //using the array instead of object
                // $image['filePath'] = $fileName;
                $dir = 'uploads/users/'.$request->username;

                if(!Storage::disk('public')->has( $dir )){
                    Storage::disk('public')->makeDirectory( $dir );
                }

                $path = public_path( $dir.'/'.$fileName );
                // open an image file
                $img = Image::make( $picture );

                // now you are able to resize the instance
                $img->resize(320, 240);

                // and insert a watermark for example
                // $img->insert('public/watermark.png');

                // finally we save the image as a new file
                $img->save( $path );
                $user->image        = $fileName;
            }
            $user->phone        = $request->phone;
            $user->company_name = $request->company_name;
            $user->update();
            $user->roles()->updateExistingPivot($user_role,[
                'updated_at'    => now()
            ]);

            if($user){
                return response()->json([
                    'success'       => true,
                    'user'          =>$user,
                    'role'          =>$user_role,
                    'image_path'   => '/uploads/users/',
                ]);
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function deleteUser( Request $request )
    {
        if($request->ajax()){

            $id = $request->id;

            $user = User::findOrFail($id);
            $user->roles()->detach();
            $user->delete();

            if($user){
                 return response()->json(['success'=> true]);
            }
            
            return response()->json(['success'=> false]);
        }
    }
   
  


    //theme setting
     public function themeSetting(){
         $services= Service::select("*")->get();
         $projects= Project::All();
         return view ("admin.pages.pagesSettings",compact("services","projects"));
    }

    public function addSetting( Request $request ){
        if($request->ajax()){

            if($request->hasFile($request->key)) {
                $picture = $request->file($request->key);

                //you also need to keep file extension as well
                $fileName = time().'.'.$picture->getClientOriginalExtension();

                //using the array instead of object
                // $image['filePath'] = $fileName;
                $dir = 'uploads/images/home/';

                if(!Storage::disk('public')->has( $dir )){
                    Storage::disk('public')->makeDirectory( $dir );
                }

                $path = public_path( $dir.'/'.$fileName );
                // open an image file
                $img = Image::make( $picture );

                // now you are able to resize the instance
                $img->resize(320, 240);

                // and insert a watermark for example
                // $img->insert('public/watermark.png');

                // finally we save the image as a new file
                $img->save( $path );
                $value = $dir.$fileName;
            }
            else {
                $value = $request->value;
            }

            $key = $request->key;

            $setting = Setting::where('key', $key)->first();

            if( $setting ) {
                $setting->key   = $key;
                $setting->value = $value;
                $setting->update();

                return response()->json([
                    'success'   => true,
                    'message'   => 'Setiing updated successfully',
                    'setting'   => $setting
                ]);
            }

            $newSetting         = new Setting;
            $newSetting->key    = $key;
            $newSetting->value  = $value;
            $newSetting->save();

            if($newSetting){
                return response()->json([
                    'success'   => true, 
                    'message'   => 'Settings created successfully',
                    'setting'   => $newSetting
                ]);
            }
             return response()->json(['success'=> false]);
        }
    }

    




  public  function serviceSave (Request $request){

     $validator = \Validator::make($request->all(),[
             "service_name"=>"required",
             "service_icon"=>"required",
             "service_text"=>"nullable",
             "service_button"=>"required",
             "service_action"=>"nullable",
             "publication_status"=>"required"
        ]);

        if($validator->fails()){
         return response()->json(['errors'=> $validator->errors()->all()]);
       }else{
        $service = new  Service();
        $service->service_name= $request->service_name;
        $service->service_icon=$request->service_icon;
        $service->service_text=$request->service_text;
        $service->service_button=$request->service_button;
        $service->service_action=$request->service_action;
        $service->publication_status=$request->publication_status;
        $service->save();

        if($service){
                 return response()->json(['success'=> true]);
            }
         return response()->json(['success'=> false]);

       }

 }
 public function serviceDelete($id){
     Service::where("id",$id)->delete();
      return redirect()->back(); 

  }


public function serviceUnpublished($id){
   Service::where("id",$id)->update(["publication_status"=>0]);
   return redirect()->back(); 


}


public function servicePublished($id){
   Service::where("id",$id)->update(["publication_status"=>1]);
   return redirect()->back();

}



public function projectSave(Request $request){

     

  $validator = \Validator::make($request->all(),[
             "project_name"=>"required",
             "project_description"=>"nullable",
             "project_image"=>"required",
             "project_button"=>"required",
             "project_action"=>"nullable",
             "publication_status"=>"required"
        ]);
       if($validator->fails()){
         return response()->json(['errors'=> $validator->errors()->all()]);
       }else{
            
         if ($request->hasFile("project_image")) {   
            $projectImage = $request->project_image;
            $Imagename=$projectImage->getClientOriginalName();
            $uploadPath = "assets/images/project-work/";
            $projectImage->move($uploadPath, $Imagename);
            $imagUrl=$uploadPath.$Imagename ;
             $this->ImageUpload($request,$imagUrl);

             return redirect()->back();

          }
        
       }
}


private function ImageUpload($request,$imagUrl){
       $project = new  Project();
       $project->project_name  = $request->project_name;
       $project->project_description = $request->project_description;
       $project->project_image  = $imagUrl;
       $project->project_button= $request->project_button;
       $project->project_action = $request->project_action;
       $project->publication_status = $request->publication_status;
       $project->save();
        if($project){
                 return response()->json(['success'=> true]);
            }
         return response()->json(['success'=> false]);

       }
        




public function projectDelete($id){
      $projectImage= Project::where("id", $id)->first();
      $Imagelinks= $projectImage->project_image;
      @unlink($Imagelinks);    
       Project::where("id",$id)->delete();
      return redirect()->back(); 

  }


public function projectUnpublished($id){
   Project::where("id",$id)->update(["publication_status"=>0]);
   return redirect()->back(); 


}


public function projectPublished($id){
   Project::where("id",$id)->update(["publication_status"=>1]);
   return redirect()->back();

}


 



 
public function packageFaqSave(Request $request){
   $validator = \Validator::make($request->all(),[
             "faq_question"=>"required",
             "faq_answer"=>"required",
             "publication_status"=>"required"
            
            ]);

        if($validator->fails()){
         return response()->json(['errors'=> $validator->errors()->all()]);
       }else{
        $faq = new Faq();
        $faq->faq_question= $request->faq_question;
        $faq->faq_answer=$request->faq_answer;
        $faq->publication_status=$request->publication_status;
        $faq->save();
        if($faq){
                 return response()->json(['success'=> true]);
            }
         return response()->json(['success'=> false]);

       }

   }


}
