@extends('admin.admin_master')
@section('title','Order Details')
@section('admin')



 <div class="mt-4">

  <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
    <div class="col">
        <div class="card m-3 p-3">
             <div class="title"><h3>Shipping Details</h3></div>
             <table>
                <tr>
                   <th> <strong>Name:</strong> </th>
                   <th> <strong>{{$order->name}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Phone:</strong> </th>
                   <th> <strong>{{$order->phone}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Email:</strong> </th>
                   <th> <strong>{{$order->email}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Address:</strong> </th>
                   <th> <strong>{{$order->district->district_name.','.$order->upazila->upazila_name.','.$order->adress}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Payment: </strong> </th>
                   <th> <strong>{{$order->payment_type}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Amount:</strong> </th>
                   <th> <strong>${{$order->amount .strtoupper($order->currency)}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Order Number:</strong> </th>
                   <th> <strong>{{$order->order_number}}</strong> </th>
                </tr>
                @if ($order->transaction_id)
                <tr>
                   <th> <strong>Trx ID:</strong> </th>
                   <th> <strong>{{$order->transaction_id}}</strong> </th>
                </tr>
                @endif
                <tr>
                   <th> <strong>Invoice No:</strong> </th>
                   <th> <strong>{{$order->invoice_no}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Order Date:</strong> </th>
                   <th> <strong>{{$order->order_date}}</strong> </th>
                </tr>
                <tr>
                   <th> <strong>Order Status:</strong> </th>
                   <th> <strong>
                      @if ($order->status == 'pending')
                      <span class="badge rounded-pill bg-warning">Pending</span>
                      @elseif($order->status == 'confirm')
                      <span class="badge rounded-pill bg-info">Confirm</span>
                      @elseif($order->status == 'processing')
                      <span class="badge rounded-pill bg-danger">Processing</span>
                      @elseif($order->status == 'deliverd')
                      <span class="badge rounded-pill bg-success">Deliverd</span>
                      @endif
                      </strong> 
                   </th>
                </tr>
             </table>
          </div>
    </div>
    <div class="col">
        <div class="card m-3 p-3">
            <div class="title"><h3>Order Items</h3></div>
            <div class="info">
               <div class="row">
                  <div class="col-7">
                     <span id="heading"><strong>Date</strong></span><br>
                     <span id="details"><strong>{{$order->order_date}}</strong></span>
                  </div>
                  <div class="col-5 pull-right">
                     <span id="heading"><strong>Invoice No</strong></span><br>
                     <span id="details"><strong>{{$order->invoice_no}}</strong></span>
                  </div>
               </div>
            </div>
            <div class="pricing">
               @foreach ($order_item as $item)
               <div class="row">
                {{-- <div class="col-3">
                    <img class="rounded-circl" style="width: 50px; height:50 " src="{{asset($item->product->product_cover)}}" alt="" srcset="product image">
                 </div> --}}
                  <div class="col-9">
                     <span id="name"> {{$item->product->product_name.' (x'.$item->qty.')'}}</span>  
                  </div>
                  <div class="col-3">
                     <span class="text-bold" id="price"> &dollar; {{$item->product->discount_price ?($item->product->selling_price - $item->product->discount_price)* $item->qty : $item->product->selling_price * $item->qty}}</span>
                  </div>
               </div>
               @endforeach
               <div class="row">
                  <div class="col-9">
                     <span id="name">Shipping</span>
                  </div>
                  <div class="col-3">
                     <span id="price">&dollar; {{$order['delevarycharg']}} </span>
                  </div>
               </div>
            </div>
            <div class="total">
               <div class="row">
                  <div class="col-9"><span id="name">Total</span></div>
                  <div class="col-3"><big>&dollar; {{$order->amount+$order['delevarycharg']}} </big></div>
               </div>
            </div>

            
                  @if ($order->status == 'pending')
                     <a  id="pending" href="{{route('pending.to.process',$order->id)}}" class="btn btn-warning mt-3"><i class="fa-solid fa-sack-dollar"></i>Confirom Order</a>
                  @elseif($order->status == 'confirm')
                     <a id="confirm" href="{{route('confirom.to.process',$order->id)}}" class="btn btn-info mt-3"><i class="fa-solid fa-sack-dollar"></i>Process Order</a>
                  @elseif($order->status == 'processing')
                     <a id="processing" href="{{route('delivered.to.process',$order->id)}}" class="btn btn-danger mt-3"><i class="fa-solid fa-sack-dollar"></i>Deliverd Order</a>
                  @elseif($order->status == 'delivered')
                     <a  class="btn btn-success disabled mt-3"><i class="fa-solid fa-sack-dollar"></i> Order Delevared</a>
                  @endif
            
          
         </div>
    </div>
</div>
<div class="col">
    <div class="card p-3 m-3">
        <table>
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Product</th>
                <th>vendor Name</th>
                <th>Product Code</th>
                <th>Color</th>
                <th>Size</th>
                <th>QTY</th>
                <th>Price</th>
            </tr>
            @foreach ($order_item as $key => $item)
                
            <tr>
                <td>{{$key+1}}</td>
                <td> <img class="rounded-circl" style="width: 50px; height:50 " src="{{asset($item->product->product_cover)}}" alt="" srcset="product image"> </td>
                <td> <a href="{{url('product/details/'.$item->product->id.'/'.$item->product->product_slug)}}"> {{$item->product->product_name}} </a></th>
                <td>{{$item->user->name}}</td>
                <td>{{$item->product->product_code}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->qty}}</td>
                <td> &dollar;{{$item->price}}</td>
                
            </tr>
            @endforeach
        </table>
    </div>
</div>

 </div>



@endsection