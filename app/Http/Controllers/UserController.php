<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
       
        return view('index');
        
    }
    public function about(){
       
        return view('about');
        
    }
    public function contact(){
       
        return view('contact');
        
    }
    public function services(){
        $data = array('title' => 'services','services'=>['web design','php','web','androiid'] );
        return View::make("services")->with(array('data'=>$data));
         
        

        
    }

}
