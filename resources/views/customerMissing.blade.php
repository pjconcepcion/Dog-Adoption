@extends('layout.customerApp')

@section('content')

<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url('customer/img/slider-3.jpg');">
        <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
                <div class="row justify-content-center mb-5 element-animate">
                    <div class="col-md-8 text-center">
                        <h1 class=" heading mb-4">Missing Dog</h1>
                        <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                        <p><a href="/missing/file" class="btn btn-white btn-outline-white">File a missing report</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="section border-t">
        <div class="container">
            <div class = "row">
                <div class = "mx-auto element-animate">
                    {{$missingDogs -> links()}}
                </div>
            </div>
            <div class="row no-gutters">
                @foreach($missingDogs as $key => $missingDog)
                    @if($key%2==0)
                        <div class="half d-md-flex d-block">
                            <div class = "crop">
                                <img class="element-animate rounded img-thumbnail" src = {{$missingDog -> imgDogMissing}} />
                            </div>
                            <div class="px-4 py-1 element-animate">
                                <h2 class="mb-2">{{$missingDog -> strDogName}}</h2>
                                <div class="my-3">
                                    <h5> Description: </h5>
                                    <span>{{$missingDog -> strDogDescription}}</span>
                                </div>
                                <div class = "my-3">
                                    <h5>Note:</h5>
                                    <div class = "scroll">
                                        <span> {{$missingDog -> strNotes}} </span>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <h5> Contact: </h5>
                                    <span>{{$missingDog -> strReporterName}}</span>
                                    <br/>
                                    <span>via {{$missingDog -> strReporterEmail}}</span>
                                    <br/>
                                    <span>or call {{$missingDog -> strReporterContactNo}}</span>
                                </div>
                            </div>  
                        </div>
                    @else
                        <div class="half d-md-flex d-block">
                            <div class="px-4 py-1 element-animate text-right">
                                <h2 class="mb-2">{{$missingDog -> strDogName}}</h2>
                                <div class="my-3">
                                    <h5> Description: </h5>
                                    <span>{{$missingDog -> strDogDescription}}</span>
                                </div>
                                <div class = "my-3">
                                    <h5>Note:</h5>
                                    <div class = "scroll">
                                        <span> {{$missingDog -> strNotes}} </span>
                                    </div>
                                </div>
                                <div class="my-3">
                                    <h5> Contact: </h5>
                                    <span>{{$missingDog -> strReporterName}}</span>
                                    <br/>
                                    <span>via {{$missingDog -> strReporterEmail}}</span>
                                    <br/>
                                    <span>or call {{$missingDog -> strReporterContactNo}}</span>
                                </div>
                            </div>
                            <div class = "crop">
                                <img class="element-animate rounded img-thumbnail" src = {{$missingDog -> imgDogMissing}} />
                            </div>  
                        </div>
                    @endif
                @endforeach
            </div>
            <div class = "row">
                <div class = "Page py-5 mx-auto element-animate">
                    {{$missingDogs -> links()}}
                </div>
            </div>
        </div>
    </section>

    
@endsection