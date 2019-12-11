<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Blog;
use App\Blog_category;
use App\Blog_tag;
use App\Category;
use App\Tag;
use Image;
use File;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blog()
    {
        $blogs=Blog::orderBy('id','desc')->paginate(10);
        $categories=Category::orderBy('id','asc')->get();
        $tags=Tag::orderBy('id','asc')->get();
        return view('admin.blog',compact('blogs','categories','tags'));
    }
    public function add_blog(Request $request){
       $request->validate([
         'title' => 'required',
         'details' => 'required',
         'new_image' => 'required|image',
       ]);
      if(empty($request->new_image) || empty($request->title) || empty($request->details)){}
      else{
      $blog=new Blog;
      $blog->title=$request->title;
      $blog->details=$request->details;
      $image=$request->file('new_image');
      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('../images/blog/'.$img);
      Image::make($image)->save($location);
      $blog->image=$img;
      $blog->date=date('Y-m-d');
      $blog->author=Auth::user()->name;
      $blog->save();
      if(!empty($request->category)){
      foreach($request->category as $p){
      $category=new Blog_category;
      $category->blog_id=$blog->id;
      $category->category=$p;
      $category->save();
      }
      }
      if(!empty($request->tag)){
      foreach($request->tag as $p){
      $tag=new Blog_tag;
      $tag->blog_id=$blog->id;
      $tag->tag=$p;
      $tag->save();
      }
      }

      }
      return back();
    }
    public function update_blog(Request $request){
      $request->validate([
        'title' => 'required',
        'details' => 'required',
        'new_image' => 'image',
      ]);


      if(empty($request->title) || empty($request->details)){ return back();}

      else{
      $blog=Blog::find($request->id);
      $blog->title=$request->title;
      $blog->details=$request->details;
      $blog->date=date('Y-m-d');

      if(!empty($request->new_image)){
      if(File::exists('images/blog/'.$blog->image)){
        File::delete('images/blog/'.$blog->image);
      }

      $image=$request->file('new_image');
      $img=time().'.'.$image->getClientOriginalExtension();
      $location=public_path('../images/blog/'.$img);
      Image::make($image)->save($location);
      $blog->image=$img;
      }

      $blog->save();
      $delete_category=Blog_category::where('blog_id',$blog->id)->get();
      foreach($delete_category as $d){
        $d->delete();
      }
      $delete_tag=Blog_tag::where('blog_id',$blog->id)->get();
      foreach($delete_tag as $d){
        $d->delete();
      }
      if(!empty($request->category)){
      foreach($request->category as $p){
      $category=new Blog_category;
      $category->blog_id=$blog->id;
      $category->category=$p;
      $category->save();
      }
      }
      if(!empty($request->tag)){
      foreach($request->tag as $p){
      $tag=new Blog_tag;
      $tag->blog_id=$blog->id;
      $tag->tag=$p;
      $tag->save();
      }
      }
      }

      return back();
    }
    public function delete_blog($id){
      $blog=Blog::find($id);
      if(File::exists('images/blog/'.$blog->image)){
        File::delete('images/blog/'.$blog->image);
      }
      $delete_category=Blog_category::where('blog_id',$blog->id)->get();
      foreach($delete_category as $d){
        $d->delete();
      }
      $delete_tag=Blog_tag::where('blog_id',$blog->id)->get();
      foreach($delete_tag as $d){
        $d->delete();
      }
      $blog->delete();
      return back();
    }


}
