@extends('layout.customerApp')

@section('content')

    <section class="home-slider inner-page owl-carousel">
        <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
          
          <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
              <div class="col-md-8 text-center col-sm-12 element-animate">
                <h1>About Us</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
                <p><a href="#" class="btn btn-white btn-outline-white">Explore</a></p>
              </div>
            </div>
          </div>
  
        </div>
      </section>
      <!-- END slider -->
      
      <section>
        <div class="half d-md-flex d-block">
          <div class="image" style="background-image: url('img/slider-1.jpg')"></div>
          <div class="text text-center element-animate">
            <h3 class="mb-4">Our Mission</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis tempora inventore, aliquam ratione. Eum vero sapiente tempora eveniet perspiciatis libero, omnis quae facilis! Voluptatibus minima autem, esse eius natus labore.</p>
            <p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
          </div>
        </div>
  
        <div class="half d-md-flex d-block">
          <div class="image order-2" style="background-image: url('img/slider-2.jpg')"></div>
          <div class="text text-center element-animate">
            <h3 class="mb-4">Company History</h3>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis tempora inventore, aliquam ratione. Eum vero sapiente tempora eveniet perspiciatis libero, omnis quae facilis! Voluptatibus minima autem, esse eius natus labore.</p>
            
            <p><a href="#" class="btn btn-primary btn-sm">Learn More</a></p>
          </div>
        </div>
  
      </section>

      <section class="section bg-light">
        <div class="container">
          <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
              <h2 class="heading mb-4">The Dog Team</h2>
              <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
            </div>
          </div>
          <div class="row element-animate">
            <div class="major-caousel js-carousel-1 owl-carousel">
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_1.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Mellisa Howard</h3>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_2.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Mike Richardson</h3>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_3.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Charles White</h3>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_4.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Laura Smith</h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- END slider -->
          </div>
        </div>
      </section>
      <!-- END section -->
@endsection