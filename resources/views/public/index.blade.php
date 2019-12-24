@extends('public.layout.master')
@section('content')
<!--
<section id="main-slider" class="no-margin">
   <div class="carousel slide">
     <div class="carousel-inner">
       <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
         <div class="container">
           <div class="row slide-margin">
             <div class="col-sm-6">
               <div class="carousel-content">
                 <h2 class="animation animated-item-1">Welcome <span>Company</span></h2>
                 <p class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</p>
                 <a class="btn-slide animation animated-item-3" href="#">Read More</a>
               </div>
             </div>

             <div class="col-sm-6 hidden-xs animation animated-item-4">
               <div class="slider-img">
                 <img src="images/slider/businessman.png" class="img-responsive">
               </div>
             </div>

           </div>
         </div>
       </div>

     </div>

   </div>

 </section>
-->
 <!--/#main-slider-->

 <div class="feature">
   <div class="container">
     <div class="text-center">
       @foreach($features as $feature)
       <div class="col-md-3">
         <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
           <i class="{{$feature->icon_class}}"></i>
           <h2>{{$feature->title}}</h2>
           <p>{{$feature->details}}</p>
         </div>
       </div>
       @endforeach



     </div>
   </div>
 </div>

 <div class="about">
   <div class="container">
     <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
       <h2>About Us</h2>
       <img src="images/{{$about_us->image}}" class="img-responsive" />

     </div>

     <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
       <h2>{{$about_us->title}}</h2>
       <p>{{$about_us->details}}
         </p>

     </div>
   </div>
 </div>



 <section id="partner">
   <div class="container">
     <div class="center wow fadeInDown">
       <h2>{{$partners_data->title}}</h2>
       <p>{{$partners_data->details}}</p>
     </div>

     <div class="partners">
       <ul>
         @foreach($partners as $partner)
         <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms"  src="images/partners/{{$partner->image}}" ></a></li>
         @endforeach

       </ul>
     </div>
   </div>
   <!--/.container-->
 </section>
 <!--/#partner-->

 <section id="conatcat-info">
   <div class="container">
     <div class="row">
       <div class="col-sm-8">
         <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
           <div class="pull-left">
             <i class="fa fa-phone"></i>
           </div>
           <div class="media-body">
             <h2>{{$ask->title}}</h2>
             <p>{{$ask->details}}</p>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!--/.container-->
 </section>
 <!--/#conatcat-info-->

@endsection
