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
                        <li class="active">Approved Adoption Application</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Approved Adoption Application</strong>
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
                        @foreach($approvedApplications as $approvedApplication)
                        <tr>
                            <td>{{$approvedApplication -> strName}}</td>
                            <td>{{$approvedApplication -> strEmail}}</td>
                            <td>{{$approvedApplication -> strContact}}</td>
                            <td>
                                <button title="View" type="submit" class="btn btn-sm btn-outline-primary"
                                    data-toggle="modal" id="btnViewApplication"
                                    data-name="{{$approvedApplication -> strName}}"
                                    data-dogname="{{$approvedApplication -> strDogName}}"
                                    data-age="{{$approvedApplication -> intAge}}"
                                    data-address="{{$approvedApplication -> strAddress}}"
                                    data-contact="{{$approvedApplication -> strContact}}"
                                    data-email="{{$approvedApplication -> strEmail}}"
                                    data-nochildren="{{$approvedApplication -> intNoChildren}}"
                                    data-noadult="{{$approvedApplication -> intNoAdults}}"
                                    data-allergic={{$approvedApplication -> bitAllergic == 1 ? "Yes": "No"}}
                                    data-hadpet={{$approvedApplication -> bitHadPet == 1 ? "Yes": "No"}}
                                    data-nopets="{{$approvedApplication -> intNoPets}}"
                                    data-selectedpets="{{$approvedApplication -> strSelectedPets}}"
                                    @if($approvedApplication -> intPetSkills == 1)
                                        data-petskills="Beginner"
                                    @elseif($approvedApplication -> intPetSkills == 2)
                                        data-petskills="Intermediate"
                                    @elseif($approvedApplication -> intPetSkills == 3)
                                        data-petskills="Expert"
                                    @endif
                                    data-reason="{{$approvedApplication -> strReason}}"
                                    ><i class="fa fa-eye"></i>
                                </button>                                 
                                <button data-toggle="modal" id="btnApproveApplication" data-id="{{$approvedApplication -> intRequestID}}" data-dogid="{{$approvedApplication -> intDogID}}" data-email="{{$approvedApplication -> strEmail}}" title="Completed" type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-check-circle"></i> </button>  
                                <button data-toggle="modal" id="btnDeleteApplication" data-id="{{$approvedApplication -> intRequestID}}" title="Incomplete" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-times-circle"></i> </button>  
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>`

</div> <!-- .content -->
<!-- /#right-panel -->

<!-- Right Panel -->

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
            <h4 class="modal-title"></b><i class="fa fa-cross-o"></i> Complete Application</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you wish to finalize and approve this application?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminApprovedApplication/approve" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="approveApplicationID" name="applicationID">
                <input type="hidden" id="dogID" name="dogID">
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
        $('#dogID').val($(this).data('dogid'));
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
            <h4 class="modal-title"></b><i class="fa fa-times-circle-o"></i> Disapprove Application</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you really want to delete this application?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminApprovedApplication/disapprove" method="post">
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



@endsection