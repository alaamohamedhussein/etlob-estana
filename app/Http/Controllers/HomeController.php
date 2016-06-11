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
        $client = new Client();
//        http://172.16.2.13:8087/itiProject/rest/categoryURL/getCategories
        $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/project/getLastProject');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $wantedProjects = $string['projects'];
        $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/categoryURL/getCategories');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $categories = $string['categories'];
        $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/project/getBestProject');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $projects = $string['bestProjects'];
//        dd($projects);
        $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/user/getMaxUser');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $suppliers = $string['users'];
//        dd($projects);
        return view('_layout.master', compact('wantedProjects','categories','projects','suppliers'));
    }
    public function showWantedDetails($id)
    {
        //
        if (Session::get('user')['userId']!= null){
         $client = new Client();
    
    $res = $client->request('POST', 'http://localhost:8084/itiProject/rest/project/getproject',[
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
    
    $res = $client->request('POST', 'http://localhost:8084/itiProject/rest/project/getproject',[
        'form_params' => [
            'pId' => $id,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    if ($string['satatus']==true) {
    $askedProjects=$string['project']; 
//    dd($askedProjects);
    $projectdata=$askedProjects;
//    dd($projectdata);
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
        $res = $client->request('GET', 'http://localhost:8084/itiProject/rest/portofolio/getPortofolioRandom?categoryId='.$id.'&footer=6');
        $result = $res->getBody();
        $string = json_decode($result, true);
        $portofolio = $string['portofolios'];
//        dd($portofolio);
//        return view('_layout.master', compact('data'));
        return view('_template.portofolioUser', compact('portofolio'));
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
