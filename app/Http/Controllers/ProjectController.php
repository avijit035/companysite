<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Project_type;
use App\Project_type_related;
use App\Team;
use Image;
use File;
class ProjectController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function project()
    {
       $projects=Project::orderBy('id','desc')->paginate(10);
       $project_types=Project_type::orderBy('id','asc')->get();
        return view('admin.project',compact('projects','project_types'));
    }
    public function add_project(Request $request){
       $request->validate([
         'title' => 'required',
         'details' => 'required',
         'new_image' => 'required|image',
       ]);
      if(empty($request->new_image) || empty($request->title) || empty($request->details)){}
      else{
      $project=new Project;
      $project->title=$request->title;
      $project->details=$request->details;
      $project->link=$request->link;
      $image=$request->file('new_image');

      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('../images/portfolio/full/'.$img);
      $location1=public_path('../images/portfolio/recent/'.$img);
      Image::make($image)->save($location);
      Image::make($image)->resize(290, 220)->save($location1);
      $project->image=$img;
      $project->save();
      if(!empty($request->type)){
      foreach($request->type as $p){
      $ptype=new Project_type_related;
      $ptype->project_id=$project->id;
      $ptype->project_type_id=$p;
      $ptype->save();
      }
      }
      }
      return back();

    }

    public function update_project(Request $request){
      $request->validate([
        'title' => 'required',
        'details' => 'required',

      ]);

     if(empty($request->title) || empty($request->details)){}
     else{
     $project=Project::find($request->id);
     $project->title=$request->title;
     $project->details=$request->details;
     $project->link=$request->link;
     if(!empty($request->new_image)){
     if(File::exists('images/portfolio/full/'.$project->image)){
       File::delete('images/portfolio/full/'.$project->image);
     }
     if(File::exists('images/portfolio/recent/'.$project->image)){
       File::delete('images/portfolio/recent/'.$project->image);
     }
     $image=$request->file('new_image');
     $img=time().'.'.$image->getClientOriginalExtension();
     $location=public_path('../images/portfolio/full/'.$img);
     $location1=public_path('../images/portfolio/recent/'.$img);
     Image::make($image)->save($location);
     Image::make($image)->resize(290, 220)->save($location1);
     $project->image=$img;
     }

     $project->save();
     $old=Project_type_related::where('project_id',$project->id)->get();
     foreach($old as $d){
       $d->delete();
     }
     if(!empty($request->type)){
     foreach($request->type as $p){
     $ptype=new Project_type_related;
     $ptype->project_id=$project->id;
     $ptype->project_type_id=$p;
     $ptype->save();
     }
   }
     }


      return back();
    }
    public function delete_project($id){
      $project=Project::find($id);
      if(File::exists('images/portfolio/full/'.$project->image)){
        File::delete('images/portfolio/full/'.$project->image);
      }
      if(File::exists('images/portfolio/recent/'.$project->image)){
        File::delete('images/portfolio/recent/'.$project->image);
      }
      $project_types=Project_type_related::where('project_id',$project->id)->get();
      foreach($project_types as $d){
        $d->delete();
      }
      $project->delete();
      return back();
    }
}
