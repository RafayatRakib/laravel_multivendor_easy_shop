@extends('frontend.master')
@section('title', 'Easy Shop | Order')
    
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
                                    <h3 class="mb-0">Your Orders</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Date</th>
                                                    {{-- <th>Product</th> --}}
                                                    <th>Total</th>
                                                    <th>Payment</th>
                                                    <th>Invoice</th>
                                                    <th>Status</th>
                                                    <th >Details</th>
                                                    <th >Download Invoice</th>
                                                    <th>Rate and Review</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order as $key => $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->order_date}}</td>
                                                    <td> ${{$item->amount}} </td>
                                                    <td> {{$item->payment_type}} </td>
                                                    <td> {{$item->invoice_no}} </td>
                                                    <td> 
                                                        @if ($item->status == 'pending')
                                                        <span class="badge rounded-pill bg-warning">Pending</span>
                                                        @elseif($item->status == 'confirm')
                                                        <span class="badge rounded-pill bg-info">Confirm</span>
                                                        @elseif($item->status == 'processing')
                                                        <span class="badge rounded-pill bg-danger">Processing</span>
                                                        @elseif($item->status == 'deliverd')
                                                        <span class="badge rounded-pill bg-success">Deliverd</span>
                                                        @endif
                                                    </td>
                                                    <td >
                                                        <a href="{{route('orderDetails',$item->id)}}" class="btn-sm btn-danger "> <i  class="my-2 fa fa-eye"></i> </a>
                                                        
                                                    </td>     
                                                    <td><a href="{{route('user.order.invoice',$item->id)}}" class="btn-sm btn-info "> <i class="fa fa-download"></i> </a></td>                                              
                                                    <td> <a href="{{route('user.review',$item->id)}}"> <i  class=" fa fa-star"></i><i  class=" fa fa-star"><i  class=" fa fa-star"></a></td>

                                                </tr>
                                                @endforeach
        
                                            </tbody>
                                        </table>
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