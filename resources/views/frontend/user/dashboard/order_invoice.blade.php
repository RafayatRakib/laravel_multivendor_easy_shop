<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 10px 0 10px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Shop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               EasyShop Head Office
               Email:support@shop.com <br>
               Mob: 1245454545 <br>
               Uttora #C/7 <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{$order->name}} <br>
           <strong>Email:</strong> {{$order->email}} <br>
           <strong>Phone:</strong> {{$order->phone}} <br>
            
           <strong>Address:</strong> {{$order->district->district_name.','.$order->upazila->upazila_name.','.$order->adress}} <br>
            @if ($order->postcod)
            <strong>Post Code:</strong> Post Code
            @endif
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{$order->invoice_no}}</h3>
             Order Date: {{$order->order_date}} <br>
             Delivery Date: Delivery Date <br>
             Payment Type : {{$order->payment_type}} </span>
             @if ($order->transaction_id)
             Trx ID: {{$order->transaction_id}}
             @endif
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>SL</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

     @foreach ( $order_item as $key => $order_item)
         
      <tr class="font">
        <td align="center">{{$key+1}}</td>
        <td align="center">
            <img src=" {{asset($order_item->product->product_cover)}}" style="width: 50px; height:50 " alt="">
        </td>
        <td align="center">{{$order_item->product->product_name}}</td>
        <td align="center">
            {{$order_item->size}}
        </td>
        <td align="center">{{$order_item->color}}</td>
        <td align="center">{{$order_item->product->product_code}}</td>
        <td align="center">{{$order_item->qty}}</td>
        <td align="center">&dollar; {{$order_item->product->discount_price ?($order_item->product->selling_price - $order_item->product->discount_price) : $order_item->product->selling_price }}</td>
        <td align="center">&dollar; {{$order_item->product->discount_price ?($order_item->product->selling_price - $order_item->product->discount_price)* $order_item->qty : $order_item->product->selling_price * $order_item->qty}}</td>
      </tr>
     @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >

            <h2><span style="color: green;">Subtotal:</span> {{$order->amount}} </h2>
            <h2><span style="color: green;">Delevary Charg:</span> {{$order->delevarycharg}} </h2>
            <h2><span style="color: green;">Total:</span> {{$order->amount+$order->delevarycharg}} </h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>