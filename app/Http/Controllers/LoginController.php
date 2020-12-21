<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
        public function index(){
        return view('login.index');
    }

    public function varify(Request $req){
        $users=User:: 
        where('username',$req->username)->
        where('password',$req->password)->
        where('usertype',$req->usertype)->
        get();
        if(count($users) > 0 ){
      $req->session()->put('username', $req->username);
           $req->session()->put('usertype', $req->usertype);
           if($users['usertype']=="employee"){
            return redirect('/employee');   
           }
        //    return redirect('/employee');
       }
       else{
           $req->session()->flash('msg','invalid username/password');
           return redirect('/login');
       }

    }
}
