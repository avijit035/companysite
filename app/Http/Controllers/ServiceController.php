<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Skill;

class ServiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function services()
    {
       $services=Service::orderBy('id','asc')->paginate(10);
        return view('admin.services',compact('services'));
    }
    public function add_service(Request $request){
      $c=Service::where('name',$request->service)->first();
      if(!empty($c) || empty($request->service) || empty($request->details) || empty($request->icon_class)){}
      else{
      $service=new Service;
      $service->name=$request->service;
      $service->details=$request->details;
      $service->icon_class=$request->icon_class;

      $service->save();
      }
      return back();
    }
    public function update_service(Request $request){
      $c=Service::where('name',$request->service)->first();

      if(empty($request->service) || empty($request->details) || empty($request->icon_class)){ return back();}

      $service=Service::find($request->id);
      $service->name=$request->service;
      $service->details=$request->details;
      $service->icon_class=$request->icon_class;
      $service->save();

      return back();
    }
    public function delete_service($id){
      $service=Service::find($id);
      $service->delete();
      return back();
    }
}
