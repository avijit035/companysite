<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\Skill;
use Image;
use File;

class PartnerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function partner()
    {
       $partners=Partner::orderBy('id','asc')->paginate(10);
        return view('admin.partner',compact('partners'));
    }
    public function add_partner(Request $request){
       $request->validate([
         'new_image' => 'required|image',
       ]);
      if(empty($request->new_image)){}
      else{
      $partner=new Partner;
      $image=$request->file('new_image');

      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('../images/partners/'.$img);
      Image::make($image)->save($location);
      $partner->image=$img;
      $partner->save();
      }
      return back();
    }
    public function update_partner(Request $request){
      $request->validate([
        'new_image' => 'required|image',
      ]);


      if(empty($request->new_image)){ return back();}

      $partner=Partner::find($request->id);
      if(File::exists('images/partners/'.$partner->image)){
        File::delete('images/partners/'.$partner->image);
      }
      $image=$request->file('new_image');

      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('../images/partners/'.$img);
      Image::make($image)->save($location);
      $partner->image=$img;
      $partner->save();

      return back();
    }
    public function delete_partner($id){
      $partner=Partner::find($id);
      if(File::exists('images/partners/'.$partner->image)){
        File::delete('images/partners/'.$partner->image);
      }
      $partner->delete();
      return back();
    }
}
