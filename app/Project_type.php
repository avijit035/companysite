<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_type extends Model
{
    //
    public function related(){
      return $this->hasMany(Project_type_related::class,'project_type_id','id');
    }
}
