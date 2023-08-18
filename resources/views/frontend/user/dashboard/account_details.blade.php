@extends('frontend.master')
@section('title', 'Easy Shop | Account details')
@section('content')
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')

                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">
                                        
                                        <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>User Name <span class="required">*</span></label>
                                                    <input value="{{$userData->user_name}}" disabled class="form-control" name="uname" type="text" />
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label>Full Name <span class="required">*</span></label>
                                                    <input value="{{$userData->name}}" class="form-control" name="name" type="text" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input value="{{$userData->email}}" class="form-control" name="email" type="email" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Phone<span class="required">*</span></label>
                                                    <input value="{{$userData->phone}}" class="form-control" name="phone" type="text" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label> Address <span class="required">*</span></label>
                                                    <textarea name="address" id="" cols="30" rows="10">{{ $userData->address }}</textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Photo <span class="required">*</span></label>
                                                    <input  class="form-control" id="image" name="photo" type="file" />
                                                    
                                                </div>
                                                 <div class="form-group col-md-12">
                                                    
                                                <img id="showImage" src="{{ $userData->photo ? asset($userData->photo) : asset('public/uploads/no_image.jpg') }}" alt="Admin" class="rounded-square  p-1 bg-primary" width="110">

                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
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