
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('public/backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('public/backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('public/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('public/backend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{asset('public/backend/assets/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />
	
	<!-- loader-->
	<link href="{{asset('public/backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('public/backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('public/backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/assets/css/icons.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('public/backend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('public/backend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('public/backend/assets/css/header-colors.css')}}" />
	{{-- fontawesome cdn --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	{{-- sweet alert --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	{{-- toastr CSS --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<title> @yield('title') </title>
</head>

<body>

<!--wrapper-->
<div class="wrapper">
   <!--sidebar wrapper -->
   @include('vendor.body.side_bar')
   <!--end sidebar wrapper -->
   <!--start header -->
   {{-- <header>
      <div class="topbar d-flex align-items-center">
         <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
               <div class="position-relative search-bar-box">
                  <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                  <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
               </div>
            </div>
            <div class="top-menu ms-auto">
               <ul class="navbar-nav align-items-center">
                  <li class="nav-item mobile-search-icon">
                     <a class="nav-link" href="#">	<i class='bx bx-search'></i>
                     </a>
                  </li>
                  <li class="nav-item dropdown dropdown-large">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <div class="row row-cols-3 g-3 p-3">
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
                              </div>
                              <div class="app-title">Teams</div>
                           </div>
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
                              </div>
                              <div class="app-title">Projects</div>
                           </div>
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
                              </div>
                              <div class="app-title">Tasks</div>
                           </div>
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
                              </div>
                              <div class="app-title">Feeds</div>
                           </div>
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
                              </div>
                              <div class="app-title">Files</div>
                           </div>
                           <div class="col text-center">
                              <div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
                              </div>
                              <div class="app-title">Alerts</div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="nav-item dropdown dropdown-large">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                     <i class='bx bx-bell'></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                           <div class="msg-header">
                              <p class="msg-header-title">Notifications</p>
                              <p class="msg-header-clear ms-auto">Marks all as read</p>
                           </div>
                        </a>
                        <div class="header-notifications-list">
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">5 new user registered</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">You have recived new orders</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">The pdf files generated</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">5.1 min avarage time response</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">New Product Approved <span
                                       class="msg-time float-end">2 hrs ago</span></h6>
                                    <p class="msg-info">Your new product has approved</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">New customer comments recived</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">Successfully shipped your item</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">24 new authors joined last week</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <a href="javascript:;">
                           <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                     </div>
                  </li>
                  <li class="nav-item dropdown dropdown-large">
                     <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                     <i class='bx bx-comment'></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                           <div class="msg-header">
                              <p class="msg-header-title">Messages</p>
                              <p class="msg-header-clear ms-auto">Marks all as read</p>
                           </div>
                        </a>
                        <div class="header-message-list">
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">The standard chunk of lorem</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                       sec ago</span>
                                    </h6>
                                    <p class="msg-info">Many desktop publishing packages</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">Various versions have evolved over</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                       min ago</span>
                                    </h6>
                                    <p class="msg-info">Making this the first true generator</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">The point of using Lorem</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">It was popularised in the 1960s</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">Various versions have evolved over</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">If you are going to use a passage</p>
                                 </div>
                              </div>
                           </a>
                           <a class="dropdown-item" href="javascript:;">
                              <div class="d-flex align-items-center">
                                 <div class="user-online">
                                    <img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
                                 </div>
                                 <div class="flex-grow-1">
                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                       ago</span>
                                    </h6>
                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                        <a href="javascript:;">
                           <div class="text-center msg-footer">View All Messages</div>
                        </a>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="user-box dropdown">
               <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                  <div class="user-info ps-3">
                     <p class="user-name mb-0">Pauline Seitz</p>
                     <p class="designattion mb-0">Web Designer</p>
                  </div>
               </a>
               <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
                  </li>
                  <li>
                     <div class="dropdown-divider mb-0"></div>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
   </header> --}}
   @include('vendor.body.header')
   <!--end header -->
   <!--start page wrapper -->
   <div class="page-wrapper">
	<div class="page-content">
		@yield('vendor')
	</div>
</div>
   <!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> 
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
@include('vendor.body.footer')
	<!--end wrapper-->
	<!--start switcher-->
	{{-- @include('admin.body.switcher') --}}
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{asset('public/backend/assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('public/backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/input-tags/js/tagsinput.js')}}"></script>
	<script src="{{ asset('public/backend/assets/js/code.js') }}"></script>
	<script src="{{asset('public/backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	{{-- Data table --}}
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>

	<script src="{{asset('public/backend/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{asset('public/backend/assets/js/app.js')}}"></script>
	{{-- tinymce  --}}
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>

	 {{-- tostar JS --}}
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>   
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




</body>

</html>