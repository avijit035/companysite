@extends('public.layout.master')
@section('content')
<div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Blog / Tag '{{$name}}'</li>
      </div>
    </div>
  </div>

  <section id="blog" class="container">
    <div class="blog">
      <div class="row">
        <div class="col-md-8">
          @php $a=0; @endphp
           @foreach($blogs as $blog)
             @php ++$a; @endphp
          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                  <span id="publish_date">{{date('d M Y', strtotime($blog->date))}}</span>

                  <span><i class="fa fa-user"></i> <a href="#">{{$blog->author}}</a></span>
                  @foreach($blog->category as $c)
                   <span> <a href="#">{{$c->category}}</a></span>
                  @endforeach

                  @foreach($blog->tag as $t)
                   <span> <a href="#">{{$t->tag}}</a></span>
                  @endforeach

                </div>
              </div>

              <div class="col-xs-12 col-sm-10 blog-content">
                <a href="{{route('single_post',$blog->id)}}"><img class="img-responsive img-blog" src="{{asset('images/blog/'.$blog->image)}}" width="100%" alt="" /></a>
                <h4>{{$blog->title}}</h4>
                <p>{{Str::words($blog->details,20)}}</p>
                <a class="btn btn-primary readmore" href="{{route('single_post',$blog->id)}}">Read More <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
          </div>
          @endforeach
          @if($a==0)
          <div class="col-xs-12 col-sm-10 blog-content">

            <h4>Sorry Nothing Found .....</h4>

          </div>
          @endif

          <ul class="pagination pagination-lg">
            {{$blogs->links()}}
          </ul>
          <!--/.pagination-->
        </div>
        <!--/.col-md-8-->

        <aside class="col-md-4">
          <div class="widget search">
            <form role="form" method="get" action="{{route('search')}}">
              <input type="text" name="search" class="form-control search_box" autocomplete="off" placeholder="Search Here">
            </form>
          </div>
          <!--/.search-->




          <div class="widget categories">
            <h3>Categories</h3>
            <div class="row">
              <div class="col-sm-6">
                <ul class="blog_category">
                  @foreach($categories as $cat)
                     @php $c=0; @endphp
                    @foreach($cat->category as $category)
                    @php ++$c; @endphp
                    @endforeach
                   <li><a href="{{route('category',$cat->name)}}">{{$cat->name}} <span class="badge">{{$c}}</span></a></li>
                  @endforeach

                </ul>
              </div>
            </div>
          </div>
          <!--/.categories-->



          <div class="widget tags">
            <h3>Tag Cloud</h3>
            <ul class="tag-cloud">
              @foreach($tags as $tag)
              <li><a href="{{route('tag',$tag->name)}}" class="btn btn-xs btn-primary" href="#">{{$tag->name}}</a></li>
              @endforeach
            </ul>
          </div>
          <!--/.tags-->


        </aside>
      </div>
      <!--/.row-->
    </div>
  </section>
  <!--/#blog-->
  @endsection
