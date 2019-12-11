<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;

class SkillController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function skills()
    {
       $skills=Skill::orderBy('id','asc')->paginate(10);
        return view('admin.skills',compact('skills'));
    }
    public function add_skill(Request $request){
      $c=Skill::where('name',$request->skill)->first();
      if(!empty($c) || empty($request->skill) || empty($request->percent)){}
      else{
      $skill=new Skill;
      $skill->name=$request->skill;
      $skill->percent=$request->percent;
      $skill->save();
      }
      return back();
    }
    public function update_skill(Request $request){
      $c=Skill::where('name',$request->skill)->first();

      if(empty($request->skill) || empty($request->percent)){ return back();}

      $skill=Skill::find($request->id);
      $skill->name=$request->skill;
      $skill->percent=$request->percent;
      $skill->save();

      return back();
    }
    public function delete_skill($id){
      $skill=Skill::find($id);
      $skill->delete();
      return back();
    }
}
