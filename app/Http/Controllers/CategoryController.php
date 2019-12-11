<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog_category;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blog_categories()
    {
       $categories=Category::orderBy('id','asc')->paginate(10);
        return view('admin.blog_categories',compact('categories'));
    }

    public function add_category(Request $request){
      $c=Category::where('name',$request->category)->first();
      if(!empty($c) || empty($request->category)){}
      else{
      $cat=new Category;
      $cat->name=$request->category;
      $cat->save();
      }
      return back();
    }
    public function update_category(Request $request){
      $c=Category::where('name',$request->category)->first();
      if(!empty($c) || empty($request->category)){ return back();}

      $cat=Category::find($request->id);
      if(!empty($request->category)){
      $old_cat=$cat->name;
      $cat_update=Blog_category::where('category',$old_cat)->get();
      foreach($cat_update as $c){
        $c->category=$request->category;
        $c->save();
      }
      $cat->name=$request->category;
      $cat->save();
    }
      return back();
    }
    public function delete_category($id){
      $cat=Category::find($id);
      $old_cat=$cat->name;
      $cat_update=Blog_category::where('category',$old_cat)->get();
      foreach($cat_update as $c){
        $c->delete();
      }
      $cat->delete();
      return back();
    }

}
