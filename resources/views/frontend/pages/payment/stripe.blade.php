
@extends('frontend.master')
@section('title', 'Easy Shop | Stripe Payment')
@section('content')

<div class="container">

        <h1 class="text-center">Mobile Banking</h1>
        <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <div class="card">
                                <div class="card-body">
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
                                                         <h4 class="text-brand text-end">{{$subTotal}}</h4>
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
                                                         <h4 class="text-brand text-end"> <i class="fa-sharp fa-solid fa-dollar-sign"></i>{{$discount}} </h4>
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
                                                         <h4 class="text-brand text-end"> {{$delevaryCharg}} </h4>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td class="cart_total_label">
                                                         <h6 class="text-muted">Grand Total</h6>
                                                      </td>
                                                      <td class="cart_total_amount">
                                                         <p class="text-brand text-end">  </p>
                                                      </td>
                                                      <td class="cart_total_amount">
                                                         <h4 class="text-brand text-end">${{$Total}}</h4>
                                                      </td>
                                                   </tr>
                                                </tbody>
                                             </table>
                                             
                                             <button id="sslczPayBtn"
                                                        token="if you have any token validation"
                                                        postdata=""
                                                        order="If you already have the transaction generated for current order"
                                                        endpoint="/pay-via-ajax" class="btn btn-fill-out btn-block mt-30"> Pay Now
                                                </button>
                                </div>
                        </div>  
                </div>
                <div class="col-md-4"></div>
        </div>
        {{-- <button id="sslczPayBtn"
        token="if you have any token validation"
        postdata=""
        order="If you already have the transaction generated for current order"
        endpoint="/pay-via-ajax"> Pay Now
</button> --}}

{{-- <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn">Pay Now</button> --}}



</div>
@endsection