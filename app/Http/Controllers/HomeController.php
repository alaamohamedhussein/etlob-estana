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
env('MY_GLOBAL_VAR');
class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {
//        dd(env('MY_GLOBAL_VAR'));
        $client = new Client();

        $res1 = $client->request('GET', env('MY_GLOBAL_VAR').'/project/getLastProject');
        $result1 = $res1->getBody();
        $string1 = json_decode($result1, true);
        $wantedProjects = $string1['projects'];
        $res2 = $client->request('GET', env('MY_GLOBAL_VAR').'/categoryURL/getCategories');
        $result2 = $res2->getBody();
        $string2 = json_decode($result2, true);
        $categories = $string2['categories'];
        $res3 = $client->request('GET', env('MY_GLOBAL_VAR').'/project/getBestProject');
        $result3 = $res3->getBody();
        $string3 = json_decode($result3, true);
                
        $projects = $string3['bestProjects'];
//        dd($projects);
        $res4 = $client->request('GET', env('MY_GLOBAL_VAR').'/user/getMaxUser');
        $result4 = $res4->getBody();
        $string4 = json_decode($result4, true);
        $suppliers = $string4['users'];
         $res5 = $client->request('GET', env('MY_GLOBAL_VAR').'/authentication/getSkills');
        $result5 = $res5->getBody();
        $string5 = json_decode($result5, true);
        $skills = $string5['skills'];
//        dd($projects);
        if($wantedProjects&&$categories&&$projects&&$suppliers){
        return view('_layout.master', compact('wantedProjects','categories','projects','suppliers','skills'));
         }
        else
        {return view('welcome');}
    
    }
    public function showWantedDetails($id)
    {
        //
        if (Session::get('user')['userId']!= null){
         $client = new Client();
    
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/project/getproject',[
        'form_params' => [
            'pId' => $id,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    if ($string['satatus']==true) {
    $askedProjects=$string['project']; 
//    dd($askedProjects);
    return view('_template.wantedProjectDetails',compact('askedProjects'));
        }}
    else
    {
        return Redirect::to('/#wantedprojects');
    }
    
   
    }
     public function showHightDetails($id)
    {
        if (Session::get('user')['userId']!= null){
         $client = new Client();
    
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/project/getproject',[
        'form_params' => [
            'pId' => $id,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    if ($string['satatus']==true) {
    $askedProjects=$string['project']; 
//    dd($askedProjects);
    return view('_template.hightProjectDetails',compact('askedProjects'));
        }}
    else
    {
        return Redirect::to('/#wantedprojects');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portofolio($id) {
        $client = new Client();
        $res = $client->request('GET', env('MY_GLOBAL_VAR').'/portofolio/getPortofolioRandom?categoryId='.$id.'&footer=6');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $portofolio = $string['portofolios'];
//        dd($portofolio);
//        return view('_layout.master', compact('data'));
        if($portofolio){
        return view('_template.portofolioUser', compact('portofolio'));}
        else 
            {return Redirect::to('/');}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
 
}
