@extends('public.layout.master')

@section('content')
<div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Blog /  {{$blogs->title}}</li>
      </div>
    </div>
  </div>

  <section id="blog" class="container">
    <div class="blog">
      <div class="row">
        <div class="col-md-8">



          <div class="blog-item">
            <div class="row">
              <div class="col-xs-12 col-sm-2">
                <div class="entry-meta">
                  <span id="publish_date">{{date('d M Y', strtotime($blogs->date))}}</span>

                  <span><i class="fa fa-user"></i> <a href="#">{{$blogs->author}}</a></span>
                  @foreach($blogs->category as $c)
                   <span> <a href="#">{{$c->category}}</a></span>
                  @endforeach

                  @foreach($blogs->tag as $t)
                   <span> <a href="#">{{$t->tag}}</a></span>
                  @endforeach

                </div>
              </div>

              <div class="col-xs-12 col-sm-10 blog-content">
                <a href="{{route('single_post',$blogs->id)}}"><img class="img-responsive img-blog" src="{{asset('images/blog/'.$blogs->image)}}" width="100%" alt=""></a>
                <img class="img-responsive img-blog" src="" width="100%" alt="">
                <h4>{{$blogs->title}}</h4>
                <p>{{Str::words($blogs->details)}}</p>

              </div>
            </div>
          </div>



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
