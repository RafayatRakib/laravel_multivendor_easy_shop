@extends('frontend.master')
@section('title', 'Easy Shop | Cash Payment')
@section('content')

<div class="page-header breadcrumb-wrap">
   <div class="container">
      <div class="breadcrumb">
         <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
         <span></span> Cash On Delivery
      </div>
   </div>
</div>
<div class="container mb-80 mt-50">
   <div class="row">
      <div class="col-lg-8 mb-40">
         <h3 class="heading-2 mb-10">Cash On Delivery Payment</h3>
         <div class="d-flex justify-content-between">
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="border p-40 cart-totals ml-30 mb-50">
            <div class="d-flex align-items-end justify-content-between mb-30">
               <h4>Your Order Details</h4>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="table-responsive order_table checkout">
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
                             <h4 class="text-brand text-end">{{$cartdata['total']+$cartdata['delevarycharg']}}</h4>
                          </td>
                       </tr>
                    </tbody>
                 </table>
            </div>
         </div>
      </div>
      <!-- // end lg md 6 -->
      <div class="col-lg-6">
         <div class="border p-40 cart-totals ml-30 mb-50">
            <div class="d-flex align-items-end justify-content-between mb-30">
               <h4>Make Cash Payment </h4>
            </div>
            <div class="divider-2 mb-30"></div>
            <div class="table-responsive order_table checkout">
               
               <form action="{{ route('cash.order') }}" method="post" >
                  @csrf                  
                  <div class="form-row">
                     <label for="card-element">
                     <input type="hidden" name="name" value="{{ $data['user_name'] }}">
                     <input type="hidden" name="email" value="{{ $data['user_email'] }}">
                     <input type="hidden" name="phone" value="{{ $data['user_phone'] }}">
                     <input type="hidden" name="division_id" value="{{ $data['user_divishion'] }}">
                     <input type="hidden" name="district_id" value="{{ $data['user_district'] }}">
                     <input type="hidden" name="upazila_id" value="{{ $data['user_upazila'] }}">
                     <input type="hidden" name="address" value="{{ $data['user_address'] }}">
                     <input type="hidden" name="post_code" value="{{ $data['user_post_code'] }}">
                     <input type="hidden" name="notes" value="{{ $data['user_additional_info'] }}">
                     </label>
                     <!-- Used to display form errors. -->
                  </div>
                  <br>
                  <button class="btn btn-primary">Confirm  Order</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection