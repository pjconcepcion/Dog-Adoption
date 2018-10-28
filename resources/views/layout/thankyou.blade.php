<!doctype html>
<html lang="en">
    <head>
        <title>FURRYTAILS</title>
        <link rel="icon" href="image/paw.ico">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

        <link rel="stylesheet" href="../../customer/css/bootstrap.css">
        <link rel="stylesheet" href="../../customer/css/animate.css">
        <link rel="stylesheet" href="../../customer/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../customer/fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../../customer/fonts/fontawesome/css/font-awesome.min.css">
      
        {{-- <link rel="stylesheet" href="customer/fonts/flaticon/font/flaticon.css"> --}}

        <!-- Theme Style -->
        <link rel="stylesheet" href="../../customer/css/style.css">
    </head>
  
    <body>
        <div id="fb-root"></div>
        <script>
          //Facebook
          (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=1996791573701166&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
          
          //Twitter
            window.twttr = (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
              if (d.getElementById(id)) return t;
              js = d.createElement(s);
              js.id = id;
              js.src = "https://platform.twitter.com/widgets.js";
              fjs.parentNode.insertBefore(js, fjs);

              t._e = [];
              t.ready = function(f) {
                t._e.push(f);
              };

              return t;
            }(document, "script", "twitter-wjs"));
        </script>

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
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                
                </div>
            </div>
            </nav>
        </header>

<section class ="section">
    <span class = "d-block bg-dark fixed-top py-5" style = "z-index: -2;position: absolute; top:0;"> </span>  
    <div class = "container">
        <div class = "row mt-5">
            <div class="text-xs-center">
                <h1 class="display-3">Thank You!</h1>
                <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
                <hr>
                <p>
                    Redirecting you to Adopting page in <span id="timer"></span>
                </p>
                <p class="lead">
                    <a class="btn btn-primary btn-sm" href="/adopt" role="button">Continue to Adopting Page</a>
                </p>
            </div>
        </div>
    </div>
</section>
<footer class="site-footer" role="contentinfo">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-4 mb-5">
          <h3>About Furrytails</h3>
          <p class="mb-5">Furrytails is a website designed to help dogs in the impound to find a new forever home. Furrytails also aims to help pet owners in finding their lost pets.</p>
          <ul class="list-unstyled footer-link d-flex ">
            <li class="mr-3">
              <a class="twitter-share-button"
                href="https://twitter.com/intent/tweet?text=Adopt-a-Dog%20Now!"
                data-size="large"
                target="_blank">
                {{-- <span class="fa fa-twitter"></span> --}}
              </a>
            </li>
            <li class="mr-3">
              <div class="fb-share-button" data-href="https://dogadoption.herokuapp.com" data-layout="button" data-size="large" data-mobile-iframe="true">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                  {{-- <span class="fa fa-facebook"></span> --}}
                </a>
              </div>
            </li>
          </ul>
        </div>
        <div class="col-md-5 mb-5">
          <h3>Contact Info</h3>
          <ul class="list-unstyled footer-link">
            <li class="d-block">
              <span class="d-block">Address:</span>
              <span class="text-white">Mayor Gil Fernando Ave., Marikina City</span></li>
            <li class="d-block"><span class="d-block">Telephone:</span><span class="text-white">+63 929 477 8565</span></li>
            <li class="d-block"><span class="d-block">Email:</span><span class="text-white">furrytails@gmail.com</span></li>
          </ul>
        </div>
        <div class="col-md-3 mb-5">
          <h3>Quick Links</h3>
          <ul class="list-unstyled footer-link">
            <li><a href="/">Home</a></li>
            <li><a href="/adopt">Adopt-a-Dog</a></li>
            <li><a href="/missing">Missing</a></li>
            <li><a href="/contact">Contact</a></li>
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

  <script src="../../customer/js/jquery-3.2.1.min.js"></script>
  <script src="../../customer/js/popper.min.js"></script>
  <script src="../../customer/js/bootstrap.min.js"></script>
  <script src="../../customer/js/owl.carousel.min.js"></script>
  <script src="../../customer/js/jquery.waypoints.min.js"></script>
  <script src="../../customer/js/main.js"></script>
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
<script>
    window.addEventListener('load', function(){
        var ctr = 5;
        var timer = setInterval(function(){
            document.getElementById('timer').innerText = ctr;
            ctr -= 1;
            if(ctr==0){
                clearInterval(timer);
                window.location.href = "/adopt";
            }
        },1000);
    });
</script>