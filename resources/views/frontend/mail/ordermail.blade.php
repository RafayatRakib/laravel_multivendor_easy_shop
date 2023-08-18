
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
   <head>
      <title>
      </title>
      <!--[if !mso]><!-- -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!--<![endif]-->
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

      <style>
         .card{
         margin: auto;
         width: 50%;
         max-width:600px;
         padding: 4vh 0;
         box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
         border-top: 3px solid #3BB77E;
         border-bottom: 3px solid #3BB77E;
         border-left: none;
         border-right: none;
         }
         @media(max-width:768px){
         .card{
         width: 90%;
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
         .footer a{
         color: #3BB77E;
         }
         .footer .col-10, .col-2{
         display: flex;
         padding: 3vh 0 0;
         align-items: center;
         }
         .footer .row{
         margin: 0;
         }
      </style>
   </head>
   <body style="background-color:#f9f9f9;">

            <div class="card">
                  <div class="title">Order Items</div>
                  <div class="info">
                     <div class="row">
                        <div class="col-7">
                           <span id="heading"><strong>Date</strong></span><br>
                           <span id="details"><strong>{{$data['order_date']}}</strong></span>
                        </div>
                        <div class="col-5 pull-right">
                           <span id="heading"><strong>Invoice No</strong></span><br>
                           <span id="details"><strong>{{$data['invoice_no']}}</strong></span>
                        </div>
                     </div>
                  </div>
                  <div class="pricing">
                     @foreach ($data['item'] as $item)
                     {{-- <h1>{{$item->product->product_name}}</h1> --}}
                     {{-- <div class="row">
                        <div class="col-9">
                           <span id="name"> {{$item->product->product_name}} </span>  
                        </div>
                        <div class="col-3">
                           <span class="text-bold" id="price">&dollar; {{$item->product->discount_price ?($item->product->selling_price - $item->product->discount_price)* $item->qty : $item->product->selling_price* $item->qty}}</span>
                        </div>
                     </div> --}}
                     <div class="row">
                        <div class="col-9">
                           <span id="name"> {{$item->product->product_name}} </span>  
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
                           <span id="price">&dollar; {{$data['delevarycharg']}} </span>
                        </div>
                     </div>
                  </div>
                  <div class="total">
                     <div class="row">
                        <div class="col-9"><span id="name">Total</span></div>
                        <div class="col-3"><big>&dollar; {{$data['amount']}} </big></div>
                     </div>
                  </div>
               </div>
         </div>
      </div>




      {{-- <div class="card">
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
                  <span id="name"> {{$item->product->product_name}} </span>  
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
                  <span id="price">&dollar; {{$cart['delevarycharg']}} </span>
               </div>
            </div>
         </div>
         <div class="total">
            <div class="row">
               <div class="col-9"><span id="name">Total</span></div>
               <div class="col-3"><big>&dollar; {{$order->amount}} </big></div>
            </div>
         </div>
      </div> --}}



   </body>
</html>




                                                   {{-- <td> Invoice No : {{ $data['invoice_no'] }}</td>
                                                    <td> Amount : {{ $data['amount'] }}</td>
                                                    <td> Name : {{ $data['name'] }}</td>
                                                    <td> Email : {{ $data['email'] }}</td> --}}