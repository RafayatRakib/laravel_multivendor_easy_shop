@extends('frontend.master')
@section('title', 'Easy Shop | Dashboard')
@section('content')



<style>
   .card{
   margin: auto;
   width: 85%;
   max-width:90%;
   padding: 4vh 0;
   box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
   border-top: 3px solid #3BB77E;
   border-bottom: 3px solid #3BB77E;
   border-left: none;
   border-right: none;
   }
   #card{
      margin-top: 70px;
   }
   /* textarea{
      box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);

   } */
   @media(max-width:768px){
   .card{
   width: 90%;
   margin: auto;

   }
   }
   .title{
   color: #3BB77E;
   font-weight: 600;
   margin-bottom: 2vh;
   padding: 0 8%;
   font-size: initial;
   }
   #details{
   font-weight: 400;
   }
   .info{
   padding: 5% 8%;
   }
   .info .col-5{
   padding: 0;
   }
   #heading{
   color: grey;
   line-height: 6vh;
   }
   .pricing{
   background-color: #ddd3;
   padding: 2vh 8%;
   font-weight: 400;
   line-height: 2.5;
   }
   .pricing .col-3{
   padding: 0;
   }
   .total{
   padding: 2vh 8%;
   color: #3BB77E;
   font-weight: bold;
   }
   .total .col-3{
   padding: 0;
   }
   .footer{
   padding: 0 8%;
   font-size: x-small;
   color: black;
   }
   .footer img{
   height: 5vh;
   opacity: 0.2;
   }
   /* .footer a{
   color: #3BB77E;
   } */
   .footer .col-10, .col-2{
   display: flex;
   padding: 3vh 0 0;
   align-items: center;
   }
   .footer .row{
   margin: 0;
   }
</style>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="{{route('user.orders')}}" rel="nofollow">Order</a><span></span> Order Details
        </div>
    </div>
</div>
<div class="mt-4">
   <div class="row my-3">
      <div class="col-md-6">
         <div class="card">
            <div class="title">Shipping Details</div>
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
      <div class="col-md-6">
         <div class="card">
            <div class="title">Order Items</div>
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
                  <div class="col-9">
                     <span id="name"> <a   href="{{url('product/details/'.$item->product->id.'/'.$item->product->product_slug)}}"> {{$item->product->product_name.' (x'.$item->qty.')'}} </a></span>  
                  </div>
                  <div class="col-3">
                     <span class="text-bold" id="price">&dollar; {{$item->product->discount_price ?($item->product->selling_price - $item->product->discount_price)* $item->qty : $item->product->selling_price * $item->qty}}</span>
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
         </div>
         <a href="{{route('user.orders')}}" class="ml-50 btn btn-fill-out btn-block mt-30">See Order<i class="fi-rs-sign-out ml-15"></i></a>
      </div>
   </div>

   @if ($order->status == 'deliverd')
       
   {{-- <div class="container p-5 m-3">
      <h3 class="py-3">Explain here why you retrurn your product?</h3>
      <form action="" method="post">
         @csrf
         <textarea name="" id="" cols="10" rows="2"></textarea>
         <button type="submit" class=" btn btn-fill-out btn-block mt-30">Submit Resons<i class="fi-rs-sign-out ml-15"></i></button>
      </form>
   </div> --}}

      <div id="card" class="card p-3 ml-4">
          <table >
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
                  <th>Action</th>

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
                  <td>
                     @php
                       $return=  App\Models\Retrurn::where('product_id', $item->product_id)->where('order_id',$item->order_id)->first();
                     @endphp
                     @if (!is_null($return))
                     {{-- <button disabled class="btn btn-sm btn-info" ><i class="fas fa-check-circle"></i> Requested </button> --}}
                     <a  disabled class="btn btn-sm  btn-info" style="font-size:10px; background: rgb(0, 184, 240)"><i class="fa-light fa-check"></i>Requested </a>
                         
                     @else
                     <a href="{{route('user.return', $item->product_id)}}" class="btn btn-sm" style="background: rgb(218, 45, 45)"><i class="fas fa-exchange"></i> Return </a>
                         
                     @endif
                  
                  </td>

                  
              </tr>
              @endforeach
          </table>
      </div>
  </div>
   @endif
@endsection