<?php
namespace App\Services\Users;
use App\Models\User;
class SaveUserInfoService
{
    public static function save($data, $id=null){

        return User::query()->updateOrCreate(['id'=>$id],$data);
    }
}
