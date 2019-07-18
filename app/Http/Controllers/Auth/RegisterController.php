<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\verificationMail;
use App\Notifications\UserRegistrationNotification;
use App\Role;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_token' => Str::random(40),
        ]);

        if($user){
            Session::flash('verify_message','Your account created successfully! Please verify your email for active account');
            $userDetails = User::findOrFail($user->id);
            $this->sendVerificationEmail($userDetails);
            $admins = User::whereHas('role', function($q){
                        $q->where('name', 'admin');
                    })->get();

            Notification::send($admins, new UserRegistrationNotification($user));
            //$admin->notify(new UserRegistrationNotification($user));
        }
        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect($this->redirectTo());
    }

    public function sendVerificationEmail($userDetails){
        Mail::to($userDetails->email)->send(new verificationMail($userDetails));
    }

    public function verifyRegistrationEmail($email,$verify_token){
        $user = User::where(['email'=>$email,'verify_token'=>$verify_token])->first();

        if($user) {
            if($update = User::where(['email'=>$email,'verify_token'=>$verify_token])->update(['active'=>1,'verify_token'=>null])){
                Session::flash('verify_message','Your account activated successfully! Now you can login');
                return redirect(route('login'));
            }
        }
    }

    public function redirectTo()
    {
        $this->redirectTo = url()->previous();

        return $this->redirectTo ?? '/';
    }
}
