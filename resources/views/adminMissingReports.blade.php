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
                        <form autocomplete="off"class="search-form" enctype="multipart/form-data" action="/adminSearchedMissingReports" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input class="form-control" name="search" type="text" placeholder="Search ..." aria-label="Search">
                            <input class="form-control invisible" value="search" type="submit" >
                            <button class="search-close"><i class="fa fa-close"></i></button>
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
                        <li class="active">Missing Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Missing Reports</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Reported by</th>
                        <th scope="col">Contact No.</th>
                        <th scope="col">Dog Name</th>
                        <th scope="col">Date Reported</th>
                        <th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($missingReports as $missingReport)
                            <tr>
                                <td>{{$missingReport -> strReporterName}}</td> 
                                <td>{{$missingReport -> strReporterContactNo}}</td> 
                                <td>{{$missingReport -> strDogName}}</td> 
                                <td>{{$missingReport -> dtFiledMissing}}</td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"
                                            data-toggle="modal" id="btnViewMissingReport"
                                            data-id="{{$missingReport -> intMissingReportID}}"
                                            data-name="{{$missingReport -> strReporterName}}"
                                            data-email="{{$missingReport -> strReporterEmail}}"
                                            data-contact="{{$missingReport -> strReporterContactNo}}"
                                            data-dogname="{{$missingReport -> strDogName}}"
                                            data-dogdesc="{{$missingReport -> strDogDescription}}"
                                            data-notes="{{$missingReport -> strNotes}}"
                                            data-date="{{$missingReport -> dtFiledMissing}}"
                                            data-image="{{$missingReport -> imgDogMissing}}"
                                    ><i class="fa fa-eye"></i> </button> 
                                    
                                    @if($missingReport -> bitIsApproved == 0) 
                                        <button type="submit" class="btn btn-sm btn-outline-success"
                                            data-toggle="modal" id="btnApproveMissingReport"
                                            data-id="{{$missingReport -> intMissingReportID}}"
                                            data-name="{{$missingReport -> strReporterName}}"
                                            data-email="{{$missingReport -> strReporterEmail}}"
                                            data-dogname="{{$missingReport -> strDogName}}"
                                        ><i class="fa fa-check-circle-o"></i> </button> 
                                    @else
                                        <button disabled type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-circle-o"></i> </button>
                                    @endif
                                    
                                    <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="modal" id="btnDeleteMissingReport" data-id="{{$missingReport -> intMissingReportID}}"><i class="fa fa-trash"></i> </button>
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

{{-- View Report --}}
<div id="viewMissingReportModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-exclamation-circle"></i> View Missing Report</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body"> 
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewDateReported" class=" form-control-label">Date Reported</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewDateReported" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewReporterName" class=" form-control-label">Reported by</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewReporterName" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewReporterEmail" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewReporterEmail" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewReporterContact" class=" form-control-label">Contact No.</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewReporterContact" class="form-control" readonly>
                </div>
            </div>
            <hr>
            <center><img class="modal-content" style= "height: 300px; width: auto; border: 2px solid gray; padding: 2px;" id="missingDogImg"></center>
            <br>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewDogName" class=" form-control-label">Dog Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewDogName" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewDogDescription" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="viewDogDescription" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="viewNotes" class=" form-control-label">Notes</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea row="8"; id="viewNotes" class="form-control" readonly></textarea>
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
        $(document).on('click','#btnViewMissingReport', function(){
        $('#viewDateReported').val($(this).data('date'));
        $('#viewReporterName').val($(this).data('name'));
        $('#viewReporterContact').val($(this).data('contact'));
        $('#viewReporterEmail').val($(this).data('email'));
        $('#viewDogName').val($(this).data('dogname'));
        $('#viewDogDescription').val($(this).data('dogdesc'));
        $('#viewNotes').val($(this).data('notes'));
        
        var newSrc=$(this).data('image');
        $('#missingDogImg').attr('src',newSrc);

        $('#viewMissingReportModal').modal('show');
        });
    });
</script>
    
{{-- END --}}

{{-- DELETE Report --}}
<div id="deleteMissingReport" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-trash"></i> Confirm Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you really want to delete this report?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminMissingReports/deleteReport" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="deleteReportID" name="reportID">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#btnDeleteMissingReport',function(){
        $('#deleteReportID').val($(this).data('id'));

        $('#deleteMissingReport').modal('show');
        });
    });
</script>
        
{{-- END --}}

{{-- approve Report --}}
<div id="approveMissingReport" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-check-circle-o"></i> Approve Report</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you want to approve this missing report and post it on the main page?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminMissingReports/approveReport" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="reportID" name="reportID">
                <input type="hidden" id="name" name="name">
                <input type="hidden" id="email" name="email">
                <input type="hidden" id="dogname" name="dogname">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#btnApproveMissingReport',function(){
        $('#reportID').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#email').val($(this).data('email'));
        $('#dogname').val($(this).data('dogname'));

        $('#approveMissingReport').modal('show');
        });
    });
</script>
        
{{-- END --}}

@endsection