<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use App\Partner;
use App\Siteinfo;
use App\Feature;
use App\Team;
use App\Skill;
use App\Service;
use App\Project;
use App\Project_type;
use App\Project_type_related;
use App\Category;
use App\Tag;
use App\Blog;
use App\Mail\SendMail;



class pagescontroller extends Controller
{
    //

    public function index(){
      $partners=Partner::orderBy('id','asc')->get();
      $partners_data=Siteinfo::where('name','partner')->first();
      $ask=Siteinfo::where('name','ask')->first();
      $about_us=Siteinfo::where('name','about_us')->first();
      $features=Feature::orderBy('id','asc')->get();

      return view('public.index',compact('partners','partners_data','ask','about_us','features'));
    }

    public function about(){
      $teams=Team::orderBy('id','asc')->get();
      $skills=Skill::orderBy('id','asc')->get();
      $about=Siteinfo::where('name','about')->first();
      $skill_info=Siteinfo::where('name','skill_info')->first();

      return view('public.about',compact('teams','skills','about','skill_info'));
    }


    public function services(){
      $services=Service::orderBy('id','asc')->get();
      $total=$services->count();
      $half=$total/2;
      $services_1=Service::orderBy('id','asc')->skip(0)->take($half)->get();
      $services_2=Service::orderBy('id','asc')->skip($half)->take($total)->get();
      $services_left=Siteinfo::where('name','services_left')->first();
      $services_right=Siteinfo::where('name','services_right')->first();
      return view('public.services',compact('services_1','services_2','services_left','services_right'));
    }

    public function portfolio(){
      $portfolio_title=Siteinfo::where('name','portfolio_title')->first();
      $project_types=Project_type::orderBy('id','asc')->get();
      $projects=Project::orderBy('id','desc')->get();
      $project_type_relateds=Project_type_related::orderBy('id','asc')->get();


      return view('public.portfolio',compact('portfolio_title','project_types','projects','project_type_relateds'));
    }

    public function blog(){
      $categories=Category::orderBy('id','asc')->get();
      $tags=Tag::orderBy('id','asc')->get();
      $blogs=Blog::orderBy('id','desc')->paginate(10);
      return view('public.blog',compact('categories','tags','blogs'));
    }

    public function contact(){
      $map_url=Siteinfo::where('name','map_url')->first();
      $message=Siteinfo::where('name','message')->first();
      return view('public.contact',compact('map_url','message'));
    }

    public function send(Request $request){
           $this->validate($request,[
             'name' => 'required',
             'email' => 'required|email',
             'subject' => 'required',
             'message' => 'required'
           ]);
           $data = array(
             'name' => $request->name,
             'email' => $request->email,
             'subject' => $request->subject,
             'message' => $request->message
           );
           Mail::to('avijitbiswas231@gmail.com')->send(new SendMail($data));
           return back()->with('success','Thanks for contacting us');
    }

    public function single_post($id){
      $categories=Category::orderBy('id','asc')->get();
      $tags=Tag::orderBy('id','asc')->get();
      $blogs=Blog::find($id);
      return view('public.single_post',compact('categories','tags','blogs'));
    }

    public function search(Request $request ){
      $categories=Category::orderBy('id','asc')->get();
      $tags=Tag::orderBy('id','asc')->get();
      $search=$request->search;
      $blogs=Blog::orWhere('title','like','%'.$search.'%')
                ->orWhere('details','like','%'.$search.'%')
                ->orderBy('id','asc')
                ->paginate(1);
      return view('public.search',compact('categories','tags','blogs','search'));
    }

    public function category($name){
        $categories=Category::orderBy('id','asc')->get();
        $tags=Tag::orderBy('id','asc')->get();
        $blogs=Blog::orderBy('id','desc')->whereHas("category", function($q) use($name){
   $q->where("category","=",$name);
})->paginate(1);
      return view('public.category',compact('categories','tags','blogs','name'));
    }
    public function tag($name){
      $categories=Category::orderBy('id','asc')->get();
      $tags=Tag::orderBy('id','asc')->get();
      $blogs=Blog::orderBy('id','desc')->whereHas("tag", function($q) use($name){
 $q->where("tag","=",$name);
})->paginate(1);
    return view('public.tag',compact('categories','tags','blogs','name'));
    }
}
