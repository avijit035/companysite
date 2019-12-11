<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siteinfo;
use Image;
use File;

class SiteinfoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function siteinfo()
    {
       $siteinfos=Siteinfo::orderBy('id','asc')->get();
        return view('admin.siteinfo',compact('siteinfos'));
    }
    public function update_siteinfo(Request $request)
    {
      $request->validate([
        'new_image' => 'image',
      ]);
      $info=Siteinfo::find($request->id);
      if($request->id <6 || $request->id >8){
        $info->title=$request->title;
      }
      if($request->id <10){
        $info->details=$request->details;
      }
      if($request->id ==3 || $request->id ==4 || $request->id ==6 || $request->id ==7){
        if(!empty($request->new_image)){
        if(File::exists('images/'.$info->image)){
          File::delete('images/'.$info->image);
        }
        $image=$request->file('new_image');

        $img=time().'.'.$image->getClientOriginalExtension();
        $location=public_path('../images/'.$img);
        Image::make($image)->save($location);
        $info->image=$img;
         }

      }
      $info->save();
      return back();
    }

    public function delete_siteinfo($id)
    {
        $info=Siteinfo::find($id);
        $info->title="";
        $info->details="";
        if($id ==3 || $id ==4 || $id ==6 || $id ==7){
        if(File::exists('images/'.$info->image)){
          File::delete('images/'.$info->image);
        }
        $info->image="";
      }
      $info->save();
      return back();
    }
}
