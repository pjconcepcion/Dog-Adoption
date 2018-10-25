@extends('layout.customerApp')

@section('content')

<section class="home-slider inner-page owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('customer/img/slider-1.jpg')}});">
        <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
                <div class="row justify-content-center mb-5 element-animate">
                    <div class="col-md-8 text-center">
                        <h1 class=" heading mb-4">File a Report</h1>
                        <p class="mb-5 lead">Help us locate those dogs in need of a home. If you have seen a stray, contact us here. We'll take action and make sure to give those dogs a shelter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 order-2">
                <form enctype="multipart/form-data" method="post" action = "/missing/file/submit">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 contact-form-contact-info">
                        <p class = "d-flex"><span>Contact Information</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Contact No:</label>
                            <input type="text" id="contact" name="contact" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contact-form-contact-info">
                        <p class = "d-flex"><span>Pet Information:</span></p>
                        </div>
                    </div>
                    <div>    
                        <p>Upload a single photo of the dog</p>
                        <input type="file" name="petImg" id="gallery-photo-add" required="yes" accept="image/*">
                        <br><br>
                        <div id ="previewImg" class="gallery"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12 form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="petName" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="email">Description:</label>
                            <input type="text" id="description" name="petDescription" class="form-control " required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="message">Note:</label>
                            <textarea id="message" name="petNote" class="form-control " cols="30" rows="8" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 order-2 mb-5">
                <div class="row justify-content-right">
                <div class="col-md-8 mx-auto contact-form-contact-info">
                    <p class="d-flex">
                    <span class="ion-ios-location icon mr-5"></span>
                    <span>Mayor Gil Fernando Ave., Marikina City</span>
                    </p>
        
                    <p class="d-flex">
                    <span class="ion-ios-telephone icon mr-5"></span>
                    <span>+63 929 477 8565</span>
                    </p>
        
                    <p class="d-flex">
                    <span class="ion-android-mail icon mr-5"></span>
                    <span>furrytails@gmail.com</span>
                    </p>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src={{asset("customer/js/jquery-3.2.1.min.js")}}></script>
<script>
    $(function() {
        
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

    function resetImg() {
        document.getElementById("previewImg").innerHTML = "";
    }
</script>
@endsection