<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function blog_categories()
    {
        return view('admin.blog_categories');
    }

    public function blog_tags()
    {
        return view('admin.blog_tags');
    }

    public function blogs()
    {
        return view('admin.blogs');
    }
}
