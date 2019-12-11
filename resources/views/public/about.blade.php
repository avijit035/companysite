@extends('public.layout.master')

@section('content')
<div id="breadcrumb">
   <div class="container">
     <div class="breadcrumb">
       <li><a href="index.html">Home</a></li>
       <li>About Us</li>
     </div>
   </div>
 </div>

 <div class="aboutus">
   <div class="container">
     <h3>Our company information</h3>
     <hr>
     <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
       <img src="images/{{$about->image}}" class="img-responsive">
       <h4>{{$about->title}}</h4>
       <p>{{$about->details}}</p>
     </div>
     <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
       <div class="skill">
         <h2>{{$skill_info->title}}</h2>
         <p>{{$skill_info->details}}</p>
        @foreach($skills as $skill)
         <div class="progress-wrap">
           <h4>{{$skill->name}}</h4>
           <div class="progress">
             <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: {{$skill->percent}}%">
               <span class="bar-width">{{$skill->percent}}%</span>
             </div>

           </div>
         </div>
         @endforeach

       </div>
     </div>
   </div>
 </div>

 <div class="our-team">
   <div class="container">
     <h3>Our Team</h3>
     <div class="text-center">
       @foreach($teams as $team)
       <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
         <img src="images/services/{{$team->image}}" alt="" style="height:300px;width:300px;">
         <h4>{{$team->name}}</h4>
         <p>{{$team->details}}</p>
       </div>
       @endforeach
     </div>
   </div>
 </div>
@endsection
