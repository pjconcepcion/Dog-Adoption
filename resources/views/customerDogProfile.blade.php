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

<section class="section">
    <span class = "d-block bg-dark fixed-top py-5" style = "z-index: -2;position: absolute; top:0;"> </span>  
    <div class = "container">
        <div class="half d-md-flex d-block my-3">
            <div class = "crop">
                <img class="element-animate rounded img-thumbnail" src = '../{{$dogLists -> imgDogPhoto}}'/>
            </div>
            <div class="px-4 py-1 element-animate">
                <div class ="row">
                    <div class="mx-2">
                        <a class="twitter-share-button"
                            href="https://twitter.com/intent/tweet?text=Do%20you%20want%20adopt%20{{$dogLists -> strDogName}}%3F"
                            data-size="large">
                            Tweet
                        </a>
                    </div>
                    <div class="mr-2">
                        <div class="fb-share-button" data-href="http://127.0.0.1:8000/" data-layout="button" data-size="large" data-mobile-iframe="true">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                            <span class="fa fa-facebook"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <h2 class="mb-2">{{$dogLists -> strDogName}}</h2>
                <div class="my-0">
                    <span>{{$dogLists -> strAge}}, {{$dogLists -> strSex}}</span>
                </div>
                <div class = "my-2">
                    <h5>Description:</h5>
                    <div class = "scroll-200">
                        <span> {{$dogLists -> strDescription}}</span>
                    </div>
                </div>
                <div class="my-2">
                    <h5> Notes: </h5>
                    <span>{{$dogLists -> strCondition}}</span>
                    <br/>
                </div>
            </div>  
        </div>
        <div class="container py-5">
            <form enctype="multipart/form-data" autocomplete="off" method="post" action = "/adopt/{{$dogLists -> intDogID}}/submit">
                @csrf   
                <div class = "row">
                    <div class = "col-md-6 py-3">
                        <h5> Personal Information:</h5>
                        <div class = "row py-2">
                            <div class = "col-9">
                                <label> Full Name: </label>
                                <input type = "text" class = "form-control" required name="name"/>
                            </div> 
                            <div class = "col-3">
                                <label> Age: </label>
                                <input type = "number" class = "form-control" required name="age" pattern="[0-9]{2}" title="Invalid age"/>
                            </div>
                        </div>
                        <div class = "row py-2">
                            <div class = "col-xl">
                                <label> Address: </label>
                                <input type = "text" class = "form-control" required name="address"/>
                            </div>
                        </div>
                        <div class = "row py-2">
                            <div class = "col-xl">
                                <label> Contact: </label>
                                <input type = "text" placeholder="09*********" class = "form-control" required name="contactNo" pattern="[0-9]{11}" title="Incorrect contact number. Must have 11 characters only."/>
                            </div>
                        </div>
                        <div class = "row py-2">
                            <div class = "col-xl">
                                <label> Email Address: </label>
                                <input type = "email" class = "form-control" required name="emailAddress"/>
                            </div>
                        </div>
                        <div class = "row py-2">
                            <div class="col-xl">
                                <label> Rate your level of dog owning experience: </label>
                                <div class = "row px-2">
                                    <div class = "px-2">
                                        <input type="radio" id="radioBeginner" value = "1" name = "petSkills" required/>
                                        <label class="px-2" for="radioBeginner">Beginner</label>
                                    </div>
                                    <div class = "px-2">
                                        <input type="radio" id="radioIntermediate" value = "2" name = "petSkills" required/>
                                        <label class="px-2" for="radioIntermediate">Intermediate</label>
                                    </div>
                                    <div class = "px-2">
                                        <input type="radio" id="radioAdvance" value = "3" name = "petSkills" required/>
                                        <label class="px-2" for="radioAdvance">Advance</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-6 py-3 px-3">
                        <h5> Family and Housing:</h5>
                        <div class = "row py-2">
                            <div class = "col-3">
                                <label> No. of children: </label>
                                <input type = "number" class = "form-control" required name="noChildren" pattern="[0-9]{1,2}" title="I think it's impossible to have a hundred children."/>
                            </div>
                            <div class = "col-3">
                                <label> No. of Adults: </label>
                                <input type = "number" class = "form-control" required name="noAdults" pattern="[0-9]{1,2}" title="Is it possible that there are a hundred of adults in there?"/>
                            </div>
                            <div class = "col-5">
                                <label> Is someone in your household allergic to dog? </label>
                                <div class="py-2 px-2 row">
                                    <div class = "px-2">
                                        <input type="radio" id="radioIsAllergicYes" value = "1" name = "isAllergic" required/>
                                        <label class="px-2" for="radioIsAllergicYes">Yes</label>
                                    </div>
                                    <div class = "px-2">
                                        <input type="radio" id="radioIsAllergicNo" value = "0" name = "isAllergic" required/>
                                        <label class="px-2" for="radioIsAllergicNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5> Other Pets: </h5>
                        <div class = "row">
                            <div class = "col-sm-6">
                                <label> Have you owned a dog in the past? </label>
                                <div class="px-2 row">
                                    <div class = "px-2">
                                        <input type="radio" id="radioHadPetYes" value="1" name = "isHadPet" required/>
                                        <label class="px-2" for="radioHadPetYes">Yes</label>
                                    </div>
                                    <div class = "px-2">
                                        <input type="radio" id="radioHadPetNo" value="0" name = "isHadPet" required/>
                                        <label class="px-2" for="radioHadPetNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-sm-4">
                                <label> No. of pet/s (present):</label>
                                <input type = "text" class = "form-control" required name="noPets" pattern="[0-9]{1,2}"/>
                            </div>
                        </div>
                        <div class = "no-gutters py-2">
                            <div class = "col-xl-6">
                                <label> What pet/s have you already owned?</label>   
                                <div class = "scroll-150">
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Dog" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Dog </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxCat" value = "Cat" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxCat"> Cat </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxBird" value = "Bird" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxBird"> Bird </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxSnake" value = "Snake" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxSnake"> Snake </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxLizard" value = "Lizard" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxLizard"> Lizard </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxRabbit" value = "Rabbit" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxRabbit"> Rabbit </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxFish" value = "Fish" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxFish"> Fish </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-xl">
                        <h5> Why do you want to adopt a dog?</h5>
                        <textarea id="message" name="reason" class="form-control" cols="30" rows="8" required placeholder="Enter your reason..."></textarea>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-xl my-4">
                        <h5> Terms & Condition</h5>
                        <div class = "scroll-x">
                            <p> Terms and Conditions for Company Name
                                Introduction
                                These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Webiste Name accessible at Website.com.
                                
                                These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.
                                
                                Minors or people below 18 years old are not allowed to use this Website.
                                
                                Intellectual Property Rights
                                Other than the content you own, under these Terms, Company Name and/or its licensors own all the intellectual property rights and materials contained in this Website.
                                
                                You are granted limited license only for purposes of viewing the material contained on this Website.
                                
                                Restrictions
                                You are specifically restricted from all of the following:
                                
                                publishing any Website material in any other media;
                                selling, sublicensing and/or otherwise commercializing any Website material;
                                publicly performing and/or showing any Website material;
                                using this Website in any way that is or may be damaging to this Website;
                                using this Website in any way that impacts user access to this Website;
                                using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;
                                engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;
                                using this Website to engage in any advertising or marketing.
                                Certain areas of this Website are restricted from being access by you and Company Name may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.
                                
                                Your Content
                                In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Company Name a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                                
                                Your Content must be your own and must not be invading any third-party's rights. Company Name reserves the right to remove any of Your Content from this Website at any time without notice.
                                
                                No warranties
                                This Website is provided “as is,” with all faults, and Company Name express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.
                                
                                Limitation of liability
                                In no event shall Company Name, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Company Name, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                                
                                Indemnification
                                You hereby indemnify to the fullest extent Company Name from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.
                                
                                Severability
                                If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.
                                
                                Variation of Terms
                                Company Name is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.
                                
                                Assignment
                                The Company Name is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                                
                                Entire Agreement
                                These Terms constitute the entire agreement between Company Name and you in relation to your use of this Website, and supersede all prior agreements and understandings.
                                
                                Governing Law & Jurisdiction
                                These Terms will be governed by and interpreted in accordance with the laws of the State of Country, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Country for the resolution of any disputes.
                            </p>
                        </div>                        
                    </div>
                </div>
                <div class = "row no-gutters px-2">
                    <input class="mt-2" type="checkbox" id="chkTermsCondition" name = "termsCondition" required/>
                    <label class="px-2" for="chkTermsCondition"> I have agreed in the terms & condition. </label>
                </div>
                <div class = "row">
                    <div class = "mx-auto py-3">
                        <input type="submit" value="Submit Request" class="btn btn-primary">
                    </div>
                </div>
            </form>
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
</body>
</html>