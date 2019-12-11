<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    public function category(){
      return $this->hasMany(Blog_category::class);
    }
    public function tag(){
      return $this->hasMany(Blog_tag::class);
    }
}
