<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Articale;
//use Request;
use Socialite;
use Auth;
use Validator;
use App\User;
use App\SocialAccountService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;


class UsersCntroller extends Controller {

    //
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function showLogin() {
        return view('log-in');
    }

    public function doLogin() {
        // create our user data for the authentication
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        $client = new Client();
        $res = $client->request('POST', 'http://172.16.2.13:8087/itiProject/rest/authentication/login',[
        'form_params' => [
            'email' => $userdata['email'],
            'pass' => $userdata['password'],
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
    
        // attempt to do the login
        if ($string['message']==true) {

            // validation successful!
            // redirect them to the secure section or whatever
            // return Redirect::to('secure');
            // for now we'll just echo success (even though echoing in a controller is bad)
//            Auth::login($userdata);
//            Auth::login($userdata['email'], $remember = true);
//            Auth::loginUsingId($userdata->getAuthIdentifier());
//            auth()->user($userdata);
//            Auth::user($userdata);
//            dd(Auth::user());
//            print_r($userdata['email']);
//            Auth::attempt($userdata, true);
//            Session::put('session', $userdata['email']);
//            dd( Session::get('session'));
            Session::put('user',$userdata);
//            dd(Session::get('user')['email']);
       return Redirect::to('/');
            
           
        } else {

            // validation not successful, send back to form 
            return Redirect::to('new');
        }
//        if (Auth::attempt($userdata, true)) {
//
//            // validation successful!
//            // redirect them to the secure section or whatever
//            // return Redirect::to('secure');
//            // for now we'll just echo success (even though echoing in a controller is bad)
//            echo 'SUCCESS!';
//        } else {
//
//            // validation not successful, send back to form 
//            return Redirect::to('new');
//        }
    }

    public function create() {
        return view('_template.signup');
    }

    public function store() {
//        $rules = array(
//            'name' => 'required|unique:users',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
//            'password_confirmation' => 'required|same:password'
//        );
        $rules = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'gender' => "male",
            'street' => Input::get('street'),
            'city' => Input::get('city'),
            'country' => Input::get('country'),
            'governorate' => Input::get('governorate'),
            'title' => Input::get('title'),
            'summery' => Input::get('summery'),
            'mobile' => Input::get('mobile'),
            'phone' => Input::get('phone'),
        );
         $client = new Client();
        $res = $client->request('POST', 'http://172.16.2.13:8087/itiProject/rest/authentication/register',[
        'form_params' => [
            'userName' => $rules['name'],
            'userEmail' => $rules['email'],
            'password' => $rules['password'],
            'gender' => $rules['gender'],
            'street' => $rules['street'],
            'ciry' => $rules['city'],
            'country' => $rules['country'],
            'governorate' => $rules['governorate'],
            'Title' => $rules['title'],
            'summery' => $rules['summery'],
            'mobiles' => $rules['mobile'],
            'phones' => $rules['phone'],
            'skill' => "1,2,3",
            'userImage' => "image",
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
        dd($string);
//        $validator = validator::make(Input::all(), $rules);
//        if ($validator->fails()) {
//            
//            return Redirect::to('create')->withInput()->withErrors($validator->messages());
//        }
//        User::create(array(
//            'name' => Input::get('name'),
//            'email' => Input::get('email'),
//            'password' => \bcrypt(Input::get('password')),
//        ));
//        return Redirect::to('/');
    }

    public function logout() {
        Session::forget('user'); // log the user out of our application
        return Redirect::to('/new'); // redirect the user to the login screen
    }

    public function showIndex() {
        return view('_layout.master');
    }
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
        // when facebook call us a with token   
       $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        
        auth()->login($user);
       
        return redirect()->to('/');
    }

}
