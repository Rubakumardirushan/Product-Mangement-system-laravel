<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class Logincontroller extends Controller
{
    public function authendicate(Request $request){
        $valider=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $email=$valider['email'];
        $password=$valider['password'];
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
$user=User::where('email',$email)->first();
Auth::login($user);
return redirect('/View');

        }else{
            return back()->withErrors(['Invalid']);
        }

    }




    public function logout(){


Auth::logout();
return redirect('/login');

    }
}
