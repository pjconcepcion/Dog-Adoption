@extends('layout.customerApp')

@section('content')

<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url('customer/img/slider-2.jpg');">
        <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
                <div class="row justify-content-center mb-5 element-animate">
                    <div class="col-md-8 text-center">
                    <h1 class=" heading mb-4">Adopt-a-Dog</h1>
                    <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<section class="section border-t">
    <div class="container">
        <div class="row no-gutters">
            @foreach($dogLists as $dogList)
                <div class="col-md-4 mx-1 my-1 element-animate ">
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
        <div class = "row">
            <div class = "Page py-5 mx-auto element-animate">
                {{$dogLists -> links()}}
            </div>
        </div>
    </div>
</section>
    
@endsection