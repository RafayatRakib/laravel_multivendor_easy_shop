@extends('admin.admin_master')
@section('title','Pending Return')
@section('admin')


{{-- modal start --}}
<div class="modal fade" id="refuseMOdal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Refuse Details</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <form type="post" id="return_form">
            @csrf
         <h3>Reson of Refuse</h3>
         {{-- <input type="text" name="refused_return"> --}}

            <textarea name="refused" id="refused" required cols="60" rows="10"></textarea>
            
         </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="hidden" id="return_id" value="">
            <button type="button" onclick="refused()" class="btn btn-danger">Refuse Return</button>
       </div>
     </div>
   </div>
 </div>






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Return Details</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         <h3>Return Reson</h3>
         <p id="reson"> </p>
         <div class="container">
            <div id="image_view">
            </div>
         </div>
          
          

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <input type="hidden" id="return_id" value="">
         <button onclick="modalHide()" type="button" data-bs-toggle="modal" data-bs-target="#refuseMOdal" class="btn btn-info" title="Details">Refuse </button>
         <button onclick="Confirmed()" type="button" class="btn btn-danger">Confirmed Return</button>
       </div>
     </div>
   </div>
 </div>

 {{-- modal end --}}

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
                      <td>{{ $item->order->invoice_no }}</td>
                      <td>${{ $item->price }}</td>
                      <td>{{ $item->order->payment_method }}</td>
                      <td> <span class="badge rounded-pill bg-success"> {{ $item->status }}</span></td>
                      <td>
                         <button onclick="returnDetails({{$item->id}})" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </button>
                         {{-- <a href="{{route('admin.order.details', $item->id)}}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a> --}}
                         {{-- <a href="{{route('admin.order.invoice',$item->id)}}" class="btn btn-danger"> <i class="fa fa-download"></i> Invoice</a> --}}
                      
                      </td>
                   </tr>
                   @endforeach
                </tbody>
                <tfoot>
                   <tr>
                      <th>Sl</th>
                      <th>Date </th>
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


 

 <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>



//  <img src="{{asset('${value.img.images}')}}" class="img-thumbnail gallery-img">
   function returnDetails(id){
      // alert(id);
      var reson = $('#reson').val();
      var image_view = $('#image_view').val();
      $.ajax({
         type:'get',
         dataType:'json',
         url: `{{url('/admin/return/details/${id}')}}`,
         success:function(data){
            $('#reson').text(data.return.reason_for_return);

            var imgs = '';
            $.each(data.imgages,function(key,value){
                  imgs += `
                  <img src="{{asset('${value.images}')}}" class="img-thumbnail gallery-img">
                  `
            });
            $('#image_view').html(imgs);
            $('#return_id').val(id);
         },
         error: function(xhr, status, error) {
            console.log("Ajax error : "+ error);
         }
      })
   }


   function modalHide(){
      $('#exampleModal').modal('hide');
      var id = $('#return_id').val();
        $('#return_id').val(id);
   }


   function refused(){
      var id = $('#return_id').val();
      var refused = $('#refused').val();
      // alert(id + refused);
      if(refused != null){

      $.ajax({
         type:'post',
         dataType:'json',
         data: {
            id:id,
            refused:refused
         },
         url: `{{url('/admin/refused/return')}}`,
         success:function(data){
            
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
         error: function(xhr, status, error) {
            console.log("Ajax error : "+ error);
         }
      })
   }else{
      alert('Enter reson');
   }

   }



   $(document).ready(function() {
      
  $("#return_form").validate({
   rules:{
      refused: {
         required: true
      }
   },
   messages: {
      refused: "<p class='text-danger'>Please enter reson</p>",
    }
  });

});


   function Confirmed(){
      var id = $('#return_id').val();

      $.ajax({
         type:'post',
         dataType:'json',
         data: {
            id:id,
         },
         url: `{{url('/admin/confirmed/return')}}`,
         success:function(data){
            
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

               location.reload();
         },
         error: function(xhr, status, error) {
            console.log("Ajax error : "+ error);
         }
      })
   }

</script>

@endsection