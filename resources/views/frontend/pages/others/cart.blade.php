
@extends('frontend.master')
@section('title', 'Easy Shop | Cart')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Cart
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Your Cart</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand" id="totalCartItem2"></span> products in your cart</h6>
                <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30"></th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody id="allcart">
                        
                       
                    </tbody>
                </table>
            </div>
           

            <div class="row mt-50">

                <div class="col-lg-5" >
                @if (Session::has('coupon'))
                @php
                    // session()->forget('coupon');
                @endphp
                    @else
                    <div class="p-40" id="coupon_apply_div">
                        <div class="coupon_removed">
                        <h4 class="mb-10">Apply Coupon</h4>
                        <p class="mb-30"><span class="font-lg text-muted">Using A Promo Code?</p>
                            
                                <div class="d-flex justify-content-between">
                                    <input class="font-medium mr-15 coupon" name="apply_coupon" id="apply_coupon" placeholder="Enter Your Coupon">
                                    <button class="btn" onclick="apply_coupon()" ><i class="fi-rs-label mr-10"></i>Apply</button>
                                </div>
                            </div>
                            </div>
                @endif
                  </div>


        <div class="col-lg-7">
        <div class="divider-2 mb-30"></div>
            
            <div class="border p-md-4 cart-totals ml-30">
                <div class="table-responsive">
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Subtotal</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <p class="text-brand text-end" >TK</p>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end" name="subtotal" id="subtotal"></h4>
                                </td>
                                
                            </tr>

                            <tr id="coupon_status_discount_show" >

                            @if (session()->has('coupon'))


                            <td class="cart_total_label">
                                <h6 class="text-muted">Coupon <a onclick="remove_coupon()"><i class="fa-solid fa-trash"></i></a> </h6>

                               </td>
                               <td class="cart_total_amount">
                                   <h4 class="text-brand text-end"> {{ session('coupon')['coupon_code'] }}  </h4>
                               </td>



                            {{-- <td class="cart_total_amount">
                                <p class="text-brand text-end" >TK</p>
                            </td>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Coupon <a onclick="remove_coupon()"><i class="fa-solid fa-trash"></i></a> </h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end"> {{ session('coupon')['coupon_code'] }} </h4>
                                </td> --}}
                                @endif
                            </tr>

                            

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Shiping</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <p class="text-brand text-end" >TK</p>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end" id="totalshiping"> 80</h4>
                                </td>
                            </tr>

                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <p class="text-brand text-end" >TK</p>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end" id="totalvalue">$12.31</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{route('checkout')}}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
            </div>

                </div>


            
            </div>
        </div>
         
    </div>
</div>


@endsection