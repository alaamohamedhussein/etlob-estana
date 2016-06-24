<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
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

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $res5 = $client->request('GET', env('MY_GLOBAL_VAR').'/authentication/getSkills');
        $result5 = $res5->getBody();
        $string5 = json_decode($result5, true);
        $skills = $string5['skills'];
        if (Session::get('user')['userEmail'])
            {
        return view('projects.add-project',  compact('skills'));
    }
    else{
      return  Redirect::To('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
         $rules = array(
            'project_name' => Input::get('project_name'),
            'project_description' => Input::get('project_description'),
            'budget' => Input::get('budget'),
            'startDate' => Input::get('startDate'),
            'deadLine' => Input::get('deadLine'),
            'projectsimageses' => Input::get('projectsimageses'),
            'skills' => Input::get('skills'),
            'tags' => Input::get('tags'),
            'category' => Input::get('category'),
        );
        
         //dd(image2wbmp($rules['projectsimageses']));
         $userId=Session::get('user')['userId'];
        $imgda= file_get_contents ('/home/alaa/Desktop/etlob-estana/public/images/'.$rules['projectsimageses']);
        $imdata = base64_encode($imgda );
//        dd($contents); 
//        dd($imgda);
         $client = new Client();
        $res = $client->request('POST', env('MY_GLOBAL_VAR').'/project/Project',[
        'form_params' => [
            'projectName' => $rules['project_name'],
            'projectDescription' => $rules['project_description'],
            'budget' => $rules['budget'],
            'startDate' => $rules['startDate'],
            'projectDeadLine' =>$rules['deadLine'],
            'name' => $rules['projectsimageses'],
            'content' => $imdata,
            'skilltables' => '1,2,3',
            'tagsofprojectses' => "java,php,mmm",
            'userId' => $userId,
            'categoryId' => "1",
            
           
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
       
//        dd($result);
         if ($string['output']=="tureInsert") {
           
//            return Redirect::to('userProfile/'.$userId);
            return view('welcome',compact('rules'));      
        } else {

            // validation not successful, send back to form 
            return Redirect::to('new');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProjectsHired()
    {
        //
        if (Session::get('user')['userId']!= null){
         $client = new Client();
    
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/project/projectsOfUserHire',[
        'form_params' => [
            'uId' => $userId=Session::get('user')['userId'],
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    if ($string['satatus']==true) {
    $userProjects=$string['projectsOfUserHire']; 
//    dd($userProjects);
    return view('projects.hireTable',compact('userProjects'));
        }}
    else
    {
        return Redirect::to('/');
    }
   
    }
public function showProjectsWorked()
    {
        //
        if (Session::get('user')['userId']!= null){
         $client = new Client();
    
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/project/projectsOfUserWork',[
        'form_params' => [
            'uId' => $userId=Session::get('user')['userId'],
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
//    dd($string);
    if ($string['satatus']==true) {
    $askedProjects=$string['projectsOfUserWork']; 
//    dd($askedProjects);
    return view('projects.askTable',compact('askedProjects'));
        }}
    else
    {
        return Redirect::to('/');
    }
   
    }
public function showProjectsWoredDetails($id)
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
    return view('projects.askTableDetails',compact('askedProjects'));
        }}
    else
    {
        return Redirect::to('/');
    }
   
    }
    
    public function showProjectsHiredDetails($id)
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
    return view('projects.hireTableDetails',compact('askedProjects'));
        }}
    else
    {
        return Redirect::to('/');
    }
   
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addcomment()
    {
        //
        if (Session::get('user')['userId']!= null){
          $userId=Session::get('user')['userId'];
           $rules = array(
            'pid' => Input::get('pid'),
            'comment' => Input::get('comment'),
               );
            $client = new Client();
            
    $res = $client->request('POST', env('MY_GLOBAL_VAR').'/ask/addQuestion',[
        'form_params' => [
            'pId' => $rules['pid'],
            'post'=> $rules['comment'],
            'sId'=> $userId,
        ]
    ]);
    $result = $res->getBody();
    $string = json_decode($result, true);
    if ($string['output']=="Question sent succesfuly") {
//    $comment=$string['project']; 
//    dd($askedProjects);
//    return view('projects.askTableDetails');
        return redirect()->back();
        }}
    else
    {
        return Redirect::to('/');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
