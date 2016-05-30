<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Articale;
//use Request;
use Auth;
use Validator;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UsersCntroller extends Controller
{
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
//        $client = new Client();
//        $res = $client->request('GET', 'http://pillreminder-itiproject.rhcloud.com/login/dologin?username=' . $userdata['email'] . '&password=' . $userdata['password']
//        );
//
//        $result = $res->getBody();
//        $string = json_decode($result,true);
//    
//        // attempt to do the login
//        if ($string['remoteId']==0) {
//
//            // validation successful!
//            // redirect them to the secure section or whatever
//            // return Redirect::to('secure');
//            // for now we'll just echo success (even though echoing in a controller is bad)
//
//
//            echo 'SUCCESS!';
//        } else {
//
//            // validation not successful, send back to form 
//            return redirect()->guest('new');
//        }
        if (Auth::attempt($userdata,true)) {

        // validation successful!
        // redirect them to the secure section or whatever
        // return Redirect::to('secure');
        // for now we'll just echo success (even though echoing in a controller is bad)
        echo 'SUCCESS!';

    } else {        

        // validation not successful, send back to form 
        return Redirect::to('new');

    }
    }
    public function create()
    {
        return view('create');
    }
     public function store()
    {
        $rules=array(
            'name' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        );
        $validator = validator::make(Input::all(),$rules);
        if ($validator->fails())
        { return Redirect::to('create')->withInput()->withErrors($validator->messages());}
        User::create(array(
            'name' =>  Input::get('name'),
            'email' => Input::get('email'),
            'password' => \bcrypt(Input::get('password')),
    ));
        return Redirect::to('/');
    }
    public function logout()
{
    Auth::logout(); // log the user out of our application
    return Redirect::to('/new'); // redirect the user to the login screen
}

    
}

