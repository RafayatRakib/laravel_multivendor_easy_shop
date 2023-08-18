@extends('frontend.master')
@section('title', 'Easy Shop | My address')
    
@section('content')
 
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-3 mb-lg-0">
                                    <div class="card-header">
                                        <h3 class="mb-0">Billing Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <address>
                                            3522 Interstate<br />
                                            75 Business Spur,<br />
                                            Sault Ste. <br />Marie, MI 49783
                                        </address>
                                        <p>New York</p>
                                        <a href="#" class="btn-small">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Shipping Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <address>
                                            4299 Express Lane<br />
                                            Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                        </address>
                                        <p>Sarasota</p>
                                        <a href="#" class="btn-small">Edit</a>
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