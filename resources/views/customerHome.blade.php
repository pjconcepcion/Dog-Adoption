@extends('layout.customerApp')

@section('content')

    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url('image/banner.png');">
            <div class="container">
                {{-- <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>We Love Pets</h1>   
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                        <p><a href="/adopt" class="btn btn-white btn-outline-white">Adopt-a-Dog</a></p>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="slider-item" style="background-image: url('customer/img/slider-1.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate">
                        <h1>We Love Pets</h1>   
                        <p class="mb-5">Don't shop, adopt! Save a life, help us give a dog a forever home. Adopt now.</p>
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
                        <p class="mb-5">Help us locate those dogs in need of a home. If you have seen a stray, contact us here. We'll take action and make sure to give those dogs a shelter.</p>
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
                    <p class="mb-5"></p>
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
                <p class="mb-5 lead">Our team believes that adopting is better than shopping for pets. </p>
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

<section class="section border-t" style="background-color:rgb(235, 235, 235)">
    <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
            <h2 class=" heading mb-4">Have you seen this dogs?</h2>
            <p class="mb-5 lead">It is an unfortunate thing to lose a pet.</p>
            </div>
        </div>
        <div class="col-md-8 text-center col-sm-12 element-animate mx-auto">
            <p><a href="/adopt" class="btn btn-block btn-outline-black">View Missing Dogs</a></p>
        </div>
    </div>
</section>

<section class="section border-t" >
    <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
            <h2 class=" heading mb-4">Help us find them</h2>
            <p class="mb-5 lead">It is an unfortunate thing to lose a pet.</p>
            </div>
        </div>
        <div class="col-md-8 text-center col-sm-12 element-animate mx-auto">
            <p><a href="/adopt" class="btn btn-block btn-outline-black">Contact Us</a></p>
        </div>
    </div>
</section>
@endsection