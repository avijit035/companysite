<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    public function project_type(){
      return $this->hasMany('App\Project_type_related','project_id');
    }
}
