<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function footer()
    {
       $footers=Footer::orderBy('id','asc')->paginate(10);
        return view('admin.footer',compact('footers'));
    }
    public function add_footer(Request $request){

      if(empty($request->link) || empty($request->title) || empty($request->class) || empty($request->icon_class)){}
      else{
      $footer=new Footer;
      $footer->link=$request->link;
      $footer->title=$request->title;
      $footer->class=$request->class;
      $footer->icon_class=$request->icon_class;
      $footer->save();
      }
      return back();
    }
    public function update_footer(Request $request){

      if(empty($request->link) || empty($request->title) || empty($request->class) || empty($request->icon_class)){ return back();}

      $footer=Footer::find($request->id);
      $footer->link=$request->link;
      $footer->title=$request->title;
      $footer->class=$request->class;
      $footer->icon_class=$request->icon_class;
      $footer->save();

      return back();
    }
    public function delete_footer($id){
      $footer=Footer::find($id);
      $footer->delete();
      return back();
    }
}
