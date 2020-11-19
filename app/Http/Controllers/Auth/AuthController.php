<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
    	return view('auth.login');
    }
    public function postLogin(Request $req){
    	$username=$req->username;
    	$password=$req->password;
    	$login=Auth::attempt([
    		'username' =>$username,
    		'password' => $password,
    	]);
    	if($login){
    		return redirect()->route('admin.story.index');
    	}
    	else{

    		return redirect()->route('auth.login')->with('msg','Sai username hoặc password');
    	}
   }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
