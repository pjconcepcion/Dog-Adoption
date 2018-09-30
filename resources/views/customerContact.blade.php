@extends('layout.customerApp')

@section('content')

    <section class="home-slider inner-page owl-carousel">
        <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
          
          <div class="container">
            <div class="row slider-text align-items-center justify-content-center">
              <div class="col-md-8 text-center col-sm-12 element-animate">
                <h1>Contact Us</h1>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
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
              <form action="#" method="post">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control ">
                  </div>
                  <div class="col-md-6 form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control ">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label for="message">Write Message</label>
                    <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
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
                    <span>34 Street Name, City Name Here, United States</span>
                  </p>
  
                  <p class="d-flex">
                    <span class="ion-ios-telephone icon mr-5"></span>
                    <span>+1 242 4942 290</span>
                  </p>
  
                  <p class="d-flex">
                    <span class="ion-android-mail icon mr-5"></span>
                    <span>info@yourdomain.com</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
      <section class="section bg-light">
        <div class="container">
          <div class="row justify-content-center mb-5 element-animate">
            <div class="col-md-8 text-center">
              <h2 class="text-uppercase heading mb-4">Testimonial</h2>
              <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi unde impedit, necessitatibus, soluta sit quam minima expedita atque corrupti reiciendis.</p>
            </div>
          </div>
          <div class="row element-animate">
            <div class="major-caousel js-carousel-1 owl-carousel">
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_1.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Mellisa Howard <em>says...</em></h3>
                    <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus molestiae dicta maxime tempore tenetur, dolores officia, sed laudantium repellendus distinctio rem unde dolorum fugiat eum doloremque, numquam fuga autem nisi.&ldquo;</p>
                  </div>
  
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_2.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Mike Richardson <em>says...</em></h3>
                    <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus molestiae dicta maxime tempore tenetur, dolores officia, sed laudantium repellendus distinctio rem unde dolorum fugiat eum doloremque, numquam fuga autem nisi.&ldquo;</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_3.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Charles White <em>says...</em></h3>
                    <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus molestiae dicta maxime tempore tenetur, dolores officia, sed laudantium repellendus distinctio rem unde dolorum fugiat eum doloremque, numquam fuga autem nisi.&ldquo;</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_4.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Laura Smith <em>says...</em></h3>
                    <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus molestiae dicta maxime tempore tenetur, dolores officia, sed laudantium repellendus distinctio rem unde dolorum fugiat eum doloremque, numquam fuga autem nisi.&ldquo;</p>
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