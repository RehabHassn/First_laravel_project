<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteItemController extends Controller
{
   public function delete_item ()
   {
       if (request()->filled('model_name') && request()->filled('id')) {
           if(request('model_name')=='Images'){
               $image = Images::query()->find(request('id'));
               DeleteFileFromPublicAction::delete('images', $image->name);

           }
           DB:: select('DELETE FROM ' . request('model_name') . ' WHERE id = '. request('id'));
           return redirect()->back();
       }
   }


}
