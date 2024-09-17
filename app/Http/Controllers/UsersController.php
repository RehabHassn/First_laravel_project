<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile($id){
       $user = User::query()->find($id);
       if($user){

               $user->update (['username' =>'test']);
       }else{
           return 'no data found';
       }
    }
    public function index(){
        $data = User:: query();
        if(request()->filled('username')){
           $data->where('username', 'like', "%".request('username')."%");
        }

         $result= $data->
         select('username','email')
             ->orderBy('id','desc')
            ->get();

        return view('about',compact('result'));
//        User::query()->create(['username' => 'ola',
//            'email' => 'ola@gmail.com',
//            'password' =>bcrypt('ola123') ,
//            'phone'=>'0102658964',
//            'type'=>'clint']);
//        $data = User::query()->get()
//            ->where('id','>',0)->orderBy('id','desc')
//            ->first();
//        return $data;

    }
}
