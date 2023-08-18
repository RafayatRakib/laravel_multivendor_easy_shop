@extends('vendor.vendor_master')
@section('title','Return Order')
@section('vendor')
<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">All Vendor Return Order</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Vendor Return Order</li>
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
                      <th>Invoice </th>
                      <th>Product Name </th>
                      <th>Amount </th>
                      <th>QTY </th>
                      <th>Payment </th>
                      <th>Status </th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($orderitem as $key => $item)		
                  @if ($item->order->return_order==1)

                   <tr>
                      <td> {{ $key+1 }} </td>
                      <td>{{ $item['order']['order_date'] }}</td>
                      <td>{{ $item['order']['invoice_no'] }}</td>
                      <td>{{ $item->product->product_name }}</td>
                      <td>${{ $item->price }}</td>
                      <td>{{ $item->qty }}</td>
                      <td>{{ $item['order']['payment_method'] }}</td>
                      <td>
                     <span class="badge rounded-pill bg-danger">Return</span>
                        
                        {{-- @if ($item->order->status == 'pending')
                     <span class="badge rounded-pill bg-warning">Pending</span>
                     @elseif($item->order->status == 'confirm')
                     <span class="badge rounded-pill bg-info">Confirm</span>
                     @elseif($item->order->status == 'processing')
                     <span class="badge rounded-pill bg-danger">Processing</span>
                     @elseif($item->order->status == 'deliverd')
                     <span class="badge rounded-pill bg-success">Deliverd</span>
                     @endif --}}
                    
                    </td>
                      <td>
                         <a href=" " class="btn btn-info" title="Details"><i class="fa fa-eye"></i> </a>
                      </td>
                   </tr>
                @endif

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
@endsection