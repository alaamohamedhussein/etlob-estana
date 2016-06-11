<?php

namespace App\Http\Controllers;

use App\Http\Requests;

//use Illuminate\Http\Request;
use App\Articale;
use Request;
use Socialite;
use Auth;
use View;
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
        if(Request::ajax()) {
      $data = Input::all();
      print_r($data);die;
    }
//        dd("test");
        // create our user data for the authentication
    $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
     $rules=array(

            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
            
        );
        $validator = validator::make($userdata,$rules);
        if ($validator->fails())
            { return  Redirect::to('/new')->withInput()->withErrors($validator->messages());}
        $client = new Client();
        $res = $client->request('POST', 'http://localhost:8084/itiProject/rest/authentication/login',[
        'form_params' => [
            'email' => $userdata['email'],
            'pass' => $userdata['password'],
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
    
        // attempt to do the login
        if ($string['message']==true) {
            Session::put('user',$string['user']); 
            $userId=Session::get('user')['userId'];
            return Redirect::to('userProfile/'.$userId);
//            return view('_template.userProfile',compact('userData'));      
           }else {

            // validation not successful, send back to form 
            return Redirect::to('/');
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
public function profile($id) {
    $client = new Client();
    
    $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/user/getUser?userId='.$id);
    $result = $res->getBody();
    $string = json_decode($result, true);
    $userData=$string['user']; 
    return view('_template.userProfile',compact('userData')); 
}
public function portofolioProfile($id) {
    $client = new Client();
    
    $res = $client->request('POST', 'http://localhost:8084/itiProject/rest/portofolio/getUser',[
        'form_params' => [
            'portId' => $id,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    $userData=$string['user']; 
    return view('_template.userProfile',compact('userData')); 
}
    public function create() {
        return view('_template.signup');
    }

    public function store() {
        $require = array(
            'name' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',
            'gender' => 'required',
            'city' => 'required',
            'country' => 'required',
            'governorate' => 'required',
            'summery' => 'required|min:50',
            'title' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
        );
        $rules = array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'gender' => Input::get('gender'),
            'street' => Input::get('street'),
            'city' => Input::get('city'),
            'country' => Input::get('country'),
            'governorate' => Input::get('governorate'),
            'title' => Input::get('title'),
            'summery' => Input::get('summery'),
            'mobile' => Input::get('mobile'),
            'phone' => Input::get('phone'),
            'userimage' => Input::get('userimage'),
            
        );
         $imgda= file_get_contents ('/home/alaa/Desktop/etlob-estana/public/images/'.$rules['userimage']);
        $imdata = base64_encode($imgda );
        $validator = validator::make($rules,$require);
        if ($validator->fails())
            { return Redirect::to('/')->withInput()->withErrors($validator->messages());}
         $client = new Client();
        $res = $client->request('POST', 'http://localhost:8084/itiProject/rest/authentication/register',[
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
            'name' => $rules['userimage'],
            'content' => $imdata,
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
        return Redirect::to('/userprofile');
//        dd($string);
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
        return Redirect::to('/'); // redirect the user to the login screen
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
