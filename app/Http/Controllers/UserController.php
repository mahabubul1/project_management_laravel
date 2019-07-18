<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		/*
		$this->middleware('subscribed', ['except' => [
            'fooAction',
            'barAction',
        ]]);
		$this->middleware('admin', ['only' => ['index']]);
		*/
	}
	public function index()
	{
		$users = User::orderBy('updated_at', 'desc')->get();
		$roles = Role::all();
		return view('admin.pages.users',compact('users','roles'));
	}
    // User Settings
    public function profile()
    {
    	$userId = \Auth::user()->id;
    	$user = User::findOrFail($userId);
    	return view('admin.pages.profile',compact('user'));
    }
    public function accountSettings()
    {
    	$userId = \Auth::user()->id;
    	$user = User::findOrFail($userId);
    	return view('admin.pages.accountSettings',compact('user'));
    }

    public function updateUser(Request $request)
    {
    	if($request->ajax()){
            $validator = \Validator::make($request->all(), [
                'full_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            // $user_role = Role::findOrFail($request->role_id);
            $user = User::findOrFail($request->id);
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->update();
            // $user->role()->attach($user_role,['created_at'=>now(),'updated_at'=>now()]);
            if($user){
                 return response()->json(['success'=> true,'user'=>$user]);
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function updateProfile(Request $request)
    {
    	$request->validate([
    	    'full_name' => 'required|string|max:255',
    	    'email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
    	]);
    	
    	// $user_role = Role::findOrFail($request->role_id);
    	$user = User::findOrFail($request->id);
    	$user->full_name = $request->full_name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->company_name = $request->company_name;
    	$user->update();
    	// $user->role()->attach($user_role,['created_at'=>now(),'updated_at'=>now()]);
    }
}
