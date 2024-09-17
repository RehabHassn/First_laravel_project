<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function save(LoginFormRequest $request)
    {
       $data = $request->validated();
       if(auth()->attempt($data)){
           return redirect()->back()->with('message','Login Success');
       }else{
           return redirect()->back()->withErrors(['message'=>'Email or password wrong']);
       }
    }
}
