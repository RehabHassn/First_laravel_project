<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = ['user_id','name','info','price'];
    public function images()
    {
        return $this->morphMany(Images::class,'imageable');
    }
}