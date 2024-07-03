<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>@yield("title","Video Explorer")</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">


        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUSt7aRlI0dowRdJn6ba9AYkjff8j1Vsw&libraries=places"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <style>
            
        </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('image/-logo.jpg') }}" alt="Website Logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown position-static">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                              Solutions
                            </a>
                            <div class="dropdown-menu w-100 mt-0" aria-labelledby="navbarDropdown" style="border-top-left-radius: 0; border-top-right-radius: 0;">
                                <div class="container">
                                    <div class="row my-4">
                                      
                                      <div class="col-md-6 col-lg-3">
                                        <div class="list-group list-group-flush">
                                              <a href="#" class="list-group-item list-group-item-action"><b>What we do</b></a>
                                              <p class="w-[90%] desc text-sm">InstantScripts is Australia's leading online medical clinic. We offer a range of services including online scripts and telehealth consultations anywhere in Australia, every day, from 6am to midnight.</p>                                     </p>

                                          </div>
                                      </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="list-group list-group-flush">
                                                <a href="#" class="list-group-item list-group-item-action"><b>Online Prescription</b><p class="w-[90%] desc text-sm">Access scripts for over 300 medication</p></a>
                                                <a href="#" class="list-group-item list-group-item-action"><b>Treatment Plans</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                                <a href="{{ route('weight-loss') }}" class="list-group-item list-group-item-action"><b>Weight Loss Treatments</b><p class="w-[90%] desc text-sm">Access to medical Treatment for weight Loss.</p></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="list-group list-group-flush">
                                                <a href="#" class="list-group-item list-group-item-action"><b>Telehealth Consultation</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                                <a href="#" class="list-group-item list-group-item-action"><b>Blood Tests</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                                <a href="#" class="list-group-item list-group-item-action"><b>Mental health Consultations</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                            </div>
                                        </div>
                          
                                        <div class="col-md-6 col-lg-3">
                                          <div class="list-group list-group-flush">
                                                <a href="{{ route('certificate') }}" class="list-group-item list-group-item-action"><b>Medical certificates</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                                <a href="#" class="list-group-item list-group-item-action"><b>Specialist refferal</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                                <a href="#" class="list-group-item list-group-item-action"><b>Covid-19</b><p class="w-[90%] desc text-sm">Access repeat prescriptions and medication home delivery for some conditions.</p></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login', ['param' => 'normal', 'action' => 'normal']) }}" id="loginLink">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showRegistrationForm') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link">{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
            
            </div>
          </nav>

  

    @yield('content')


  <!-- Footer -->
  <footer
          class="text-center text-lg-start text-dark mt-5"
          style="background-color: #ECEFF1"
          >
    <!-- Section: Social media -->
    <section
             class="d-flex justify-content-between p-4 text-white"
             style="background-color: #21D192"
             >
      <!-- Left -->
      <div class="me-5">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="text-white me-6">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-5">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">Company name</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 60px; background-color: #7c4dff; height: 2px"
                />
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 text-left">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Solutions</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                
                />
          

            <p>
              <a href="#!" >Online Prescription</a>
            </p>
            <p>
              <a href="#!">Treatment Plans</a>
            </p>
            <p>
              <a href="#!">Weight Loss Treatments</a>
            </p>
            <p>
              <a href="#!">Telehealth Consultation</a>
            </p>
            <p>
              <a href="#!">Blood Tests</a>
            </p>
            <p>
              <a href="#!">Mental health Consultations</a>
            </p>
            <p>
              <a href="{{ route('certificate') }}">Medical certificates</a>
            </p>
            <p>
              <a href="#!">Specialist refferal</a>
            </p>
            <p>
              <a href="#!">Covid-19</a>
            </p>
          

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-left">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Useful links</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto "
                
                />
            <p>
              <a href="#!">Your Account</a>
            </p>
            <p>
              <a href="#!">Contact US</a>
            </p>
            <p>
              <a href="#!">Shipping Rates</a>
            </p>
            <p>
              <a href="#!">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                
                />
            <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
            <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: rgba(0, 0, 0, 0.2)"
         >
         &copy; {{ date('Y') }}
      <a class="text-dark" href="http://jjtelehealth.com.au/lander"
         >JJtelehealth.com.au  All rights reserved</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
<!-- End of .container -->
       
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>





let formData = new Map();
let formDataObject=""

    
$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

     


      $('#forgotten-password').submit(function (event) {

          // Get form data
          var formData = $(this).serialize();

          // Send AJAX request
          $.ajax({
              type: 'GET',
              headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
              url:  '{{ route("forgotten-password") }}',
              data: formData,
              success: function(response) {
                // Registration successful
                $('#forgottenMessage').text(response.message).removeClass('text-danger').addClass('text-success');
            },
            error: function(xhr, textStatus, errorThrown) {
                // Registration failed
                var errorMessage = xhr.responseJSON.error || 'Registration failed, please try again.';
                $('#forggottenMessage').text( xhr.responseJSON.error).removeClass('text-success').addClass('text-danger');
            }
          });
      });

</script>

</body>
</html>
