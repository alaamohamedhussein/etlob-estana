<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Request;
//use Illuminate\Support\Facades\Input;
//use Illuminate\Http\Request;
use App\Articale;
//use Request;
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
       
        return view('_template.login');
    }

    public function doLogin() {
      
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
            { return  Redirect::to('/login')->withInput()->withErrors($validator->messages());}
        $client = new Client();
        $res = $client->request('POST', env('MY_GLOBAL_VAR').'/authentication/login',[
        'form_params' => [
            'email' => $userdata['email'],
            'pass' => $userdata['password'],
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
//        dd($string['message']);
        // attempt to do the login
        if ($string['message']=="تم تسجيل الدخول ") {
//            dd($string);
            Session::put('user',$string['user']); 
            $userId=Session::get('user')['userId'];
            return Redirect::to('userProfile/'.$userId);
//            return view('_template.userProfile',compact('userData'));      
           }else {

            // validation not successful, send back to form 
            return Redirect::to('/login');
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
    
    $res = $client->request('GET', env('MY_GLOBAL_VAR').'/user/getUser?uId='.$id);
    $result = $res->getBody();
    $string = json_decode($result, true);
    $userData=$string['user']; 
//    dd($userData);
    return view('_template.userProfile',compact('userData')); 
}
public function portofolioProfile($id) {
    $client = new Client();
    
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/portofolio/getUser',[
        'form_params' => [
            'portId' => $id,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    $userData=$string['user']; 
//    dd($userData);
    return view('_template.userProfile',compact('userData')); 
}
    public function create() {
        $client = new Client();
         $res5 = $client->request('GET', env('MY_GLOBAL_VAR').'/authentication/getSkills');
        $result5 = $res5->getBody();
        $string5 = json_decode($result5, true);
        $skills = $string5['skills'];
        return view('_template.signup',  compact('skills'));
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
            'userimage' => Input::file('userimage'),
            'skill' => Input::get('skill'),
            'bussinessType' => Input::get('bussinessType'),
        );
//        dd($rules);
        $file =($rules['userimage']);
//        $file=Request::input('portofolioImage');
//        dd($rules['portofolioImage']);
        $extension=$file->getClientOriginalExtension();
        $image_name = $file->getFileName().'.'.$extension ;
        $destinationPath = public_path().'/images/';
        $uploadSuccess  = $file->move($destinationPath,$image_name);
//        dd($uploadSuccess);
        if($uploadSuccess!= "false"){
         $imgda= file_get_contents ($destinationPath.$image_name);
        $imdata = base64_encode($imgda );}
//        dd($imdata);
//        $validator = validator::make($rules,$require);
//        if ($validator->fails())
//            { return Redirect::to('/')->withInput()->withErrors($validator->messages());}
         $client = new Client();
        $res = $client->request('POST', env('MY_GLOBAL_VAR').'/authentication/register',[
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
            'skill' => $rules['skill'],
            'name' => $image_name ,
            'content' => $imdata,
            'bussinessType' => $rules['bussinessType'],
        ]
    ]);

            
        $result = $res->getBody();
        $string = json_decode($result,true);
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
        if ($string['output']=="تم  تسجيل الحساب بنجاح") {
           $res = $client->request('POST', env('MY_GLOBAL_VAR').'/authentication/login',[
        'form_params' => [
            'email' =>  $rules['email'],
            'pass' => $rules['password'],
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
//        dd($string['message']);
        // attempt to do the login
        if ($string['message']=="تم تسجيل الدخول ") {
            Session::put('user',$string['user']); 
            $userId=Session::get('user')['userId'];
            return Redirect::to('userProfile/'.$userId);
//            return view('_template.userProfile',compact('userData'));      
           }else {

            // validation not successful, send back to form 
            return Redirect::to('/login');
        }}else {

            // validation not successful, send back to form 
            return Redirect::to('/');
        }
//        return redirect()->back();
    }

    public function addPortofolio(){
        $client = new Client();
        $res2 = $client->request('GET', env('MY_GLOBAL_VAR').'/categoryURL/getCategories');
        $result2 = $res2->getBody();
        $string2 = json_decode($result2, true);
        $categories = $string2['categories'];
        return view('_template.addPortofolio',compact('categories'));
    }
     public function showPortofolio($id){
          $client = new Client();
    
    $res = $client->request('GET', env('MY_GLOBAL_VAR').'/user/getUser?uId='.$id);
    $result = $res->getBody();
    $string = json_decode($result, true);
    $userData=$string['user']; 
//    dd($userData);
         return view('_template.showPortofolio',  compact('userData'));
     }
    
    public function savePortofolio(){
        $rules = ['category' => Input::get('category'),
            'description' => Input::get('description'),
            'portofolioImage' => Request::file('pImage'),
            
            ];
        $userId=Session::get('user')['userId'];
//        dd($rules['portofolioImage']);
////        dd($rules);  Request::file
        $file =($rules['portofolioImage']);
//        $file=Request::input('portofolioImage');
//        dd($rules['portofolioImage']);
        $extension=$file->getClientOriginalExtension();
        $image_name = $file->getFileName().'.'.$extension ;
        $destinationPath = public_path().'/images/';
        $uploadSuccess  = $file->move($destinationPath,$image_name);
//        dd($uploadSuccess);
        if($uploadSuccess!= "false"){
         $imgda= file_get_contents ($destinationPath.$image_name);
        $imdata = base64_encode($imgda);
         $client = new Client();
        $res = $client->request('POST', env('MY_GLOBAL_VAR').'/portofolio/insertPortofolio',[
        'form_params' => [
            'cId' => $rules['category'],
            'description' => $rules['description'],
            'name' => $image_name,
            'content' => $imdata,
            'uId' => $userId,
        ]
    ]);       
        $result = $res->getBody();
        $string = json_decode($result,true);
//        dd($string);
        if ($string['satatus']=="true") {
            return Redirect::to('userProfile/'.$userId);
        }
    }else{ return Redirect::to('/');}}
    

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
