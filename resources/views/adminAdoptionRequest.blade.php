@extends('layout.adminApp')
 
@section('content')

<!-- Right Panel -->

<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                    <div class="dropdown for-notification">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="count bg-danger">10</span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="notification">
                        <p class="red">You have 10 Notification</p>
                        <a class="dropdown-item media bg-flat-color-1" href="#">
                            <i class="fa fa-minus"></i>
                            <p>Server #1 overloaded.</p>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Maintenance</h1>
                </div>
            </div>
            </div>
            <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Maintenance</li>
                        <li class="active">Adoption Application</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Adoption Application</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Applied</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($adoptionRequests as $adoptionRequest)
                        <tr>
                            <td>{{$adoptionRequest -> strName}}</td>
                            <td>{{$adoptionRequest -> strContact}}</td>
                            <td>{{$adoptionRequest -> strAddress}}</td>
                            <td>{{$adoptionRequest -> dtDateRequested}}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary"
                                        data-toggle="modal" id="btnViewAdoptionRequest"
                                        data-name="{{$adoptionRequest -> strName}}"
                                        data-dogname="{{$adoptionRequest -> strDogName}}"
                                        data-age="{{$adoptionRequest -> intAge}}"
                                        data-email="{{$adoptionRequest -> strEmail}}"
                                        data-address="{{$adoptionRequest -> strAddress}}"
                                        data-contact="{{$adoptionRequest -> strContact}}"
                                        data-childno="{{$adoptionRequest -> intNoChildren}}"
                                        data-adultno="{{$adoptionRequest -> intNoAdults}}"
                                        data-isallergic= "{{$adoptionRequest -> bitAllergic == 0? 'No' : 'Yes'}}"
                                        data-hadpet= "{{$adoptionRequest -> bitHadPet == 0? 'No' : 'Yes'}}"
                                        data-petno="{{$adoptionRequest -> intNoPets}}"
                                        data-selectedpets="{{$adoptionRequest -> strSelectedPets}}"
                                        @if($adoptionRequest -> intPetSkills == 1)
                                            data-petskill="Beginner"
                                        @elseif($adoptionRequest -> intPetSkills == 2)
                                            data-petskill="Intermediate"
                                        @else
                                            data-petskill="Advance"
                                        @endif
                                        data-reason="{{$adoptionRequest -> strReason}}"
                                        data-date="{{$adoptionRequest -> dtDateRequested}}"
                                ><i class="fa fa-eye"></i> </button> 
                                <button type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-reply"></i></button>
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-ban"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>

</div> <!-- .content -->
<!-- /#right-panel -->
<!-- Right Panel -->

{{-- View Adoption Request --}}
<div id="viewAdoptionRequest" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-file"></i>&nbsp View Application</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="date" class=" form-control-label">Date Applied</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="date" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogname" class=" form-control-label">Desired Dog</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dogname" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-12">
                    <br>
                    <center><h5>Personal Information</h5></center>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="name" class=" form-control-label">Applicant's Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="name" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="age" class=" form-control-label">Age</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="age" class="form-control" readonly>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="address" class=" form-control-label"> Address</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="address" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="contact" class=" form-control-label">Contact No.</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="contact" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="email" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-12">
                    <br>
                    <center><h5>Family and Housing Information</h5></center>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="childno" class=" form-control-label">No. of Children</label>
                </div>
                <div class="col-12 col-md-3">
                    <input type="text" id="childno" class="form-control" readonly>
                </div>
                <div class="col col-md-3">
                    <label for="adultno" class=" form-control-label">No. of Adults</label>
                </div>
                <div class="col-12 col-md-3">
                    <input type="text" id="adultno" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="isallergic" class=" form-control-label">Are there anyone in your hosehold allergic to dogs?</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="isallergic" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="hadpet" class=" form-control-label">Have you had other pets before?</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="hadpet" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="petno" class=" form-control-label">Number of pets in your current household</label>
                    </div>
                    <div class="col-12 col-md-1">
                        <input type="text" id="petno" class="form-control" readonly>
                    </div>
                    <div class="col col-md-3">
                        <label for="selectedpets" class=" form-control-label">Which pet/s have you already owned?</label>
                    </div>
                    <div class="col-12 col-md-5">
                        <input type="text" id="selectedpets" class="form-control" readonly>
                    </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-6">
                    <label for="petskill" class=" form-control-label">Rate of the level of dog owning experience</label>
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="petskill" class="form-control" readonly>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-12">
                    <br>
                    <center><h5>Reason for Applying</h5></center>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12 col-md-12">
                    <textarea rows="8" id="reason" class="form-control" readonly></textarea>
                </div>
            </div>

        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#btnViewAdoptionRequest',function(){
        $('#name').val($(this).data('name'));
        $('#dogname').val($(this).data('dogname'));
        $('#age').val($(this).data('age'));
        $('#email').val($(this).data('email'));
        $('#address').val($(this).data('address'));
        $('#contact').val($(this).data('contact'));
        $('#childno').val($(this).data('childno'));
        $('#adultno').val($(this).data('adultno'));
        $('#isallergic').val($(this).data('isallergic'));
        $('#hadpet').val($(this).data('hadpet'));
        $('#petno').val($(this).data('petno'));
        $('#selectedpets').val($(this).data('selectedpets'));
        $('#petskill').val($(this).data('petskill'));
        $('#reason').val($(this).data('reason'));
        $('#date').val($(this).data('date'));

        $('#viewAdoptionRequest').modal('show');
        });
    });
</script>
        
{{-- END --}}

@endsection