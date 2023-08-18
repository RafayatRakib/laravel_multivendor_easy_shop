@extends('frontend.master')
@section('title', 'Easy Shop | Dashboard')
@section('content')
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4"></div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    @if (session('status'))
                                    <div class="alert alert-success"> 
                                        {{session('status')}}
                                    </div>
                                    @elseif(session('error'))
                                    <div class="alert alert-danger"> 
                                        {{session('error')}}
                                    </div>
                                    @endif
                                    <div class="card-header">
                                        <h3 class="mb-0">{{Auth::user()->name}}</h3>
                                        <img id="showImage" src="{{ $userData->photo ? asset($userData->photo) : asset('public/uploads/no_image.jpg') }}" alt="Admin" class="rounded-square p-1 bg-primary" style="border-radius: 50%;" width="110">

                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                            manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('public/admin/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
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
    
@endsection