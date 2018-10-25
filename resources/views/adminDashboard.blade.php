@extends('layout.adminApp')
 
@section('content')

<!-- Right Panel -->

<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="header-menu">
            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>
        </div>
    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
            </div>
            <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fa fa-paw bg-primary p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-primary mb-0 pt-3">{{$dogCount}}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Dog Adopted</div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fa fa-envelope bg-success p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-success mb-0 pt-3">{{$strayCount}}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Stray Reports</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fa fa-exclamation-circle bg-danger p-4 px-5 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-danger mb-0 pt-3">{{$missingCount}}</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Missing Reports</div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-center text-primary mb-4">
                        <i class="fa fa-paw"></i>
                    </div>

                    <div class="h3 text-center mb-4">
                        Dog Adoption Report
                    </div>
                </div>
            </div>

            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h6 text-muted text-center mb-4">
                        PRINT DOG ADOPTION REPORT
                    </div>
                    
                    <div class="h6 text-center mb-4">
                        <form enctype="multipart/form-data" action="/adminDashboard/printDogAdoptionReport" target="_blank" method="post">                        
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-5">
                                <select name="month" class="form-control-md form-control">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="year" class="form-control-md form-control">
                                        @foreach($years as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button title="Print" class="btn btn-xl btn-outline-secondary"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                        </form>                        
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-success text-center mb-4">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <div class="h3 text-center mb-4">
                        Stray Report
                    </div>
                </div>
            </div>
            
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h6 text-muted text-center mb-4">
                        PRINT STRAY REPORT
                    </div>
                    
                    <div class="h6 text-center mb-4">
                        <form enctype="multipart/form-data" action="/adminDashboard/printStrayReport" target="_blank" method="post">                        
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-5">
                                <select name="month" class="form-control-md form-control">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="year" class="form-control-md form-control">
                                        @foreach($years as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button title="Print" class="btn btn-xl btn-outline-secondary"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div>
            </div>

        </div>
    </div>


    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-danger text-center mb-4">
                        <i class="fa fa-exclamation-circle"></i>
                    </div>

                    <div class="h3 text-center mb-4">
                        Missing Pets Report
                    </div>
                </div>
            </div>

            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h6 text-muted text-center mb-4">
                        PRINT MISSING PETS REPORT
                    </div>
                    
                    <div class="h6 text-center mb-4">
                        <form enctype="multipart/form-data" action="/adminDashboard/printMissingReport" target="_blank" method="post">                        
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-5">
                                <select name="month" class="form-control-md form-control">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                </select>
                                </div>
                                <div class="col-md-5">
                                    <select name="year" class="form-control-md form-control">
                                        @foreach($years as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button title="Print" class="btn btn-xl btn-outline-secondary"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4  " style="width: 40%; height: 5px;"></div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- .content -->
<!-- /#right-panel -->

<!-- Right Panel -->
@endsection