
<!doctype html>
<html lang="en">

<head>
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

	<title>Admin Login</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Admin Login</h3>
										
									</div>
									<div class="form-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Login</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
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



	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{asset('public/backend/assets/js/app.js')}}"></script>
</body>

</html>