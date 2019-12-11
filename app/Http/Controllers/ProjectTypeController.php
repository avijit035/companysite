<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_type;
use App\Project_type_related;

class ProjectTypeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function project_type()
    {
       $project_types=Project_type::orderBy('id','asc')->paginate(10);
        return view('admin.project_type',compact('project_types'));
    }

    public function add_project_type(Request $request){
      $c=Project_type::where('name',$request->project_type)->first();
      if(!empty($c) || empty($request->project_type)){}
      else{
      $ptype=new Project_type;
      $ptype->name=$request->project_type;
      $ptype->save();
      }
      return back();
    }
    public function update_project_type(Request $request){
      $c=Project_type::where('name',$request->project_type)->first();
      if(!empty($c) || empty($request->project_type)){ return back();}

      $ptype=Project_type::find($request->id);

      $ptype->name=$request->project_type;
      $ptype->save();

      return back();
    }
    public function delete_project_type($id){
      $ptype=Project_type::find($id);

      $related_update=Project_type_related::where('project_type_id',$id)->get();
      foreach($related_update as $c){
        $c->delete();
      }

      $ptype->delete();
      return back();
    }

}
