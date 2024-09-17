<?php

namespace App\Http\Controllers\Auth;

use App\Actions\ImageModelSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Models\User;
use App\Services\Users\SaveUserInfoService;
use App\traits\upload_image;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    use upload_image;
    public function index()
    {
//        return auth()->user();
        return view('auth.register');
    }
    public function save(SaveUserInfoFormRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'client';

        $file =$request->file('image');
        if($file==null){
            $image_name = 'default.png';
        }else{
            $image_name = $this->upload($file,'users');
        }

        $user = SaveUserInfoService::save($data);
        ImageModelSave::make($user->id, 'User',$image_name);
        return redirect()->back()->with('Message','User Registered Successfully');
    }
}
