@extends('layout.customerApp')

@section('content')

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url('customer/img/slider-1.jpg');">
        
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>We Love Pets</h1>   
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                        <p><a href="/adopt" class="btn btn-white btn-outline-white">Adopt-a-Dog</a></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="slider-item" style="background-image: url('customer/img/slider-2.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>Help us find them!</h1>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                        <p><a href="/contact" class="btn btn-white btn-outline-white">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url('customer/img/slider-3.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                <div class="col-md-8 text-center col-sm-12 element-animate">
                    <h1>Let us help!</h1>
                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                    <p><a href="/missing/file" class="btn btn-white btn-outline-white">File a missing report</a></p>
                </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END slider -->
    <section class="section border-t">
        <div class="container">
            <div class="row justify-content-center mb-5 element-animate">
                <div class="col-md-8 text-center">
                <h2 class=" heading mb-4">Adopt-a-Dog</h2>
                <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                </div>
            </div>

            <div class="row no-gutters">
                @foreach($dogLists as $dogList)
                <div class="col-md-4 element-animate">
                    <a href="/adopt/{{$dogList -> intDogID}}" class="link-thumbnail">
                        <h3>{{$dogList -> strSex}}, {{$dogList -> strAge}}</h3>
                        <span class=" icon">{{$dogList -> strDogName}}</span>
                        <div class = "crop">
                            <img src="{{$dogList -> imgDogPhoto}}" alt="Image placeholder" class="img-fluid">
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-md-8 text-center col-sm-12 element-animate mx-auto">
                <br/>
                <br/>
                <p><a href="/adopt" class="btn btn-block btn-outline-black">Adopt-a-Dog</a></p>
            </div>
        </div>
    </section>
        <!-- END section -->
    

    <section class="section element-animate">
        <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-4"></div>
            <div class="col-md-8 section-heading">
            <h2>It's a Dog Life</h2>
            <p class="small-sub-heading">Curious story of Dogs</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
            <img src="customer/img/dog_1.jpg" alt="Image placeholder" class="img-fluid">
            </div>
            <div class="col-md-4">
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            </div>
            <div class="col-md-4">
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
            <p><a href="#">Learn More <span class="ion-ios-arrow-right"></span></a></p>
            </div>
        </div>
        </div>
    </section>

    <section class="section blog">
        <div class="container">

        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
            <h2 class=" heading mb-4">Recent Blog Post</h2>
            <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

            <div class="media mb-4 d-md-flex d-block element-animate">
                <a href="#" class="mr-5"><img src="customer/img/blog_1.jpg" alt="Placeholder image" class="img-fluid"></a>
                <div class="media-body">
                <span class="post-meta">Feb 26th, 2018</span>
                <h3 class="mt-2 text-black"><a href="#">How to Train Your Dog</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam minus ipsa earum nemo consectetur cupiditate necessitatibus suscipit assumenda perspiciatis provident.</p>
                <p><a href="#" class="btn btn-primary btn-sm">Read more</a></p>
                </div>
            </div>



            </div>
            <div class="col-md-6">
            <div class="media mb-4 d-md-flex d-block element-animate">
                <a href="#" class="mr-5"><img src="customer/img/blog_2.jpg" alt="Placeholder image" class="img-fluid"></a>
                <div class="media-body">
                <span class="post-meta">Feb 26th, 2018</span>
                <h3 class="mt-2 text-black"><a href="#">Find The Right Food For Your Dogs</a></h3>
                <p><a href="#" class="btn btn-primary btn-sm">Read more</a></p>
                </div>
            </div>

            <div class="media mb-4 d-md-flex d-block element-animate">
                <a href="#" class="mr-5"><img src="customer/img/blog_3.jpg" alt="Placeholder image" class="img-fluid"></a>
                <div class="media-body">
                <span class="post-meta">Feb 26th, 2018</span>
                <h3 class="mt-2 text-black"><a href="#">Dog's Affections To Owner</a></h3>
                <p><a href="#" class="btn btn-primary btn-sm">Read more</a></p>
                </div>
            </div>

            </div>
        </div>
        </div>
    </section>

@endsection