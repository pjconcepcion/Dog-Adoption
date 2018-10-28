<!doctype html>
<html lang="en">
    <head>
        <title>FURRYTAILS</title>
        <link rel="icon" href="image/paw.ico">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">

        <link rel="stylesheet" href="../customer/css/bootstrap.css">
        <link rel="stylesheet" href="../customer/css/animate.css">
        <link rel="stylesheet" href="../customer/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../customer/fonts/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="../customer/fonts/fontawesome/css/font-awesome.min.css">
      
        {{-- <link rel="stylesheet" href="../customer/fonts/flaticon/font/flaticon.css"> --}}

        <!-- Theme Style -->
        <link rel="stylesheet" href="../customer/css/style.css">
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

<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('customer/img/slider-1.jpg')}});">
        <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
                <div class="row justify-content-center mb-5 element-animate">
                    <div class="col-md-8 text-center">
                        <h1 class=" heading mb-4">File a Missing Report</h1>
                        <p class="mb-5 lead">Our heart breaks when a pet is seperated from its owner. Let us help by spreading the word of your missing pets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 order-2">
                <form enctype="multipart/form-data" method="post" action = "/missing/file/submit">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 contact-form-contact-info">
                        <p class = "d-flex"><span>Contact Information</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Contact No:</label>
                            <input type="text" id="contact" name="contact" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contact-form-contact-info">
                        <p class = "d-flex"><span>Pet Information:</span></p>
                        </div>
                    </div>
                    <div>    
                        <p>Upload a single photo of the dog</p>
                        <input type="file" name="petImg" id="gallery-photo-add" required="yes" accept="image/*">
                        <br><br>
                        <div id ="previewImg" class="gallery"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="petName" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Description:</label>
                            <input type="text" id="description" name="petDescription" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Note:</label>
                            <textarea id="message" name="petNote" class="form-control " cols="30" rows="8" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 order-2 mb-5">
                <div class="row justify-content-right">
                <div class="col-md-8 mx-auto contact-form-contact-info">
                    <p class="d-flex">
                    <span class="ion-ios-location icon mr-5"></span>
                    <span>Mayor Gil Fernando Ave., Marikina City</span>
                    </p>
        
                    <p class="d-flex">
                    <span class="ion-ios-telephone icon mr-5"></span>
                    <span>+63 929 477 8565</span>
                    </p>
        
                    <p class="d-flex">
                    <span class="ion-android-mail icon mr-5"></span>
                    <span>furrytails@gmail.com</span>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" tabindex="-1" role="dialog">
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

  <script src="../customer/js/jquery-3.2.1.min.js"></script>
  <script src="../customer/js/popper.min.js"></script>
  <script src="../customer/js/bootstrap.min.js"></script>
  <script src="../customer/js/owl.carousel.min.js"></script>
  <script src="../customer/js/jquery.waypoints.min.js"></script>
  <script src="../customer/js/main.js"></script>
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
  
<script src="../customer/js/jquery-3.2.1.min.js"></script>
<script>
    // $.ajax({
    //     url: "https://api.imgur.com/oauth2/authorize?client_id=bc0b038c2f990f3&response_type=token&state=",
    //     cache: false,
    //     success: function(html){
    //         $('#myModal').html(html);
    //     }
    // });
    // var accessToken;
    // var form = new FormData();
    // form.append("refresh_token", "70092291f3e9f5a3ba3ad11c0959fd3b033a8d9f");
    // form.append("client_id", "bc0b038c2f990f3");
    // form.append("client_secret", "373e9478d99f45ba3fa35b33f388f7aa70aeb291");
    // form.append("grant_type", "refresh_token");

    // var settings = {
    //     "async": true,
    //     "crossDomain": true,
    //     "url": "https://api.imgur.com/oauth2/token",
    //     "method": "POST",
    //     "headers": {},
    //     "processData": false,
    //     "contentType": false,
    //     "mimeType": "multipart/form-data",
    //     "data": form
    // }

    // $.ajax(settings).done(function (response) {
    //     var res = JSON.parse(response);
    //     accessToken = res.access_token;
    //     console.log(accessToken);
    //     $.ajax({
    //         url: "https://api.imgur.com/oauth2/token?client_id=",
    //         cache: false,
    //         success: function(html){
    //              console.log(html);
    //         }
    //     });
    // });

    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var file = input.files[0];
            var _validFileExtensions = ["jpeg","jpg","png"];    
            
            if(file.size < 10000000){
                var reader = new FileReader();
                reader.onload = function(event) {
                    var settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": "https://api.imgur.com/3/image",
                        "method": "GET",
                        "headers": {
                            "Authorization": "Client-ID bc0b038c2f990f3",
                            "Authorization": "Bearer " + accessToken,
                            "Content-Type": "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        },
                        "processData": false,
                        "contentType": false,
                        "mimeType": "multipart/form-data",
                        "data": {
                            image: event.target.result,
                            type: 'base64'
                        },
                    }

                    $.ajax(settings).done(function (response) {
                        console.log(response);
                    });

                    $($.parseHTML('<img class="thumbnail">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview)
                }
                reader.readAsDataURL(file);
            }else{
                alert('Image is too large')
            }
        }               
        };

        $('#gallery-photo-add').on('change', function() {
            resetImg();
            imagesPreview(this, 'div.gallery');
        });
    });

    function submit(){
        var form = new FormData();
        var imgSrc = document.getElementById('img').attr('src');
        form.append("image", imgSrc);

        var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.imgur.com/3/image",
            "method": "POST",
            "headers": {
                "Authorization": "Client-ID 4de1ab486c35daa"
        },
            "processData": false,
            "contentType": false,
            "mimeType": "multipart/form-data",
            "data": form
        }

        $.ajax(settings).done(function (response) {
            console.log(response);
        });
    }

    function resetImg() {
        document.getElementById("previewImg").innerHTML = "";
    }
</script>
</body>
</html>