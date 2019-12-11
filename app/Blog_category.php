<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_category extends Model
{
    //
    public function blog(){
      return $this->belongsTo(Blog::class,'blog_id','id');
    }

}
