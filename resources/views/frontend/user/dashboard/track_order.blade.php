@extends('frontend.master')
@section('title', 'Easy Shop | Order Track')
@section('content')

<div class="page-content pt-50 pb-50">
    <div class="container">

        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    @include('frontend.user.dashboard.dashboard_sidebar')

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Orders tracking</h3>
                            </div>
                            <div class="card-body contact-from-area">
                                <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                            <div class="input-style mb-20">
                                                <label>Order ID</label>
                                                <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                            </div>
                                            <div class="input-style mb-20">
                                                <label>Billing email</label>
                                                <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                            </div>
                                            <button class="submit submit-auto-width" type="submit">Track</button>
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