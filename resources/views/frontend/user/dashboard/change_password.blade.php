@extends('frontend.master')
@section('title', 'Easy Shop | Change Password')
@section('content')
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3 class="mb-0">Change your password</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="{{route('user.store.password')}}" >
                                                @csrf
                                                <div class="row">
                                                   
                                                   <div class="form-group col-md-12">
                                                        <label>Old Password <span class="required">*</span></label>
                                                        <input class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" />
                                                        @error('old_password')<div class="text-danger"> {{$message}} </div> @enderror
                                                    </div> 
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input  class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" type="password" />
                                                        @error('password')<div class="text-danger"> {{$message}} </div> @enderror

                                                    </div> 
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input  class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{old('password_confirmation')}}" type="password" />
                                                        @error('password_confirmation')<div class="text-danger"> {{$message}} </div> @enderror

                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit"> Change Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    
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