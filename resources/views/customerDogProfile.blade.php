@extends('layout.customerApp')

@section('content')
<section class="section">
    <span class = "d-block bg-dark fixed-top py-5" style = "z-index: -2;position: absolute; top:0;"> </span>  
    <div class = "container">
        <div class = "crop mx-auto">
            <img class="element-animate rounded" src = {{$dogLists -> imgDogPhoto}} />
        </div>
        <div class="text text-center py-4 element-animate">
            <h1>{{$dogLists -> strDogName}}</h1>
            <p class="mb-3 ">{{$dogLists -> strSex}}, {{$dogLists -> strAge}}</p>
            <div class = "mb-3">
                <h4>Description:</h4>
                <div class = "scroll mx-auto">
                    <span> {{$dogLists -> strDescription}} </span>
                </div>
            </div>
            <h4>Condition:</h4>
            <p class="mb-4">{{$dogLists -> strCondition}}</p>
        </div>
        <div class="row img-thumbnail">
            <div class="col-md-6 mb-5 my-4 order-2 mx-auto">
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
                        <div class="col-md-6 form-group mx-auto">
                        <input type="submit" value="Send Request" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection