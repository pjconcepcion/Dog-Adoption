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
                        <li class="active">Dogs for Adoption</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">List of All Dogs Up for Adoption</strong>
            </div>
            <div class="card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Dog Name</th>
                      <th scope="col">Sex</th>
                      <th scope="col">Age</th>
                      <th scope="col"> </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allDogs as $allDog)
                        <tr>
                          <td>{{$allDog -> strDogName}}</td>
                          <td>{{$allDog -> strSex}}</td>
                          <td>{{$allDog -> strAge}}</td>
                          <td>
                            <button  data-toggle="modal" id="btnViewDogModal" data-id="{{$allDog -> intDogID}}" data-name="{{$allDog -> strDogName}}" data-pic="{{$allDog -> imgDogPhoto}}" type="submit" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> </button>
                            <button class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></button>
                            <button  data-toggle="modal" id="btnDeleteDogModal" data-id="{{$allDog -> intDogID}}" data-name="{{$allDog -> strDogName}}" type="submit" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> </button>
                          </td>
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
                    <div class="gallery"></div>
                    
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
                                        <input type="radio" id="inline-radio1" name="gender" value="Female" class="form-check-input" required >Female
                                </label>
                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" id="inline-radio2" name="gender" value="Male" class="form-check-input" required>Male
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
                            <input type="text" id="text-input" name="age" placeholder="" class="form-control">
                            <small class="form-text text-muted">(e.g. Healthy, With special care needed)</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Tell us about the dog..." class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <center>
                            <button type="submit" class="btn btn-primary btn-sm">
                              <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
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


{{-- VIEW DOG --}}

<div id="viewDogModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
            <h4 class="modal-title"></b><i class="fa fa-paw"></i> View</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>

        <div class="modal-body">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" id="productID" name="productID">
            <center><img class="modal-content" style= "height: 300px; width: auto; border: 2px solid gray; padding: 2px;" id="dogImage"></center>
            <hr>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="dogname" class=" form-control-label">Dog Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="dogname" name="dogname" class="form-control" readonly>
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
        $('#dogname').val($(this).data('name'));
        
        var newSrc=$(this).data('pic');
        $('#dogImage').attr('src',newSrc);

        $('#viewDogModal').modal('show');
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

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" id="deleteDogID" name="dogID">
            <hr>
            <p> Do you really want to delete <strong id="deleteDogName"></strong>'s record?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
       $(document).on('click','#btnDeleteDogModal',function(){
        $('#deleteDogID').val($(this).data('id'));

        var name = $(this).data('name');
        $('#deleteDogName').html(name);

        $('#deleteDogModal').modal('show');
       });
    });
</script>

{{-- END --}}

<!-- Right Panel -->
<script>
    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;
                var _validFileExtensions = ["jpeg","jpg","png"];    

                if (input.files.length > 4) {
                    alert("Maximum number of images that can be uploaded is 4");
                    location.reload();
                }
                else{

                     for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                        $($.parseHTML('<img class="thumbnail">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview)
                        }

                        reader.readAsDataURL(input.files[i]);
                }
                }

               
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>

{{-- Reset Insert Dog Form--}}
<script>
    function myFunction() {
        document.getElementById("addDog").reset();
    }
</script>

@endsection