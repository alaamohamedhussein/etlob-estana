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

class OfferController extends Controller
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
         return view('projects.addOffer');
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
             'pid' => Input::get('pid'),
            'price' => Input::get('price'),
            'startDate' => Input::get('startDate'),
            'deadLine' => Input::get('deadLine'),
        );
        
         //dd(image2wbmp($rules['projectsimageses']));
         $userId=Session::get('user')['userId'];
//         dd($rules);
         $client = new Client();
        $res = $client->request('POST', env('MY_GLOBAL_VAR').'/porposa/insertPorposer',[
        'form_params' => [
            'price' => $rules['price'],
            'startDate' => $rules['startDate'],
            'deadLine' => $rules['deadLine'],
            'uId' => $userId,
            'pId' => $rules['pid'],
            
           
        ]
    ]);

        $result = $res->getBody();
        $string = json_decode($result,true);
       
//        dd($string);
         if ($string['output']=="tureInsert") {
//           return redirect()->back();
            return Redirect::to('/#wantedprojects');
//            return view('projects.allOffer', compact('string'));   
        } else {

            // validation not successful, send back to form 
            return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
         $rules = array(
             'pid' => Input::get('pid'));
        $client = new Client();
        $res = $client->request('GET', env('MY_GLOBAL_VAR').'/porposa/getPorposals?pId='.$rules['pid']);

        $result = $res->getBody();
        $string = json_decode($result,true);
       
//        dd($string);
         if ($string['satatus']=="true") {
           $allOffer= $string['projectPorposa'];
           $pid=$rules['pid'];
//            return Redirect::to('userProfile/'.$userId);
    return view('projects.allOffer', compact('allOffer','pid'));   
        } else {

            // validation not successful, send back to form 
            return Redirect::to('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function offerAction()
    {
        //
        $rules = array(
             'pid' => Input::get('pid'),
               'porposlid'=> Input::get('porposlid'));
        $client = new Client();
        $res = $client->request('GET', env('MY_GLOBAL_VAR').'/status/updateStatus?porposa='.$rules['porposlid'].'&project='.$rules['pid']);

        $result = $res->getBody();
        $string = json_decode($result,true);
       
//        dd($string);
         if ($string['satatus']=="true") {
            return Redirect::to('/ProjectsWorkedDetails/'.$rules['pid']);
           } else {

            // validation not successful, send back to form 
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
