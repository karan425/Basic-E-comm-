<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $req){
        $user = User::where(['email'=>$req->email])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            # code...
            return "Username or Password is not Matched";
        }else{
            $req->session()->put('userAuth',$user);
            return redirect('product');
        }
         
    }
}
