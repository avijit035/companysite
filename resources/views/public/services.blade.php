@extends('public.layout.master')

@section('content')
<div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Services</li>
      </div>
    </div>
  </div>

  <div class="services">
    <div class="container">
      <h3>Company Services</h3>
      <hr>
      <div class="col-md-6">
        <img src="images/{{$services_left->image}}" class="img-responsive">
        <p>{{$services_left->details}}</p>
      </div>

      <div class="col-md-6">
        <div class="media">
          <ul>
            @foreach($services_1 as $service)
            <li>
              <div class="media-left">
                <i class="{{$service->icon_class}}"></i>
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{$service->name}}</h4>
                <p>{{$service->details}}</p>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="sub-services">
    <div class="container">
      <div class="col-md-6">
        <div class="media">
          <ul>
            @foreach($services_2 as $service)
            <li>
              <div class="media-left">
                <i class="{{$service->icon_class}}"></i>
              </div>
              <div class="media-body">
                <h4 class="media-heading">{{$service->name}}</h4>
                <p>{{$service->details}}</p>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>

      <div class="col-md-6">
        <img src="images/{{$services_right->image}}" class="img-responsive">
        <p>{{$services_right->details}}</p>
      </div>
    </div>
  </div>
@endsection
