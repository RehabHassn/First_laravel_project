<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function users(){
        $users =User::query()
            ->with('image')
            ->orderBy('id','DESC')->paginate(3);
        $data= UserResource::collection($users);
        return view('admin.users',compact('data'));

    }
}
