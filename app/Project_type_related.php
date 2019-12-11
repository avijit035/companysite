<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_type_related extends Model
{
    //
    public function name(){
      return $this->belongsTo(Project_type::class,'project_type_id','id');
    }
}
