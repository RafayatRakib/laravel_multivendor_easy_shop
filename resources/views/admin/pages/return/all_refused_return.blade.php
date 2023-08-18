@extends('admin.admin_master')
@section('title','Pending Return')
@section('admin')

{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Return Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>Refuse Reson</h3>
          <p id="refusereson"> </p>
          <div class="container">
             <div id="image_view">
             </div>
          </div>
           
           
 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {{-- <input type="hidden" id="return_id" value="">
          <button onclick="modalHide()" type="button" data-bs-toggle="modal" data-bs-target="#refuseMOdal" class="btn btn-info" title="Details">Refuse </button>
          <button type="button" class="btn btn-danger">Process Return</button> --}}
        </div>
      </div>
    </div>
  </div>
 
{{-- end modal --}}

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       <div class="breadcrumb-title pe-3">All Pending Return</div>
       <div class="ps-3">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Pending Return</li>
             </ol>
          </nav>
       </div>
       <div class="ms-auto">
          <div class="btn-group">
          </div>
       </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    <div class="card">
       <div class="card-body">
          <div class="table-responsive">
             <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                   <tr>
                      <th>Sl</th>
                      <th>Date </th>
                      <th>Product </th>
                      <th>User Name </th>
                      <th>Vendor  </th>
                      <th>Invoice </th>
                      <th>Amount </th>
                      <th>Payment </th>
                      <th>State </th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($return as $key => $item)		
                   <tr>
                      <td> {{ $key+1 }} </td>
                      <td>{{ $item->order->order_date }}</td>
                      <td>{{ $item->product->product_name }}</td>
                      <td>{{ $item->user->user_name }}</td>
                      <td>{{ $item->vendor->user_name }}</td>
                      <td>{{ $item->order->invoice_no }}</td>
                      <td>${{ $item->price }}</td>
                      <td>{{ $item->order->payment_method }}</td>
                      <td> <span class="badge rounded-pill bg-danger"> {{ $item->cancel_status }}</span></td>
                      <td>
                         <button onclick="refusedDetails({{$item->id}})" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </button>
                        
                      </td>
                   </tr>
                   @endforeach
                </tbody>
                <tfoot>
                   <tr>
                    <th>Sl</th>
                    <th>Date </th>
                    <th>Product </th>
                    <th>User Name </th>
                    <th>Vendor  </th>
                    <th>Invoice </th>
                    <th>Amount </th>
                    <th>Payment </th>
                    <th>State </th>
                    <th>Action</th>
                   </tr>
                </tfoot>
             </table>
          </div>
       </div>
    </div>
 </div>


 <script>
    function refusedDetails(id){
        // var reson = $('#reson').val();
        // var image_view = $('#image_view').val();
        $.ajax({
            type:'get',
            dataType:'json',
            url: `{{url('/admin/return/details/${id}')}}`,
            success:function(data){
                $('#refusereson').text(data.return.cancle_reson);

                var imgs = '';
                $.each(data.imgages,function(key,value){
                    imgs += `
                    <img src="{{asset('${value.images}')}}" class="img-thumbnail gallery-img">
                    `
                });
                $('#image_view').html(imgs);
            },
            error: function(xhr, status, error) {
                console.log("Ajax error : "+ error);
            }
        })
    }
 </script>
@endsection