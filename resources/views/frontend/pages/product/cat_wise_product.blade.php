@extends('frontend.master')
@section('title', 'Easy Shop | '.$cat->cat_name)
@section('content')


<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h1 class="mb-15"> {{$cat->cat_name}} </h1>
                    <div class="breadcrumb">
                        <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span><a href="{{url('/product/category/'.$cat->id.'/'.$cat->cat_slug)}}">{{$cat->cat_name}}</a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">

                    <p>We found <strong class="text-brand"> {{count($product)}}  </strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Show:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid">
                @forelse ($product as $product)

                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">
                                        <img class="default-img" src="{{asset($product->product_cover)}}" alt="" />
                                        {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" /> --}}
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="{{ $product->id }}" onclick="modal(this.id)" ><i class="fi-rs-eye"></i></a>
                                </div>
                                @php $discount = ($product->discount_price * 100) / $product->selling_price; @endphp
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if ($product->discount_price==0)
                                    <span class="new">New</span>
                                    @else
                                    <span class="hot">{{round($discount)}}% off</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{$product->category->cat_name}}</a>
                                </div>
                                <h2><a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%;"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">{{$product->vendor->name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        @php $vendor = App\Models\User::where('id',$product->vendor_id)->get(); @endphp 
                                        @if ($product->discount_price)
                                        <span>${{$product->selling_price-$product->discount_price}}</span>
                                        <span class="old-price">${{$product->selling_price}}</span>
                                        @else
                                        <span>${{$product->selling_price}}</span>
                                        @endif
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                       <h5 class="text-danger text-center">No product found</h5>
                       @endforelse
                
                <!--end product card-->

                <!--end product card-->
            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!--End Deals-->

            
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Category</h5>
                <ul>
                    @php
                        $cat = App\Models\Category::where('id','!=',$cat->id)->inRandomOrder()->limit(5)->get();
                    @endphp
                        @foreach($cat as $cat)
                    <li>
                        @php
                            $product =  App\Models\Product::where('cat_id',$cat->id)->get();
                        @endphp
                        <a href="{{url('/product/category/'.$cat->id.'/'.$cat->cat_slug)}}"> <img src="{{asset($cat->cat_image)}}" alt="" />{{$cat->cat_name}}</a><span class="count">{{count($product)}}</span>
                    </li>
                    
                    @endforeach

                </ul>
            </div>



            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">New products</h5>

                @foreach ($latest as $product)
        
                <div class="single-post clearfix">
                    <div class="image">
                        <img src="{{asset($product->product_cover)}}" alt="#" />
                    </div>
                    <div class="content pt-10">
                        <p><a href="shop-product-detail.html">{{$product->product_name}}</a></p>
                        <p class="price mb-0 mt-5">${{$product->selling_price - $product->discount_price }}</p>
                        <div class="product-rate">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>


@endsection
