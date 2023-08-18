<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta charset="utf-8" />
      <title> @yield('title') </title>
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      {{-- <meta name="description" content="" /> --}}
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta property="og:title" content="" />
      <meta property="og:type" content="" />
      <meta property="og:url" content="" />
      <meta property="og:image" content="" />
      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/uploads/theme/favicon.svg')}}" />
      <!-- Template CSS -->
      <link rel="stylesheet" href="{{asset('public/frontend/assets/css/plugins/animate.min.css')}}" />
      <link rel="stylesheet" href="{{asset('public/frontend/assets/css/main.css?v=5.3')}}" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

            <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
      <!--leaflet map-->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
      <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


      @include('frontend.body.style')

   </head>
   <body>
      <!-- Modal -->
      <!-- Quick view -->
    @include('frontend.body.modal')
      <!-- Header  -->
      @include('frontend.body.header')
      <!--End header-->
      <main class="main">
         @yield('content')
      </main>

      @include('frontend.body.footer')
      <!-- Preloader Start -->
      {{-- <div id="preloader-active">
         <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
               <div class="text-center">
                  <img src=" {{asset('public/uploads/theme/loading.gif')}} " alt="" />
               </div>
            </div>
         </div>
      </div> --}}
      <!-- Vendor JS-->
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script> --}}
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"></script> --}}
      {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
      {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

      <script src="{{asset('public/frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/slick.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/waypoints.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/wow.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/magnific-popup.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/select2.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/counterup.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/images-loaded.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/isotope.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/scrollup.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
      <!-- Template  JS -->
      <script src="{{asset('public/frontend/assets/js/main.js?v=5.3')}}"></script>
      <script src="{{asset('public/frontend/assets/js/shop.js?v=5.3')}}"></script>
      <script src="{{asset('public/frontend/assets/js/custom.js')}}"></script>

   	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

	 {{-- tostar JS --}}
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>   
	       <!-- Latest compiled and minified JavaScript -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
      <script src="{{asset('public/frontend/assets/js/plugins/leaflet.js')}}"></script>
          
   <script>
	  @if(Session::has('message'))
	  var type = "{{ Session::get('alert-type','info') }}"
	  switch(type){
		 case 'info':
		 toastr.info(" {{ Session::get('message') }} ");
		 break;
	 
		 case 'success':
		 toastr.success(" {{ Session::get('message') }} ");
		 break;
	 
		 case 'warning':
		 toastr.warning(" {{ Session::get('message') }} ");
		 break;
	 
		 case 'error':
		 toastr.error(" {{ Session::get('message') }} ");
		 break; 
	  }
	  @endif 
	 </script>


@include('sweetalert::alert')



      @include('frontend.body.js')

   </body>
</html>