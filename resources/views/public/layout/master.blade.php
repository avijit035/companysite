<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company-HTML Bootstrap theme</title>

  <!-- Bootstrap -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
  <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
            <div class="navbar-brand">
              <a href="{{route('index')}}"><h1><span>Com</span>pany</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="{{route('index')}}" class="{{(request()->is('/')) ? 'active' : '' }}">Home</a></li>
                <li role="presentation"><a href="{{route('about')}}" class="{{(request()->is('about')) ? 'active' : '' }}">About Us</a></li>
                <li role="presentation"><a href="{{route('services')}}" class="{{(request()->is('services')) ? 'active' : '' }}">Services</a></li>
                <li role="presentation"><a href="{{route('portfolio')}}" class="{{(request()->is('portfolio')) ? 'active' : '' }}">Portfolio</a></li>
                <li role="presentation"><a href="{{route('blog')}}" class="{{(request()->is('blog')) ? 'active' : '' }}">Blog</a></li>
                <li role="presentation"><a href="{{route('contact')}}" class="{{(request()->is('contact')) ? 'active' : '' }}">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  @yield('content')

  <footer>
    <div class="footer">
      <div class="container">
        <div class="social-icon">
          <div class="col-md-4">
            <ul class="social-network">
              @foreach($footers as $footer)
              <li><a href="{{$footer->link}}" class="{{$footer->class}}" title="{{$footer->title}}"><i class="{{$footer->icon_class}}"></i></a></li>
              @endforeach

            </ul>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div class="copyright">
            &copy; Company Theme. All Rights Reserved.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></div>
          </div>
        </div>
      </div>

      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/functions.js"></script>

</body>

</html>
