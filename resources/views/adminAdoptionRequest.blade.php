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
                        <form autocomplete="off"class="search-form" enctype="multipart/form-data" action="/adminSearchedApprovedApplication" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="form-control" name="search" type="text" placeholder="Search ..." aria-label="Search">
                            <input class="form-control invisible" value="search" type="submit" >
                            <button class="search-close"><i class="fa fa-close"></i></button>
                        </form>
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
                        <th scope="col">Applicant's Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($adoptionRequests as $adoptionRequest)
                        <tr>
                            <td>{{$adoptionRequest -> strName}}</td>
                            <td>{{$adoptionRequest -> strEmail}}</td>
                            <td>{{$adoptionRequest -> strContact}}</td>
                            <td>
                                <button title="View" type="submit" class="btn btn-sm btn-outline-primary"
                                    data-toggle="modal" id="btnViewApplication"
                                    data-name="{{$adoptionRequest -> strName}}"
                                    data-dogname="{{$adoptionRequest -> strDogName}}"
                                    data-age="{{$adoptionRequest -> intAge}}"
                                    data-address="{{$adoptionRequest -> strAddress}}"
                                    data-contact="{{$adoptionRequest -> strContact}}"
                                    data-email="{{$adoptionRequest -> strEmail}}"
                                    data-nochildren="{{$adoptionRequest -> intNoChildren}}"
                                    data-noadult="{{$adoptionRequest -> intNoAdults}}"
                                    data-allergic={{$adoptionRequest -> bitAllergic == 1 ? "Yes": "No"}}
                                    data-hadpet={{$adoptionRequest -> bitHadPet == 1 ? "Yes": "No"}}
                                    data-nopets="{{$adoptionRequest -> intNoPets}}"
                                    data-selectedpets="{{$adoptionRequest -> strSelectedPets}}"
                                    @if($adoptionRequest -> intPetSkills == 1)
                                        data-petskills="Beginner"
                                    @elseif($adoptionRequest -> intPetSkills == 2)
                                        data-petskills="Intermediate"
                                    @elseif($adoptionRequest -> intPetSkills == 3)
                                        data-petskills="Expert"
                                    @endif
                                    data-reason="{{$adoptionRequest -> strReason}}"
                                    ><i class="fa fa-eye"></i>
                                </button>  
                                @if( $adoptionRequest -> bitApproved == 0)
                                    <button data-toggle="modal" id="btnApproveApplication" data-id="{{$adoptionRequest -> intRequestID}}" data-email="{{$adoptionRequest -> strEmail}}" title="Approve" type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check-circle"></i> </button>  
                                @else
                                    <button disabled title="Approved" type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> </button>  
                                @endif
                                <button data-toggle="modal" id="btnDeleteApplication" data-id="{{$adoptionRequest -> intRequestID}}" title="Delete" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> </button>  
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

{{-- View Application --}}
<div id="viewApplication" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
            <!-- Modal content-->
        <div class="modal-content">
    
            <div class="modal-header">
                <h4 class="modal-title"></b><i class="fa fa-eye"></i> View Application</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
            </div>
    
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewDogName" class=" form-control-label">Desired Dog to Adopt</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewDogName" class="form-control" readonly>
                    </div>
                </div>
                <hr>
                <center><h4> Personal Information</h4></center>
                <br>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewName" class=" form-control-label">Applicant's Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewName" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewAge" class=" form-control-label">Age</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewAge" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewAddress" class=" form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewAddress" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewContact" class=" form-control-label">Contact No.</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewContact" class="form-control" readonly>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewEmail" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewEmail" class="form-control" readonly>
                    </div>
                </div>
                <br>
                <center><h4> Family and Household</h4></center>
                <br>
            
                <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="viewNoChildren" class=" form-control-label">No. of Children in the household</label>
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="text" id="viewNoChildren" class="form-control" readonly>
                    </div>

                    <div class="col col-md-4">
                        <label for="viewNoAdult" class=" form-control-label">No. of Adults in the household</label>
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="text" id="viewNoAdult" class="form-control" readonly>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col col-md-6">
                        <label for="viewAllergic" class=" form-control-label">Is anyone in the household allergic to dogs?</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="text" id="viewAllergic" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="viewHadPet" class=" form-control-label">Had owned a dog before?</label>
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="text" id="viewHadPet" class="form-control" readonly>
                    </div>

                    <div class="col col-md-4">
                        <label for="viewNoPets" class=" form-control-label">No. of pets currently?</label>
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="text" id="viewNoPets" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="viewSelectedPets" class=" form-control-label">Type of pets owned before?</label>
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="text" id="viewSelectedPets" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-4">
                        <label for="viewPetSkills" class=" form-control-label">Dog owning experience?</label>
                    </div>
                    <div class="col-12 col-md-8">
                        <input type="text" id="viewPetSkills" class="form-control" readonly>
                    </div>
                </div>

                <br>
                <center><h4>Reason</h4></center>
                <br>

                <div class="row form-group">
                    <div class="col-12 col-md-12">
                        <textarea rows="10" id="viewReason" class="form-control" readonly> </textarea>
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
        $(document).on('click','#btnViewApplication',function(){

        $('#viewDogName').val($(this).data('dogname'));
        $('#viewName').val($(this).data('name'));
        $('#viewAge').val($(this).data('age'));
        $('#viewAddress').val($(this).data('address'));
        $('#viewContact').val($(this).data('contact'));
        $('#viewEmail').val($(this).data('email'));
        
        $('#viewNoChildren').val($(this).data('nochildren'));
        $('#viewNoAdult').val($(this).data('noadult'));
        $('#viewAllergic').val($(this).data('allergic'));
        $('#viewHadPet').val($(this).data('hadpet'));
        $('#viewNoPets').val($(this).data('nopets'));
        $('#viewSelectedPets').val($(this).data('selectedpets'));
        $('#viewPetSkills').val($(this).data('petskills'));

        $('#viewReason').val($(this).data('reason'));

        $('#viewApplication').modal('show');
        });
    });
</script>
        
{{-- END --}}
    
{{-- Approve Application --}}
<div id="approveApplication" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-chsck-o"></i> Approve Application</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you wish to approve this application?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminAdoptionRequest/approveApplication" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="approveApplicationID" name="applicationID">
                <input type="hidden" id="approveEmail" name="email">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#btnApproveApplication',function(){
        $('#approveApplicationID').val($(this).data('id'));
        $('#approveEmail').val($(this).data('email'));

        $('#approveApplication').modal('show');
        });
    });
</script>

{{-- DELETE Application --}}
<div id="deleteApplication" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-trash"></i> Confirm Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you really want to delete this application?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminAdoptionRequest/deleteApplication" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="deleteApplicationID" name="applicationID">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#btnDeleteApplication',function(){
        $('#deleteApplicationID').val($(this).data('id'));

        $('#deleteApplication').modal('show');
        });
    });
</script>
        
{{-- END --}}

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