@extends('frontend.master')
@section('title', 'Easy Shop | Wishlist')
@section('content')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Shop <span></span> Compare
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <h1 class="heading-2 mb-10">Products Compare</h1>
            <h6 class="text-body mb-40">There are <span class="text-brand">3</span> products to compare</h6>
            <div class="table-responsive">
                <table class="table text-center table-compare">
                    <tbody>
                        <tr class="pr_image" id="c_image">
                         
                        </tr>
                        <tr class="pr_title" id="c_title">
                            
                        </tr>
                        <tr class="pr_price" id="c_price">
                            
                        </tr>
                        <tr class="pr_rating" id="c_rating">
                            
                        
                        </tr>
                        <tr class="description" id="c_des">
                           
                        </tr>
                        <tr class="pr_stock" id="c_stock_status">
                            
                           
                        </tr>
                        <tr class="pr_weight" id="c_weight">
                            
                        </tr>
                        <tr class="pr_add_to_cart" id="c_addtocart">
                            
                            
                        </tr>
                        <tr class="pr_remove text-muted" id="action">
                         
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection