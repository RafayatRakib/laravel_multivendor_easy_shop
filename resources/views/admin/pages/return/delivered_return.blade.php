@extends('admin.admin_master')
@section('title','Deliverd Return')
@section('admin')



<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       <div class="breadcrumb-title pe-3">All Deliverd Return</div>
       <div class="ps-3">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Deliverd Return</li>
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
                      {{-- <th>Action</th> --}}
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
                         {{-- <button onclick="proccess2deleviry({{$item->id}})" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </button> --}}
                         {{-- <a href="{{route('confirmed2proccess', $item->id)}}" class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a> --}}
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
                      {{-- <th>Action</th> --}}
                   </tr>
                </tfoot>
             </table>
          </div>
       </div>
    </div>
 </div>

 <script> 
function proccess2deleviry(id){

    Swal.fire({
  title: 'Do you want to proccess it?',
  showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'proccess',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Delevired successfully!', '', 'success')

    $.ajax({
    type: 'get',
    dataType: 'json',
    url: `{{url('/admin/proccess/to/deleviry/${id}')}}`,
    success: function(data){
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

location.reload();

  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
    


}
</script>

 
@endsection