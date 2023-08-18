
<!doctype html>
<html lang="en">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
	
	{{-- toastr CSS --}}
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.0/dist/sweetalert2.min.css">

	{{-- bootstrap   --}}
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
  
	<title> @yield('title') </title>
</head>

<body>

<!--wrapper-->
<div class="wrapper">
   <!--sidebar wrapper -->
   @include('admin.body.side_bar')
   <!--end sidebar wrapper -->
   <!--start header -->

   @include('admin.body.header')
   <!--end header -->
   <!--start page wrapper -->
   <div class="page-wrapper">
	<div class="page-content">
		@yield('admin')
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" ></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
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
	<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

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


{{-- <script>
	$("#myForm").validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    password: {
      required: true,
      minlength: 8,
      maxlength: 16,
      pattern: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=]).*$/
    }
  },
  messages: {
    email: {
      required: "Please enter your email address.",
      email: "Please enter a valid email address."
    },
    password: {
      required: "Please enter a password.",
      minlength: "Your password must be at least 8 characters long.",
      maxlength: "Your password must be less than 16 characters long.",
      pattern: "Your password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character (@#$%^&+=)."
    }
  }
});
</script> --}}

<script>
    $(document).ready(function(){
	         $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
	});

		//start fetch all division data 
		function alldivision(){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url : `{{url('/admin/get/all/division')}}`,
				success: function(data){
					// console.log(data);
					var rows = '';
					var rowNum = 1;
					$.each(data.division, function(key,value){
						rows += `
					<tr>
                        <td>${rowNum++}</td>
                        <td>${value.division_name}</td>
                        <td>
                            <a class="btn btn-info" id="${value.id}" data-bs-toggle="modal" data-bs-target="#editdivisioModal" onclick="divisionEdit(this.id)" >Edit</a>
                            <a class="btn btn-danger" id="${value.id}" onclick="divisionDelete(this.id)" >Delete</a>
                        </td>
                    </tr>   
						`
					})
					$('#show_division').html(rows);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		alldivision();

		//end fetch all division data 

			//start add division part
			function AddDivision(){
			var div = $('#division_name').val();
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: `{{route('add.division')}}`,
				data: {
					division: div
				},
				success: function(data){
					alldivision();
					$('#division_name').val( ' ');
					// $('#division_name').reset();

					$('#divisioModal').modal('hide');

					// console.log(data);

			const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		//end add division part

		//start division edit part
		function divisionEdit(id){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url: `{{url('/edit/division/${id}')}}`,
				success: function(data){
					console.log(data.division.division_name);
					$('#edit_division_name').val(data.division.division_name);
					$('#div_id').val(data.division.id);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}

			})
		}
		//end division edit part

		//start update division
		function updateDivision(id){
			// alert($('#div_id').val());
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: { 
					division: $('#edit_division_name').val(),
					id: $('#div_id').val()
				},
				url: `{{url('/update/division')}}`,
				success: function(data){
					$('#editdivisioModal').modal('hide');
					alldivision();
					// console.log(data);
				const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }


				},

				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		//end update division

		//start division delete
		function divisionDelete(id){
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: `{{url('/delete/division/${id}')}}`,
				success: function(data){
					alldivision();
					// console.log(data);
					const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		//end division delete
</script>


		{{-- //District --}}
<script>
		//start fetch all District data 
			function allDistrict(){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url : `{{url('/admin/get/all/district')}}`,
				success: function(data){
					// console.log(data);
					var rows = '';
					var rowNum = 1;
					$.each(data.district, function(key,value){
						rows += `
					<tr>
                        <td>${rowNum++}</td>
                        <td>${value.division.division_name}</td>
                        <td>${value.district_name}</td>
                        <td>
                            <a class="btn btn-info" id="${value.id}" data-bs-toggle="modal" data-bs-target="#editDistrictoModal" onclick="districtEdit(this.id)" >Edit</a>
                            <a class="btn btn-danger" id="${value.id}" onclick="districtDelete(this.id)" >Delete</a>
                        </td>
                    </tr>   
						`
					})
					$('#show_district').html(rows);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		allDistrict();

		//end fetch all division data 

		//start get district part 
		function getDistrict(){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url: `{{url('/admin/get/all/division')}}`,
				success: function(data){
					// console.log(data);
					var rows = '<option disabled selected>Select Division</option>';
					$.each(data.division, function(key, value){
						rows+=`
						
						<option value="${value.id}" >${value.division_name}</option>
						`
					})
					$('#option_division').html(rows);

				}, error:function(jqXHR, textStatus, errorThrown){
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		getDistrict();
		
		//end get district part 
		//start AddDistrict part
		function AddDistrict(){
			// alert($('#option_division').val());
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: `{{url('/admin/add/district')}}`,
				data:{
					division_id : $('#option_division').val(),
					district_name: $('#district_name').val()
				},
				success: function(data){
					// console.log(data);
					allDistrict();
					getDistrict();

					$('#DistrictoModal').modal('hide');
					$('#option_division').val(' ');
					$('#district_name').val(' ');
		const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

				}, error: function(jqXHR, textStatus, errorThrown){
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})

		}
		//end AddDistrict part

		// start district Edit
		function districtEdit(id){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url: `{{url('/edit/district/${id}')}}`,
				success:function(data){
					console.log(data.district.division.id);

					var rows = `<option value="${data.district.division.id}" >--${data.district.division.division_name}</option>`;
					$.each(data.division, function(key, value){
						rows+=`
						<option value="${value.id}" >${value.division_name}</option>
						`
					})

					$('#edit_option_division').html(rows);
					$('#edit_district_name').val(data.district.district_name);
					$('#dis_id').val(data.district.id);

				}, error:function(jqXHR, textStatus, errorThrown){
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		//end district Edit

		//start update district
		function updateDistrict(){
			$.ajax({
				type: 'post',
				dataType: 'json',
				data: {
					id : $('#dis_id').val(),
					division_id : $('#edit_option_division').val(),
					district_name : $('#edit_district_name').val()
				},
				url: `{{url('/update/district')}}`,
				success:function(data){
					// console.log(data);
					allDistrict();
					$('#editDistrictoModal').modal('hide');

		const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

				}, error: function(jqXHR, textStatus, errorThrown){
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		//end update district

		//start district Delete
		function districtDelete(id){
			// alert('Are you sure?');

			Swal.fire({
				title: 'Are you sure to delete it?',
				showDenyButton: false,
				showCancelButton: true,
				confirmButtonText: 'yes',
				// denyButtonText: `Don't save`,
				}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					Swal.fire('Deleted!', '', 'success')

					$.ajax({
				type: 'post',
				dataType:'json',
				url: `{{url('/delete/district/${id}')}}`,
				success:function(data){
					allDistrict();

			const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
					
				}
			})

				} else if (result.isDenied) {
					Swal.fire('Changes are not saved', '', 'info')
				}
			})

		}
		//end district Delete
</script>
		{{-- end//District --}}






		{{-- start//Upazila --}}

<script>

//start get district part 
function getUpazila(){

						$('#option_division').on('change',function(){
						var option_division_id = $(this).val();
						// alert(option_division_id);

						$.ajax({
							type: 'get',
							dataType: 'json',
							url: `{{url('/admin/get/district/${option_division_id}')}}`,
							success: function(data){
								// console.log(data);

								var rows = ' <option>Select District</option>';
								$.each(data.district, function(key, value){
									rows+=`
									<option value="${value.id}" >${value.district_name}</option>
									`
								})
								$('#district_name').html(rows);

							}, error:function(jqXHR, textStatus, errorThrown){
								console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
							}
						})
						
						})


		}
		getUpazila();
		
		//end get upazila part 




		//start add upazila part
		function AddUpazila(){
			// alert($('#option_division').val());
			$.ajax({
				type: 'post',
				dataType: 'json',
				url: `{{url('/admin/add/upazila')}}`,
				data:{
					option_division : $('#option_division').val(),
					district_name: $('#district_name').val(),
					upazila_name: $('#upazila_name').val()
				},
				success: function(data){
					// console.log(data);
					// allDistrict();
					allupazila();
					$('#UpazilaModal').modal('hide');
					// $('#option_division').val(' ');
					$('#district_name').val(' ');
					$('#upazila_name').val(' ');

		const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

				}, error: function(jqXHR, textStatus, errorThrown){
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}

// $(document).ready(function() {
$("#upazila_form").validate({
  rules: {
    option_division: {
      required: true,
    },
    district_name: {
      required: true,
    },
    upazila_name: {
      required: true,
    }
  },
  messages: {
    option_division: {
      required: "Please select a Division first",
    },
    district_name: {
      required: "Please select a district.",
    },
    upazila_name: {
      required: "Please enter Upazila name.",
    }
  }
});
// });

		//end add upazila part

		//all upazila
		function allupazila(){
			$.ajax({
				type: 'get',
				dataType: 'json',
				url : `{{url('/admin/get/all/upazila')}}`,
				success: function(data){
					console.log(data);
					var rows = '';
					var rowNum = 1;
					$.each(data.upazila, function(key,value){
						rows += `
					<tr>
                        <td>${rowNum++}</td>
                        <td>${value.division.division_name}</td>
                        <td>${value.district.district_name}</td>
                        <td>${value.upazila_name}</td>
                        <td>
                            <a class="btn btn-info" id="${value.id}" data-bs-toggle="modal" data-bs-target="#editUpazilaModal" onclick="UpazilaEdit(this.id)" >Edit</a>
                            <a class="btn btn-danger" id="${value.id}" onclick="UpazilaDelete(this.id)" >Delete</a>
                        </td>
                    </tr>   
						`
					})
					$('#show_Upazila').html(rows);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		}
		allupazila();
		// end all upazila

		//upazila edit part start
		function UpazilaEdit(id){
			// alert(id);
			$.ajax({
				type: 'get',
				dataType: 'json',
				url: `{{url('/edit/upazila/${id}')}}`,
				success:function(data){
					// console.log(data);

					// division part
					var division = `<option value="${data.upazila.division.id}" >--${data.upazila.division.division_name}</option>`;
					$.each(data.division, function(key, value){
						division+=`
						<option value="${value.id}" >${value.division_name}</option>
						`
					})
					$('#edit_option_division').html(division);

					// district part
					var district = `<option value="${data.upazila.district.id}" >--${data.upazila.district.district_name}</option>`;
					$.each(data.district, function(key, value){
						district+=`
						<option value="${value.id}" >${value.district_name}</option>
						`
					})
					$('#edit_district_name').html(district);
					//upazila part
					$('#edit_upazila_name').val(data.upazila.upazila_name);
					$('#upazila_id').val(data.upazila.id);

				}, error: function(jqXHR, textStatus, errorThrown){
					console.log('AJAX error: ' + textStatus + ':' + errorThrown);
				}
			})
		}
		//upazila edit part end

		//upazila update part start
		function UpdateUpazila(){
			var upazila = {
						id : $('#upazila_id').val(),
				division_id : $('#edit_option_division').val(),
				district_id : $('#edit_district_name').val(),
				upazila_name : $('#edit_upazila_name').val(),
			} 

			$.ajax({
				type:'post',
				dataType: 'json',
				data: upazila,
				url: `{{url('/update/upazila')}}`,
				success: function(data){
				allupazila();
				$('#editUpazilaModal').modal('hide');
				const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
				}, error: function(jqXHR, textStatus, errorThrown){
					console.log('AJAX error: ' + textStatus + ':' + errorThrown);
				}
			})



		}
		//upazila update part start


		// upazila delete part start
		function UpazilaDelete(id){
			// alert(id);
			
			Swal.fire({
				title: 'Are you sure to delete it?',
				showDenyButton: false,
				showCancelButton: true,
				confirmButtonText: 'yes',
				// denyButtonText: `Don't save`,
				}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					Swal.fire('Deleted!', '', 'success')
			$.ajax({
				type: "post",
				dataType: 'json',
				url: `{{url('/delete/upazila/${id}')}}`,
				success:function(data){
					// console.log(data);
					allupazila();
				const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						icon: 'success', 
						showConfirmButton: false,
						timer: 3000 
				})
				if ($.isEmptyObject(data.error)) {
						
						Toast.fire({
						type: 'success',
						title: data.success, 
						})
				}else{
					
				Toast.fire({
						type: 'error',
						icon: 'error',
						title: data.error, 
						})
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			})
		} else if (result.isDenied) {
					Swal.fire('Changes are not saved', '', 'info')
				}
			})
		}

		//upazila delete part end

</script>
		{{-- start//Upazila --}}



		<script>

$("#discount_type").change(function() {
        var selectedOption = $(this).val();
		
		if(selectedOption=='percentage'){
				var input = ` <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Discount Percentage(%)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="number" name="percentage" id="percentage" value="{{old('percentage')}}"  class="form-control" placeholder="Discount Percentage" />
                    </div>
                </div>`
				$('#show_discount_type').html(input);
		}else{
			var input = ` <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Discount Amount</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="number" name="fixed_amount" id="fixed_amount" value="{{old('fixed_amount')}}"  class="form-control" placeholder="Discount Amount" />
                    </div>
                </div>`

				$('#show_discount_type').html(input);
		}
    });


$(document).ready(function() {
  $("#myForm").validate({
    rules: {
	coupon_code: {
        required: true,
		
      }
	  
	// coupon_code: {
    //     required: true,
    //     remote: {
    //       url: "{{ route('coupons.check_code') }}",
    //       type: "post",
    //       data: {
    //         coupon_code: function() {
    //           return $("#coupon_code").val();
    //         }
    //       }
    //     }
    //   }
	  ,
      description: {
        required: true,
      },
      start_date: {
        required: true,
        date: true,
        min: "{{Carbon\Carbon::now()->format('Y-m-d')}}"
      },
	  end_date: {
        required: true,
        date: true,
        min: "{{Carbon\Carbon::now()->format('Y-m-d')}}"
      },
	  discount_type: {
        required: true,
      },
	  minimum_purchase_amount: {
        required: true,
      },
	  percentage: {
        required: true,
      },
	  fixed_amount: {
        required: true,
      },
    },
    messages: {
		coupon_code: "<p class='text-danger'>Please enter your coupon name</p>",

	//   coupon_code: {
    //     	required: "<p class='text-danger'>Please enter your coupon name</p>",
    //     	remote: "<p class='text-danger'>Coupon code already exists. Please enter a unique code.</p>"
    //   },
	  description: {
        required: "<p class='text-danger'>Please enter description</p> ",
      },
      start_date: {
        required: "<p class='text-danger'>Please select a start date</p>",
      },
	  end_date: {
        required: "<p class='text-danger'>Please select a end date</p>",
      },
	  discount_type: {
        required: "<p class='text-danger'>Please select a discount type</p>",
      },
	  minimum_purchase_amount: {
        required: "<p class='text-danger'>Please enter minimum amount</p>",
      },
	  percentage: {
        required: "<p class='text-danger'>Please enter percentage</p>",
      },
	  fixed_amount: {
        required: "<p class='text-danger'>Please enter fixed amount</p>",
      },
    },
	// errorElement : 'span', 
    //         errorPlacement: function (error,element) {
    //             error.addClass('invalid-feedback');
    //             element.closest('.form-group').append(error);
    //         },
    //         highlight : function(element, errorClass, validClass){
    //             $(element).addClass('is-invalid');
    //         },
    //         unhighlight : function(element, errorClass, validClass){
    //             $(element).removeClass('is-invalid');
    //         },

  });
});

function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this data?')) {
        window.location.href = `{{url('/delete/coupon/${id}')}}`;
    }
}
		</script>










//confirm alert
<script>
	  $('#pending').on('click', function(e) {
		e.preventDefault();
		var link = $(this).attr('href');
    Swal.fire({
      title: 'Are you sure to confirm?',
      text: 'Once you confirm, you will not be pending again!',
      showCancelButton: true,
      confirmButtonText: 'confirm',
    }).then((result) => {
		if (result.isConfirmed) {
				window.location.href = link
				Swal.fire(
				'Confirmed!',
				'Order Confirmed.',
				'success'
				)
			}
    })

  });


  $('#confirm').on('click', function() {
    Swal.fire({
      title: 'Are you sure to confirm?',
      text: 'Once you process, you will not be confirm again!',
      showCancelButton: true,
      confirmButtonText: 'process',
    }).then((result) => {
		if (result.isConfirmed) {
				window.location.href = link
				Swal.fire(
				'Processing!',
				'Order place to process.',
				'success'
				)
			}
    })
  });


  $('#processing').on('click', function() {
    Swal.fire({
      title: 'Are you sure to confirm?',
      text: 'Once you delivered, you will not be processing again!',
      showCancelButton: true,
      confirmButtonText: 'Delivered',
    }).then((result) => {
		if (result.isConfirmed) {
				window.location.href = link
				Swal.fire(
				'Delivered!',
				'Order Delivered',
				'success'
				)
			}
    })
  });
</script>

</body>
</html>