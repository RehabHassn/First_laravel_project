<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\ContactResource;
use App\Models\Concat;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index(){
//      return request()->url();
      return view('profile.contact');
  }
  public function save(ContactFormRequest $request){

   //save data
      Concat::query()->create($request->validated());
      //return success message
      return redirect()->back()->with('success','Question send successfully');
  }
  public function get_data(){
      $data = Concat::query()->orderBy('id','desc')->get();
      return ContactResource::collection($data);
  }
}
