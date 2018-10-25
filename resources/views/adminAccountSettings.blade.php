@extends('layout./adminApp')
 
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
                   
                </div>
            </div>
        </div>
    </header><!-- /header -->
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Account</h1>
                </div>
            </div>
            </div>
            <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Account</li>
                        <li class="active">Account Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <center><strong class="card-title mb-3"><i class="fa fa-edit"></i> Change Username and Password</strong></center>
            </div>
            <div class="card-body">
                 <form enctype="multipart/form-data" autocomplete="off" action="/adminDogs/insertDog" method="post" id="addDog" class="form-horizontal">
                    
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="condition" placeholder="" class="form-control">
                            <small class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="condition" placeholder="" class="form-control">
                            <small class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <center>
                            <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                            <button type="reset" class="btn btn-danger btn-sm" onclick="resetImg()">
                              <i class="fa fa-ban"></i> Reset
                            </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div> <!-- .content -->
<!-- /#right-panel -->

<!-- Right Panel -->



@endsection