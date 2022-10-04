<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;
use App\Students;
use App\User;
use Carbon\Carbon;
use DB;
use Mail;
use App\Mail\MailNotify;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => 'required',
            'birthday' => 'required|date|before:-18 years',
            'birthplace' => 'required',
            'contact' => 'required|numeric|unique:students',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => 'required',
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

        $email = $data['email'];

            $isEmpty = User::count();

                if($isEmpty == 0){

                    $latestID = 00001;
                    $applicationID = '2022A'.$latestID;
                }
                else{
                    $latest = User::all()->last()->id;
                    $latestID = $latest + 00001;
                    $applicationID = '2022A'.$latestID;
                }

                $userdata = User::create([
                    'appnum' => $applicationID,
                    'firstname' => $data['firstname'],
                    'middlename' => $data['middlename'],
                    'lastname' => $data['lastname'],
                    'username' => $data['username'],
                    'emailVerify_token'=>Str::random(60),
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'user_level' => '2',

                ]);

                Students::create([
                    'userid' => $userdata->id,
                    'appnum' => $applicationID,
                    'name' => $data['firstname'].' '.$data['middlename']. ' '.$data['lastname'],
                    'firstname' => $data['firstname'],
                    'middlename' => $data['middlename'],
                    'lastname' => $data['lastname'],
                    'username' => $data['username'],
                    'gender' => $data['gender'],
                    'birthday' => $data['birthday'],
                    'birthplace' => $data['birthplace'],
                    'age' => $data['agevalue'],
                    'contact' => $data['contact'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'profile_pic' => 'images/admin_user.png',
                    'created_at' => now(),
                ]);

                Mail::to($email)->send(new MailNotify($userdata));


                return $userdata;


    }

    public function emailverification($token){
        $checktoken = User::where('emailVerify_token','=',$token)->first();
        if(isset($checktoken)){
            if(!$checktoken->email_verified_at){
                
                $checktoken->email_verified_at = Carbon::now();
                $checktoken->update();
                return redirect('login')->with('success','Successfully Verified!');
            }
           
        }else{
            return redirect('login')->with('fail','Account is already verified!');
        }
    }
}