<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable = ['id', 'title', 'content','users_id','price','goods_images_id'];
}
