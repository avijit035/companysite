<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeatureController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function features()
    {
       $features=Feature::orderBy('id','asc')->paginate(10);
        return view('admin.features',compact('features'));
    }
    public function add_feature(Request $request){
      $c=Feature::where('title',$request->feature)->first();
      if(!empty($c) || empty($request->feature) || empty($request->details) || empty($request->icon_class)){}
      else{
      $feature=new Feature;
      $feature->title=$request->feature;
      $feature->details=$request->details;
      $feature->icon_class=$request->icon_class;

      $feature->save();
      }
      return back();
    }
    public function update_feature(Request $request){
      $c=Feature::where('title',$request->feature)->first();

      if(empty($request->feature) || empty($request->details) || empty($request->icon_class)){ return back();}

      $feature=Feature::find($request->id);
      $feature->title=$request->feature;
      $feature->details=$request->details;
      $feature->icon_class=$request->icon_class;
      $feature->save();

      return back();
    }
    public function delete_feature($id){
      $feature=Feature::find($id);
      $feature->delete();
      return back();
    }
}
