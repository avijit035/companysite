<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

use Image;
use File;

class TeamController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function team()
  {
     $teams=Team::orderBy('id','asc')->paginate(10);
      return view('admin.team',compact('teams'));
  }
  public function add_team(Request $request){
     $request->validate([
       'name' => 'required',
       'details' => 'required',
       'new_image' => 'required|image',
     ]);
    if(empty($request->new_image) || empty($request->name) || empty($request->details)){}
    else{
    $team=new Team;
    $team->name=$request->name;
    $team->details=$request->details;
    $image=$request->file('new_image');

    $img=time().'.'.$image->getClientOriginalExtension();
    $location=public_path('../images/services/'.$img);
    Image::make($image)->save($location);
    $team->image=$img;
    $team->save();
    }
    return back();
  }
  public function update_team(Request $request){
    $request->validate([
      'name' => 'required',
      'details' => 'required',
      'new_image' => 'image',
    ]);


    if(empty($request->name) || empty($request->details)){ return back();}

    $team=Team::find($request->id);
    if(!empty($request->new_image)){
    if(File::exists('images/services/'.$team->image)){
      File::delete('images/services/'.$team->image);
    }
    $image=$request->file('new_image');

    $img=time().'.'.$image->getClientOriginalExtension();
    $location=public_path('../images/services/'.$img);
    Image::make($image)->save($location);
    $team->image=$img;
     }

    $team->name=$request->name;
    $team->details=$request->details;
    $team->save();

    return back();
  }
  public function delete_team($id){
    $team=Team::find($id);
    if(File::exists('images/services/'.$team->image)){
      File::delete('images/services/'.$team->image);
    }
    $team->delete();
    return back();
  }
}
