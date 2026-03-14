<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $fillable = [
      'title' , 'description' , 'theme_id' , 'slide' , 'video'
    ];
}
