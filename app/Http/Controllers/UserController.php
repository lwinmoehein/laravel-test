<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showUser($id,$name){
        $skills=["programming"=>"PHP","talking"=>"none"];
        return 
        view('user')->with(compact('skills'));
        
    }
}
