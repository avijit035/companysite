@extends('public.layout.master')

@section('content')
<div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Portfolio</li>
      </div>
    </div>
  </div>

  <section id="portfolio">
    <div class="container">
      <div class="center">
        <p>{{$portfolio_title->title}}</p>
      </div>

      <ul class="portfolio-filter text-center">
        <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>

        @foreach($project_types as $type)
        <li><a class="btn btn-default" href="#" data-filter=".ptype{{$type->id}}">{{$type->name}}</a></li>
        @endforeach
      </ul>
      <!--/#portfolio-filter-->
    </div>

    <div class="container">
      <div class="">
        <div class="portfolio-items">
          @foreach($projects as $p)
              @php $t=null;  @endphp

              @foreach($p->project_type as $ptype)
              @php $t=$t.' '.'ptype'.$ptype->project_type_id @endphp

             @endforeach

             <div class="portfolio-item {{$t}}  col-xs-12 col-sm-4 col-md-3">
               <div class="recent-work-wrap">
                 <img class="img-responsive" src="images/portfolio/recent/{{$p->image}}" alt="">
                 <div class="overlay">
                   <div class="recent-work-inner">
                     <h3><a href="{{$p->link}}" target="_blank">{{$p->title}}</a></h3>
                     <p>{{$p->details}}</p>
                     <a class="preview" href="images/portfolio/full/{{$p->image}}" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                   </div>
                 </div>
               </div>
             </div>

           @endforeach



        </div>
      </div>
    </div>
  </section>
  <!--/#portfolio-item-->

@endsection
