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
                    <h1>Messages</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Messages</li>
                        <li class="active">Stray Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Stray Reports</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Reported by</th>
                        <th scope="col">Location Seen</th>
                        <th scope="col">Stray Description</th>
                        <th scope="col">Date Reported</th>
                        <th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($strayReports as $strayReport)
                        <tr>
                            <td>{{$strayReport -> strReporterName}}</td>
                            <td>{{$strayReport -> strStreetName}}, {{$strayReport -> strBarangay}}, {{$strayReport -> strCity}}</td>
                            <td>{{$strayReport -> strDogDescription}}</td>
                            <td>{{$strayReport -> dtReportDate}}</td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-outline-primary"
                                    data-toggle="modal" id="btnViewReportModal"
                                    data-name="{{$strayReport -> strReporterName}}"
                                    data-email="{{$strayReport -> strReporterEmail}}"
                                    data-address="{{$strayReport -> strStreetName}}, {{$strayReport -> strBarangay}}, {{$strayReport -> strCity}}"
                                    data-dog="{{$strayReport -> strDogDescription}}"
                                    data-note="{{$strayReport -> strNotes}}"
                                    data-date="{{$strayReport -> dtReportDate}}"
                                ><i class="fa fa-eye"></i> </button>
                                @if($strayReport -> bitResponded == 0)
                                    <button type="submit" class="btn btn-sm btn-outline-success"
                                        data-toggle="modal" id="btnReplyReportModal"
                                        data-id="{{$strayReport -> intStrayReportID}}"
                                        data-name="{{$strayReport -> strReporterName}}"
                                        data-address="{{$strayReport -> strStreetName}}, {{$strayReport -> strBarangay}}, {{$strayReport -> strCity}}"
                                        data-email="{{$strayReport -> strReporterEmail}}"
                                        data-date="{{$strayReport -> dtReportDate}}"
                                    ><i class="fa fa-reply"></i> </button>
                                @else
                                    <button disabled type="submit" class="btn btn-sm btn-success"><i class="fa fa-reply"></i> </button>    
                                @endif
                                <button data-toggle="modal" id="btnDeleteReportModal" data-id="{{$strayReport -> intStrayReportID}}" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> </button>
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
    <div id="viewReportModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content">
    
            <div class="modal-header">
                <h4 class="modal-title"></b><i class="fa fa-envelope"></i> View Stray Report</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
            </div>
    
            <div class="modal-body"> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewReportedDate" class=" form-control-label">Date Reported</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewReportedDate" class="form-control" readonly>
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
                        <label for="viewLocation" class=" form-control-label">Location of Stray Seen</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewLocation" class="form-control" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewStrayDescription" class=" form-control-label">Stray Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="viewStrayDescription" class="form-control" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="viewNotes" class=" form-control-label">Notes</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea rows="6" id="viewNotes" class="form-control" readonly></textarea>
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
           $(document).on('click','#btnViewReportModal',function(){
            $('#viewReporterName').val($(this).data('name'));
            $('#viewReportedDate').val($(this).data('date'));
            $('#viewLocation').val($(this).data('address'));
            $('#viewStrayDescription').val($(this).data('dog'));
            $('#viewNotes').val($(this).data('note'));
    
            $('#viewReportModal').modal('show');
           });
        });
    </script>
    
{{-- END --}}

{{-- Reply Report --}}
<div id="replyReportModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-reply"></i> Confirm Reply</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you want to send an automatic reply to this report?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminStrayReports/sendReply" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="sendID" name="reportID">
                <input type="hidden" id="sendName" name="sendName">
                <input type="hidden" id="sendEmail" name="sendEmail">
                <input type="hidden" id="sendLocation" name="sendLocation">
                <input type="hidden" id="sendDate" name="sendDate">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
            $(document).on('click','#btnReplyReportModal',function(){
            $('#sendID').val($(this).data('id'));
            $('#sendName').val($(this).data('name'));
            $('#sendEmail').val($(this).data('email'));
            $('#sendLocation').val($(this).data('address'));
            $('#sendDescription').val($(this).data('dog'));
            $('#sendDate').val($(this).data('date'));

            $('#replyReportModal').modal('show');
        });
    });
</script>   
{{-- END --}}

{{-- DELETE Report --}}
<div id="deleteReportModal" class="modal fade" role="dialog">
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
            <form enctype="multipart/form-data" action="/adminStrayReports/deleteReport" method="post">
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
        $(document).on('click','#btnDeleteReportModal',function(){
        $('#deleteReportID').val($(this).data('id'));

        $('#deleteReportModal').modal('show');
        });
    });
</script>
    
{{-- END --}}


@endsection