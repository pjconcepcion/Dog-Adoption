@extends('layout.customerApp')

@section('content')
<section class="section">
    <span class = "d-block bg-dark fixed-top py-5" style = "z-index: -2;position: absolute; top:0;"> </span>  
    <div class = "container">
        <div class="half d-md-flex d-block my-3">
            <div class = "crop">
                <img class="element-animate rounded img-thumbnail" src = {{$dogLists -> imgDogPhoto}} />
            </div>
            <div class="px-4 py-1 element-animate">
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
                                <input type = "text" class = "form-control" required name="age" pattern="[0-9]{2}" title="Invalid age"/>
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
                                <input type = "text" class = "form-control" required name="noChildren" pattern="[0-9]{1,2}" title="I think it's impossible to have a hundred children."/>
                            </div>
                            <div class = "col-3">
                                <label> No. of Adults: </label>
                                <input type = "text" class = "form-control" required name="noAdults" pattern="[0-9]{1,2}" title="Is it possible that there are a hundred of adults in there?"/>
                            </div>
                            <div class = "col-5">
                                <label> Is someone allergic to dog? </label>
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
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Cat" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Cat </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Bird" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Bird </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Snake" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Snake </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Lizard" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Lizard </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Tiger/Lion" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Tiger/Lion </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Rabbit" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Rabbit </label>
                                    </div>
                                    <div class = "row no-gutters px-2">
                                        <input class="mt-2" type="checkbox" id="chkBoxDog" value = "Fish" name = "petOwned[]"/>
                                        <label class="px-2" for="chkBoxDog"> Fish </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class = "row">
                    <div class = "col-xl py-3">
                        <h5> Why do you want to adopt a dog?</h5>
                        <textarea id="message" name="reason" class="form-control" cols="30" rows="8" required placeholder="Enter your reason..."></textarea>
                    </div>
                </div>
                <div class = "row">
                    <div class = "mx-auto">
                        <input type="submit" value="Submit Request" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection