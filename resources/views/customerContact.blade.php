@extends('layout.customerApp')

@section('content')

<section class="home-slider inner-page owl-carousel">
  <div class="slider-item" style="background-image: url('customer/img/slider-1.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center">
        <div class="col-md-8 text-center col-sm-12 element-animate">
          <h1>Contact Us</h1>
          <p class="mb-5">Help us locate those dogs in need of a home. If you have seen a stray, contact us here. We'll take action and make sure to give those dogs a shelter.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- END slider -->
  
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-5 order-2">
        <form enctype="multipart/form-data" method="post" action = "/contact/new">
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
            <div class="col-md-12 contact-form-contact-info">
              <p class = "d-flex"><span>Location of Stray seen:</span></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">Street</label>
              <input type="text" id="street" name="street" class="form-control " required>
            </div>
            <div class="col-md-6 form-group">
              <label for="phone">Barangay</label>
              <input type="text" id="barangay" name="barangay" class="form-control " required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email">City:</label>
              <input type="text" id="city" name="city" class="form-control " required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="email">Describe the stray dog:</label>
              <input type="text" id="description" name="description" class="form-control " required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 form-group">
              <label for="message">Write Message</label>
              <textarea name="message" id="message" name="message" class="form-control " cols="30" rows="8" required></textarea>
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
      
      
      {{-- <sectioion> --}}
      <!-- END section -->

@endsection  