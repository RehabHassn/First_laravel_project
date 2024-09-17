<?php

namespace App\traits;

trait upload_image
{
 public function upload($file,$folder_name){
     $validextensions = array("jpg", "jpeg", "png","svg","JPG","JPEG","PNG","gif","GIF");
      if (in_array($file->getClientOriginalExtension(), $validextensions)){
          $name = time().rand(0,999999).'_image.'.$file->getClientOriginalExtension();
          $file->move(public_path('/images/'.$folder_name), $name);
          return $folder_name.'/'.$name;
      }else{
          return false;
      }
 }
}
