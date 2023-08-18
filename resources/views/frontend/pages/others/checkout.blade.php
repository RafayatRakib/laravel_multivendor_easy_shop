@extends('frontend.master')
@section('title', 'Easy Shop | Checkout')
@section('content')
<script src="{{asset('public/frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<div class="page-header breadcrumb-wrap">
   <div class="container">
      <div class="breadcrumb">
         <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
         <span></span> Checkout
      </div>
   </div>
</div>
<div class="container mb-80 mt-50">
   <div class="row">
      <div class="col-lg-8 mb-40">
         <h3 class="heading-2 mb-10">Checkout</h3>
         <div class="d-flex justify-content-between">
            <h6 class="text-body">There are products in your cart</h6>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-7">
         <div class="row">
            <h4 class="mb-30">Billing Details</h4>
            <form id="checkout-form" method="post" action="{{route('checkout.store')}}" >
               @csrf
               <div class="row">
                  <div class="form-group col-lg-6">
                     <input type="text" id="user_name" class="@error('user_name') is-invalid @enderror" value="{{Auth::user()->name}}" name="user_name" placeholder=" Name">
                     @error('user_name')<div class="text-danger">{{$message}}</div>@enderror
                  </div>
                  <div class="form-group col-lg-6">
                     <input type="email" id="user_email" value="{{Auth::user()->email}}" name="user_email" placeholder="Email *">
                  </div>
               </div>
               <div class="row shipping_calculator">
                  <div class="form-group col-lg-6">
                     <div class="custom_select">
                        <select id="user_divishion" class="form-control select-active @error('user_divishion') is-invalid @enderror" name="user_divishion" id="user_divishion">
                           <option selected disabled>Select Division</option>
                           @foreach ($division as $item)
                           <option value="{{$item->id}}">{{$item->division_name}}</option>
                           @endforeach
                        </select>
                     @error('user_divishion')<div class="text-danger">{{$message}}</div>@enderror

                     </div>
                  </div>
                  <div class="form-group col-lg-6">
                     <input class="@error('user_phone') is-invalid @enderror" type="text" value="{{Auth::user()->phone}}" name="user_phone" id="user_phone" placeholder="Phone">
                     @error('user_phone')<div class="text-danger">{{$message}}</div>@enderror
                     
                  </div>
               </div>
               <div class="row shipping_calculator">
                  <div class="form-group col-lg-6">
                     <div class="custom_select">
                        <select  disabled class="form-control select-active" name="user_district" id="user_district">
                           <option selected disabled>Select District</option>
                        </select>
                     @error('user_district')<div class="text-danger">{{$message}}</div>@enderror
                     </div>
                  </div>
                  <div class="form-group col-lg-6">
                     <input  type="text" name="user_post_code" placeholder="Post Code *">
                  </div>
               </div>
               <div class="row shipping_calculator">
                  <div class="form-group col-lg-6">
                     <div class="custom_select">
                        <select disabled class="form-control select-active" name="user_upazila" id="user_upazila">
                           <option selected disabled>Select Upazila</option>
                        </select>
                     @error('user_upazila')<div class="text-danger">{{$message}}</div>@enderror
 
                     </div>
                  </div>
                  <div class="form-group col-lg-6"> 
                     <input class="@error('user_address') is-invalid @enderror"  type="text" value="{{Auth::user()->address}}" name="user_address" id="user_address" placeholder="Address *">
                     @error('user_address')<div class="text-danger">{{$message}}</div>@enderror
 
                  </div>
               </div>
               <div class="form-group mb-30">
                  <textarea name="user_additional_info" rows="5" placeholder="Additional information (Optional)"></textarea>
               </div>
         </div>
      </div>
      <div class="col-lg-5">
         <div class="border p-40 cart-totals ml-30 mb-50">
            <div class="d-flex align-items-end justify-content-between mb-30">
               <h4>Your Order</h4>
               <h6 class="text-muted">Subtotal</h6>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="table-responsive order_table checkout">
               <table class="table no-border">
                  <tbody>
                     @foreach ($cartdata['cart'] as $item)
                     <tr>
                        <td class="image product-thumbnail"><img style="width: 85px; height: 60px" src="{{$item->product->product_cover}}" alt="#"></td>
                        <td>
                           <h6 class="w-160 mb-5"><a href="{{url('product/details/'.$item->product->id.'/'. $item->product->product_slug)}}" class="text-heading"> {{$item->product->product_name}} </a></h6>
                           </span>
                           <div class="product-rate-cover">
                              <strong>Color : {{$item->color}} </strong>
                              <strong>Size : {{$item->size}}</strong>
                           </div>
                        </td>
                        <td>
                           <h6 class="text-muted pl-20 pr-20">x {{$item->quantity}} </h6>
                        </td>
                        <td>
                           <h4 class="text-brand">${{($item->product->discount_price ?$item->product->selling_price - $item->product->discount_price : $item->product->selling_price) * $item->quantity }}</h4>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <table class="table no-border">
                  <tbody>
                     <tr>
                        <td class="cart_total_label">
                           <h6 class="text-muted">Subtotal</h6>
                        </td>
                        <td class="cart_total_amount">
                           <p class="text-brand text-end"> $ </p>
                        </td>
                        <td class="cart_total_amount">
                           <h4 class="text-brand text-end">{{$cartdata['subtotal']}}</h4>
                        </td>
                     </tr>
                     @if (Session()->has('coupon'))
                     <tr>
                        <td class="cart_total_label">
                           <h6 class="text-muted">Coupn Name</h6>
                        </td>
                        <td class="cart_total_amount">
                           <p class="text-brand text-end"> code </p>
                        </td>
                        <td class="cart_total_amount">
                           <h6 class="text-brand text-end"> {{Session()->get('coupon')['coupon_code']}} </h6>
                        </td>
                     </tr>
                     <tr>
                        <td class="cart_total_label">
                           <h6 class="text-muted">Coupon Discount</h6>
                        </td>
                        <td class="cart_total_amount">
                           <p class="text-brand text-end"> $ </p>
                        </td>
                        <td class="cart_total_amount">
                           <h4 class="text-brand text-end"> {{$cartdata['discount']}} </h4>
                        </td>
                     </tr>
                     <tr>
                        @endif
                        <td class="cart_total_label">
                           <h6 class="text-muted">Delivery</h6>
                        </td>
                        <td class="cart_total_amount">
                           <p class="text-brand text-end"> $ </p>
                        </td>
                        <td class="cart_total_amount">
                           <h4 class="text-brand text-end"> {{$cartdata['delevarycharg']}} </h4>
                        </td>
                     </tr>
                     <tr>
                        <td class="cart_total_label">
                           <h6 class="text-muted">Grand Total</h6>
                        </td>
                        <td class="cart_total_amount">
                           <p class="text-brand text-end"> $ </p>
                        </td>
                        <td class="cart_total_amount">
                           <h4 class="text-brand text-end">{{$cartdata['total'] + $cartdata['delevarycharg']}}</h4>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="payment ml-30">
            <h4 class="mb-30">Payment</h4>
            <div class="payment_option">
               <div class="custome-radio">
                   <input class="form-check-input"  value="stripe" type="radio" name="payment_option" id="exampleRadios3" checked="">
                   <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Mobile Banking(bKas/Rocekt/Nagod)</label>
               </div>
               <div class="custome-radio">
                   <input class="form-check-input" value="cash" type="radio" name="payment_option" id="exampleRadios4" checked="">
                   <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
               </div>
               <div class="custome-radio">
                   <input class="form-check-input"  value="card" type="radio" name="payment_option" id="exampleRadios5" checked="">
                   <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Getway</label>
               </div>
           </div>
           @error('payment_option')<div class="text-danger">{{$message}}</div>@enderror

            <div class="payment-logo d-flex">
               <img class="mr-15" src="{{asset('public/frontend/assets/imgs/theme/icons/payment-paypal.svg')}}" alt="">
               <img class="mr-15" src="{{asset('public/frontend/assets/imgs/theme/icons/payment-visa.svg')}}" alt="">
               <img class="mr-15" src="{{asset('public/frontend/assets/imgs/theme/icons/payment-master.svg')}}" alt="">
               <img src="{{asset('public/frontend/assets/imgs/theme/icons/payment-zapper.svg')}}" alt="">
            </div>
            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
         </div>
      </form>

      </div>
   </div>
</div>
<script>

//     


$(document).ready(function() {
  $("#checkout-form").validate({
    rules: {
      user_name: {
        required: true,
      },
      user_email: {
        required: true,
      },
      user_divishion: {
        required: true,
      },
      user_phone: {
        required: true,
      },
      user_district: {
        required: true,
      },
      user_upazila: {
        required: true,
      },
      user_address: {
        required: true,
      },


    },
    messages: {
      user_name: {
        required: "<p class='text-danger'>Please enter your name</p> ",
      },
      user_email: {
        required: "<p class='text-danger'>Please your email</p> ",
      },
      user_divishion: {
        required: "<p class='text-danger'>Please select Divishion</p> ",
      },
      user_phone: {
        required: "<p class='text-danger'>Please enter your phone number</p> ",
      },
      user_district: {
        required: "<p class='text-danger'>Please select district</p> ",
      },
      user_upazila: {
        required: "<p class='text-danger'>Please select upazila</p> ",
      },
      user_address: {
        required: "<p class='text-danger'>Please enter your address</p> ",
      },


    },
    errorElement: 'span', 
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function(element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    },
  });
});



</script>
@endsection