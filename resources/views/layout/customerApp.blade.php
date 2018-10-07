<!doctype html>
<html lang="en">
    <head>
        <title>Dog Adoption</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

        <link rel="stylesheet" href={{asset("customer/css/bootstrap.css")}}>
        <link rel="stylesheet" href={{asset("customer/css/animate.css")}}>
        <link rel="stylesheet" href={{asset("customer/css/owl.carousel.min.css")}}>

        <link rel="stylesheet" href={{asset("customer/fonts/ionicons/css/ionicons.min.css")}}>
        <link rel="stylesheet" href={{asset("customer/fonts/fontawesome/css/font-awesome.min.css")}}>
      
        {{-- <link rel="stylesheet" href={{asset("customer/fonts/flaticon/font/flaticon.css")}}> --}}

        <!-- Theme Style -->
        <link rel="stylesheet" href={{asset("customer/css/style.css")}}>
    </head>
  
    <body>
        <header role="banner">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand absolute" href="/">Furrytails</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav mx-auto pl-lg-5 pl-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/adopt">Adopt-a-Dog</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="services.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Breed</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="#">German Shepherd</a>
                            <a class="dropdown-item" href="#">Labrador</a>
                            <a class="dropdown-item" href="#">Rottweiler</a>
                        </div>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/missing">Missing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                
                </div>
            </div>
            </nav>
        </header>
        <!-- END header -->

@yield('content')

    <footer class="site-footer" role="contentinfo">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 mb-5">
            <h3>About The Breed</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
            <ul class="list-unstyled footer-link d-flex footer-social">
              <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
            </ul>

          </div>
          <div class="col-md-5 mb-5">
            <h3>Contact Info</h3>
            <ul class="list-unstyled footer-link">
              <li class="d-block">
                <span class="d-block">Address:</span>
                <span class="text-white">34 Street Name, City Name Here, United States</span></li>
              <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+1 242 4942 290</span></li>
              <li class="d-block"><span class="d-block">Email:</span><span class="text-white">info@yourdomain.com</span></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5">
            <h3>Quick Links</h3>
            <ul class="list-unstyled footer-link">
              <li><a href="#">About</a></li>
              <li><a href="#">Terms of Use</a></li>
              <li><a href="#">Disclaimers</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-3">
          
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src={{asset("customer/js/jquery-3.2.1.min.js")}}></script>
    <script src={{asset("customer/js/popper.min.js")}}></script>
    <script src={{asset("customer/js/bootstrap.min.js")}}></script>
    <script src={{asset("customer/js/owl.carousel.min.js")}}></script>
    <script src={{asset("customer/js/jquery.waypoints.min.js")}}></script>
    <script src={{asset("customer/js/main.js")}}></script>
    <script> 
      var url = window.location.href;
      var route = url.split('/');
      var navItem = document.getElementsByClassName('nav-link');
      for(var ctr=0;ctr<navItem.length;ctr++){

        if(navItem[ctr].classList.contains('active')){
          navItem[ctr].classList.remove('active');
        }
         
        if(navItem[ctr].innerText.toLowerCase() == route[3]){
          navItem[ctr].classList.add("active");
          break;
        }
        else if(route[3].search(navItem[ctr].innerText.toLowerCase()) > -1){
          navItem[ctr].classList.add("active");
          break;
        }
        else if(navItem[ctr].innerText.toLowerCase() == 'adopt-a-dog' && route[3] == 'adopt'){
          navItem[ctr].classList.add("active");
          break;  
        }
        else if(route[3] == ''){
          navItem[ctr].classList.add("active");
          break;
        }
      }
    </script>
  </body>
</html>
