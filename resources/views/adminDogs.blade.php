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
                        <form autocomplete="off" class="search-form" enctype="multipart/form-data" action="/adminSearchedDogs" method="post">
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
                        <li class="active">Dogs for Adoption</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <center><strong class="card-title"><i class="fa fa-paw"></i> Dog Records <i class="fa fa-paw"></i></strong></center>
            </div>
            <div class="card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Dog Name</th>
                      <th scope="col">Sex</th>
                      <th scope="col">Age</th>
                      <th scope="col">Adopted?</th>
                      <th scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allDogs as $allDog)
                        <tr>
                            <td>{{$allDog -> strDogName}}</td>
                            <td>{{$allDog -> strSex}}</td>
                            <td>{{$allDog -> strAge}}</td>
                            @if($allDog -> bitIsAdopted == 0)
                                <td>Not yet</td>
                                <td>
                                    <button  data-toggle="modal" id="btnViewDogModal"
                                        data-pic="{{$allDog -> imgDogPhoto}}"
                                        data-id="{{$allDog -> intDogID}}" 
                                        data-name="{{$allDog -> strDogName}}"
                                        data-age="{{$allDog -> strAge}}"
                                        data-sex="{{$allDog -> strSex}}"
                                        data-condition="{{$allDog -> strCondition}}" 
                                        data-description="{{$allDog -> strDescription}}" 
                                        type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> </button>
                                    <button  data-toggle="modal" id="btnEditDogModal" 
                                        data-id="{{$allDog -> intDogID}}" 
                                        data-name="{{$allDog -> strDogName}}"
                                        data-age="{{$allDog -> strAge}}"
                                        data-sex="{{$allDog -> strSex}}"
                                        data-condition="{{$allDog -> strCondition}}"
                                        data-description="{{$allDog -> strDescription}}" 
                                        type="submit" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i> </button>
                                    <button  data-toggle="modal" id="btnDeleteDogModal" data-dogid="{{$allDog -> intDogID}}" data-name="{{$allDog -> strDogName}}" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> </button>
                                </td>
                            @else
                                <td>Yes</td>
                                <td>
                                    <button  data-toggle="modal" id="btnViewDogModal"
                                        data-pic="{{$allDog -> imgDogPhoto}}"
                                        data-id="{{$allDog -> intDogID}}" 
                                        data-name="{{$allDog -> strDogName}}"
                                        data-age="{{$allDog -> strAge}}"
                                        data-sex="{{$allDog -> strSex}}"
                                        data-condition="{{$allDog -> strCondition}}" 
                                        data-description="{{$allDog -> strDescription}}" 
                                        type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> </button>
                                    <button  data-toggle="modal" id="btnEditDogModal" disabled type="submit" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> </button>
                                    <button  data-toggle="modal" id="btnDeleteDogModal" data-dogid="{{$allDog -> intDogID}}" data-name="{{$allDog -> strDogName}}" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                  </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- ADD --}}
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <center><strong class="card-title mb-3"><i class="fa fa-plus"></i> Dog for Adoption</strong></center>
            </div>
            <div class="card-body">
                 <form enctype="multipart/form-data" autocomplete="off" action="/adminDogs/insertDog" method="post" id="addDog" class="form-horizontal">
                    
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <p>Upload a single photo of the dog</p>
                    <input type="file" name="dogimage" id="gallery-photo-add" required="yes" accept="image/*">
                    <br><br>
                    <div id="previewImg" class="gallery"></div>
                    
                    <hr>
                
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Dog Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Sex</label>
                        </div>
                        <div class="col col-md-9">
                            <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                        <input type="radio" id="inline-radio1" name="sex" value="Female" class="form-check-input" required >Female
                                </label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" id="inline-radio2" name="sex" value="Male" class="form-check-input" required>Male
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Age</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="age" placeholder="" class="form-control">
                            <small class="form-text text-muted">*If the age can't be determined, a generalized input can be accepted (e.g. Young, Old, Approximately (x) years old).</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Condition</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="condition" placeholder="" class="form-control">
                            <small class="form-text text-muted">(e.g. Healthy, With special care needed)</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="description" id="textarea-input" rows="9" placeholder="Tell us about the dog..." class="form-control"></textarea>
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
    {{-- END ADD --}}

</div> <!-- .content -->
<!-- /#right-panel -->
<!-- Right Panel -->

{{-- VIEW DOG --}}

<div id="viewDogModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-paw"></i>&nbsp;</h4>
            <h4 class="modal-title" id="DogName"></b></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <input type="hidden" id="productID" name="productID">
            <center><img class="modal-content" style= "height: 300px; width: auto; border: 2px solid gray; padding: 2px;" id="dogImage"></center>
            <hr>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dognameview" class=" form-control-label">Dog Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dognameview" name="name" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogsexview" class=" form-control-label">Sex</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dogsexview" name="sex" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogageview" class=" form-control-label">Age</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dogageview" name="age" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogconditionview" class=" form-control-label">Condition</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dogconditionview" name="condition" class="form-control" readonly>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogdescriptionview" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea rows="10" style="width:100%;" id="dogdescriptionview" name="description" class="form-control" readonly></textarea>
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
       $(document).on('click','#btnViewDogModal',function(){
        var name = $(this).data('name');
        $('#DogName').html(name);

        $('#dognameview').val($(this).data('name'));
        $('#dogageview').val($(this).data('age'));
        $('#dogsexview').val($(this).data('sex'));
        $('#dogconditionview').val($(this).data('condition'));
        $('#dogdescriptionview').val($(this).data('description'));;
        
        var newSrc=$(this).data('pic');
        $('#dogImage').attr('src',newSrc);

        $('#viewDogModal').modal('show');
       });
    });
</script>

{{-- END --}}

{{-- EDIT DOG --}}
<div id="editDogModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
            <div class="modal-content">
    
                <div class="modal-header">
                    <h4 class="modal-title"></b><i class="fa fa-edit"></i> Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>
                <form enctype="multipart/form-data" action="/adminDogs/editDog" method="post" autocomplete="off">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" id="dogidedit" name="dogID">
                    <div class="modal-body">             
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="dognameedit" class=" form-control-label">Dog Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="dognameedit" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Sex</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label ">
                                                <input type="radio" id="inline-radio1" name="sex" value="Female" class="form-check-input" required >Female
                                        </label>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <label for="inline-radio2" class="form-check-label ">
                                            <input type="radio" id="inline-radio2" name="sex" value="Male" class="form-check-input" required>Male
                                        </label>
                                    </div>
                                </div>
                            </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="dogageedit" class=" form-control-label">Age</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="dogageedit" name="age" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="dogconditionedit" class=" form-control-label">Condition</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="dogconditionedit" name="condition" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="dogdescriptionedit" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea rows="8" style="width:100%;" id="dogdescriptionedit" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Confirm">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <script type="text/javascript">
        $(document).ready(function(){
           $(document).on('click','#btnEditDogModal',function(){
            $('#dogidedit').val($(this).data('id'));
            $('#dognameedit').val($(this).data('name'));
            $('#dogageedit').val($(this).data('age'));
            $('#dogsexedit').val($(this).data('sex'));
            $('#dogconditionedit').val($(this).data('condition'));
            $('#dogdescriptionedit').val($(this).data('description'));;

            $('#editDogModal').modal('show');
           });
        });
    </script>

{{-- END --}}

{{-- DELETE DOG --}}

<div id="deleteDogModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-trash"></i> Confirm Delete</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <p> Do you really want to delete <strong id="deleteDogName"></strong>'s record?</p>
        </div>
        <div class="modal-footer">
            <form enctype="multipart/form-data" action="/adminDogs/deleteDog" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" id="deleteDogID" name="dogID">
                <input type="submit" class="btn btn-danger" value="Yes">
            </form>                
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('click','#btnDeleteDogModal',function(){
        $('#deleteDogID').val($(this).data('dogid'));

        var name = $(this).data('name');
        $('#deleteDogName').html(name);

        $('#deleteDogModal').modal('show');
       });
    });
</script>

{{-- END --}}

<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var file = input.files[0];
                var _validFileExtensions = ["jpeg","jpg","png"];    
                
                if(file.size < 10000000){
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img class="thumbnail">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview)
                    }
                    reader.readAsDataURL(file);
                }else{
                    alert('Image is too large')
                }
            }               
        };

        $('#gallery-photo-add').on('change', function() {
            resetImg();
            imagesPreview(this, 'div.gallery');
        });
    });
</script>

{{-- Reset Insert Dog Form--}}
<script>
    function resetImg() {
        document.getElementById("previewImg").innerHTML = "";
    }
</script>

@endsection