@extends('public.layout.master')
@section('content')
<div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>Contact</li>
      </div>
    </div>
  </div>

  <div class="map">
    <iframe src="{{$map_url->details}}" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

    
  </div>

  <section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>{{$message->title}}</h2>
        <p>{{$message->details}}</p>
      </div>
      <div class="row contact-wrap">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="col-md-6 col-md-offset-3">
          <div id="sendmessage">
            @if($message=Session::get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong></strong> {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
            @endif
          </div>
          <div id="errormessage">
           @if(count($errors)>0)
           @foreach($errors->all() as $error)
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Error!</strong> {{$error}}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
          @endforeach
           @endif
          </div>
          <form action="{{route('send')}}" method="post" role="form" class="contactForm">
            @csrf
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button></div>
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <!--/#contact-page-->
@endsection
