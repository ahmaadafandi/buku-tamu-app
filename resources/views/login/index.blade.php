


<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Buku Tamu Online | Login</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('backend/html/assets/images/favicon.ico') }}" />
      
      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/core/libs.min.css') }}" />
      
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/hope-ui.min.css?v=2.0.0') }}" />
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/custom.min.css?v=2.0.0') }}" />
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/dark.min.css') }}"/>
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/customizer.min.css') }}" />
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="{{ asset('backend/html/assets/css/rtl.min.css') }}"/>
      
      
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    </div>
    <!-- loader END -->
    
      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">            
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           <a href="/login" class="navbar-brand d-flex align-items-center mb-3">
                              <!--Logo start-->
                              <!--logo End-->
                              
                              <!--Logo start-->
                              <div class="logo-main">
                                  <div class="logo-normal">
                                      <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                          <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                          <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                          <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                      </svg>
                                  </div>
                                  <div class="logo-mini">
                                      <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                          <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                          <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                          <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                      </svg>
                                  </div>
                              </div>
                              <!--logo End-->
                              
                              <h4 class="logo-title ms-3">Hope UI</h4>
                           </a>
                           <h2 class="mb-2 text-center">Sign In</h2>
                           <p class="text-center">Login to stay connected.</p>
                           <form action="/login" method="post">
                              @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Email</label>
                                       <input type="email" class="form-control" name="email" id="email" aria-describedby="email" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                       <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder=" ">
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
                                    <div class="form-check mb-3">
                                       <input type="checkbox" class="form-check-input" id="customCheck1">
                                       <label class="form-check-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <a href="recoverpw.html">Forgot Password?</a>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Sign In</button>
                              </div>
                              {{-- <p class="text-center my-3">or sign in with other accounts?</p> --}}
                              {{-- <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="{{ asset('backend/html/assets/images/brands/fb.svg') }}" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="{{ asset('backend/html/assets/images/brands/gm.svg') }}" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="{{ asset('backend/html/assets/images/brands/im.svg') }}" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="{{ asset('backend/html/assets/images/brands/li.svg') }}" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> --}}
                              {{-- <p class="mt-3 text-center">
                                 Don’t have an account? <a href="sign-up.html" class="text-underline">Click here to sign up.</a>
                              </p> --}}
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="{{ asset('backend/html/assets/images/auth/01.png') }}" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
      </div>

      <!-- Toast Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div id="liveToast" class="toast align-items-center border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
                    <strong class="me-auto">Bootstrap</strong>
                    <small class="text-muted">11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div id="toast-body" class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </div>
    </div>
    
    <!-- Library Bundle Script -->
    <script src="{{ asset('backend/html/assets/js/core/libs.min.js') }}"></script>
    
    <!-- External Library Bundle Script -->
    <script src="{{ asset('backend/html/assets/js/core/external.min.js') }}"></script>
    
    <!-- Widgetchart Script -->
    <script src="{{ asset('backend/html/assets/js/charts/widgetcharts.js') }}"></script>
    
    <!-- mapchart Script -->
    <script src="{{ asset('backend/html/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ asset('backend/html/assets/js/charts/dashboard.js') }}" ></script>
    
    <!-- fslightbox Script -->
    <script src="{{ asset('backend/html/assets/js/plugins/fslightbox.js') }}"></script>
    
    <!-- Settings Script -->
    <script src="{{ asset('backend/html/assets/js/plugins/setting.js') }}"></script>
    
    <!-- Slider-tab Script -->
    <script src="{{ asset('backend/html/assets/js/plugins/slider-tabs.js') }}"></script>
    
    <!-- Form Wizard Script -->
    <script src="{{ asset('backend/html/assets/js/plugins/form-wizard.js') }}"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="{{ asset('backend/html/assets/js/hope-ui.js') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toastHeader = document.querySelector('#liveToast .toast-header strong.me-auto');
            const toastBody = document.getElementById('toast-body');
            const toastIcon = document.querySelector('#liveToast .toast-header svg rect');
            
            @if(session()->has('success'))
                if (toastHeader) {
                    toastHeader.textContent = "Success";
                }

                if (toastBody) {
                    toastBody.textContent = "{{ Session::get('success') }}";
                }

                if (toastIcon) {
                    // Ubah warna fill sesuai dengan kondisi
                    toastIcon.setAttribute('fill', '#41ca1b'); // Contoh: merah untuk success
                }

                // Inisialisasi dan tampilkan toast
                const toastElement = document.getElementById('liveToast');
                const toast = new bootstrap.Toast(toastElement, { delay: 3000 }); // 3000ms = 3 detik
                toast.show();
            @endif

            @if(Session::has('error'))
                if (toastHeader) {
                    toastHeader.textContent = "Error";
                }
                if (toastBody) {
                    toastBody.textContent = "{{ Session::get('error') }}";
                }
                if (toastIcon) {
                    toastIcon.setAttribute('fill', '#dc3545'); // Warna merah untuk error
                }

                // Inisialisasi dan tampilkan toast
                const toastElement = document.getElementById('liveToast');
                const toast = new bootstrap.Toast(toastElement, { delay: 3000 }); // 3000ms = 3 detik
                toast.show();
            @endif
        });
      </script>
    
  </body>
</html>