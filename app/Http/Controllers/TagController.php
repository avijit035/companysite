<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Blog_tag;

class TagController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blog_tags()
    {
         $tags=Tag::orderBy('id','asc')->paginate(10);
        return view('admin.blog_tags',compact('tags'));
    }
    public function add_tag(Request $request){
      $c=Tag::where('name',$request->tag)->first();
      if(!empty($c) || empty($request->tag)){}
      else{
      $tag=new Tag;
      $tag->name=$request->tag;
      $tag->save();
       }
      return back();
    }
    public function update_tag(Request $request){
      $c=Tag::where('name',$request->tag)->first();
      if(!empty($c) || empty($request->tag)){ return back();}

      $tag=Tag::find($request->id);
        if(!empty($request->tag)){
      $old_tag=$tag->name;
      $tag_update=Blog_tag::where('tag',$old_tag)->get();
      foreach($tag_update as $c){
        $c->tag=$request->tag;
        $c->save();
      }

      $tag->name=$request->tag;
      $tag->save();
    }
      return back();
    }
    public function delete_tag($id){
      $tag=Tag::find($id);
      $old_tag=$tag->name;
      $tag_update=Blog_tag::where('tag',$old_tag)->get();
      foreach($tag_update as $c){
        $c->delete();
      }

      $tag->delete();
      return back();
    }
}
