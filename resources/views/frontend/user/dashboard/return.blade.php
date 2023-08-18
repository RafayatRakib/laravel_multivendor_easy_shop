@extends('frontend.master')
@section('title', 'Easy Shop | Return')
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

<div class="container">
    <div class="row mt-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
               <div class="text-center">

                  <img class="rounded-circl" style="width: 80px; height:70 " src="{{asset($order_item->product->product_cover)}}" alt="" srcset="product image">
                  
               </div>
                <table>
                    <tr>
                       <th> <strong>Product Name:</strong> </th>
                       <th> <strong>{{$order_item->product->product_name}}</strong> </th>
                    </tr>
                    <tr>
                     <th> <strong>Sold Price:</strong> </th>
                     <th> <strong> &dollar;{{$order_item->price.strtoupper('usd')}}  </strong> </th>
                  </tr>
                    <tr>
                        <th> <strong>Product Code:</strong> </th>
                        <th> <strong>{{$order_item->product->product_code}}</strong> </th>
                     </tr>
                     <tr>
                        <th> <strong>Invoice Code:</strong> </th>
                        <th> <strong>{{$order_item->order->invoice_no}}</strong> </th>
                     </tr>
                     <tr>
                        <th> <strong>Venodr Name:</strong> </th>
                        <th> <strong>{{$order_item->user->user_name}}</strong> </th>
                     </tr>
                     <tr>
                        <th> <strong>Size </strong> </th>
                        <th> <strong>{{$order_item->size}}</strong> </th>
                     </tr>

                     <tr>
                        <th> <strong>Color:</strong> </th>
                        <th> <strong>{{$order_item->color}}</strong> </th>
                     </tr>

                     <tr>
                        <th> <strong>QTY:</strong> </th>
                        <th> <strong>{{$order_item->qty}}</strong> </th>
                     </tr>
                        
                 </table>
                 <div class="container">
                 <h4>Please explain here where is the problem you face?</h4>
                 <form action="{{route('user.return.request',$order_item->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                 <div class="input-group my-3"> 
                     <textarea name="reason_for_return" id="reason_for_return" cols="30" rows="10" placeholder="Ex: This product is broken, so please exchange it" ></textarea>
                 </div> 
                 <div class="input-group my-3">
                     <input type="file" name="return_images[]" id="return_images" multiple class="form-control" placeholder="select mulpale image">
                  </div>
                  <button type="submit" class="btn btn-success btn-sm my-3">Request Return</button>
               </form>
               </div>
         </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

@endsection