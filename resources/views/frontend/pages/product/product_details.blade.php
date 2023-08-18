@extends('frontend.master')
@section('title', 'Easy Shop | Product Details')
@section('content')

<style>
    .star-rating {
	white-space: nowrap;
}
.star-rating [type="radio"] {
	appearance: none;
}
.star-rating i {
	font-size: 1.2em;
	transition: 0.3s;
}

.star-rating label:is(:hover, :has(~ :hover)) i {
	transform: scale(1.35);
	color: #fffdba;
	animation: jump 0.5s calc(0.3s + (var(--i) - 1) * 0.15s) alternate infinite;
}
.star-rating label:has(~ :checked) i {
	color: #faec1b;
	text-shadow: 0 0 2px #ffffff, 0 0 10px #ffee58;
}

@keyframes jump {
	0%,
	50% {
		transform: translatey(0) scale(1.35);
	}
	100% {
		transform: translatey(-15%) scale(1.35);
	}
}
</style>

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="{{url('/product/category/'.$product_details->cat_id.'/'.$product_details->product_slug)}}">{{$product_details->category->cat_name}}</a> <span></span> {{$product_details->product_name}}
        </div>
    </div>
</div>



<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                @foreach ($multi_image as $multi_image)
                                    
                                <figure class="border-radius-10">
                                    <img src="{{asset($multi_image->photo_name)}}" alt="product image" />
                                </figure>
                                @endforeach
                                
                            </div>
                            @php
                                $img = App\Models\Multi_img::where('product_id',$product_details->id)->get();
                            @endphp
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                @foreach ($img as $img)
                                    <div><img src="{{asset($img->photo_name)}}" alt="product image" /></div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            @if ($product_details->product_qty > 0)
                            <span class="stock-status in-stock">  In stock </span>
                            @else
                            <span class="stock-status out-stock">  Sale Off </span>
                            @endif
                            
                            <h2 class="title-detail" id="dpname">{{$product_details->product_name}}</h2>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%;"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    @if ($product_details->discount_price==0)
                                    <span class="current-price text-brand">${{$product_details->selling_price}}</span>
                                        
                                    @else
                                    <span class="current-price text-brand">${{$product_details->selling_price-$product_details->discount_price}}</span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15"> ${{round(($product_details->discount_price*100)/$product_details->selling_price)}} % Off</span>
                                        <span class="old-price font-md ml-15">${{$product_details->selling_price}}</span>
                                    </span>
                                    @endif
                                    


                                </div>
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{$product_details->short_des}}</p>
                            </div>

                            
                        <div class="row">
                            <div class="col-md-4">
                                @if($product_details->product_color)
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Color:</label>
                                      
                                    <select class="form-control"  id="dselecteColor" name="color">
                                      <option selected disabled>Select Color</option>
                                      @foreach ($color as $color)
                                      <option value="{{$color}}">{{$color}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  @endif
                                  
                            </div>
                            <div class="col-md-4">
                                @if($product_details->product_size)
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Size / Weight:</label>
                                    <select class="form-control" id="dselecteSize" name="size">
                                        <option selected  disabled>Select Size</option>
                                        @foreach ($size as $size)
                                        <option value="{{$size}}">{{$size}}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  @endif
                                  
                            </div>
                        </div>

                            {{-- @if($product_details->product_size)
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Size / Weight: </strong>
                                <ul id="size" class="list-filter size-filter font-small">
                                    @foreach ($size as $size)
                                    <li name="size" value="{{$size}}" ><a >{{$size}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            @endif

                            @if($product_details->product_color)
                            <div class="attr-detail attr-size mb-30">
                                <strong class="mr-10">Color: </strong>
                                <ul id="color" class="list-filter size-filter font-small">
                                    @foreach ($color as $color)
                                    <li name="color" value="{{$color}}" ><a >{{$color}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            @endif --}}

                            {{-- <form action="" method="post"></form> --}}
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" id="dquantity" class="qty-val" value="1" min="1" />
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="dpid" value="{{$product_details->id}}">
                                    <button type="submit" class="button button-add-to-cart" id="addTocart" onclick="detailsaddtocart()"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            <form action="" method="post"></form>
                            <P><strong>Sold by:</strong> <span class="text-brand"><a href="#">{{$product_details->vendor->name}}</a></span></P>
                                    <hr>
                            <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    
                                    <li class="mb-5">Brand: <span class="text-brand"><a href="#">{{$product_details->brand->brand_name}}</a></span></li>
                                    <li class="mb-5">Category:<span class="text-brand"> <a href="#">{{$product_details->category->cat_name}}</a></span></li>
                                    <li>Subcategory: <span class="text-brand"><a href="#">{{$product_details->subcategory->subcat_name}}</a></span></li>
                                </ul>
                                <ul class="float-start">
                                    <li class="mb-5">Product Code: <a href="#">{{$product_details->product_code}}</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">{{$product_details->product_tags}}</a></li>
                                    <li>Stock:<span class="in-stock text-brand ml-5">{{$product_details->product_qty}} Items In Stock</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <div class="">
                                {!! $product_details->long_des !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                            <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30">
                                    <img src="{{asset($product_details->vendor->photo?? asset('public/uploads/no_image.jpg'))}}" alt="" />
                                    <div class="vendor-name ml-15">
                                        <h6>
                                            <a href="vendor-details-2.html"> {{$product_details->vendor->name??'Owner'}}</a>
                                        </h6>
                                        <div class="product-rate-cover text-end">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%;"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>{{$product_details->vendor->address}}</span></li>
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller: </strong><span> {{$product_details->vendor->phone}}</span></li>
                                </ul>
                                {{-- <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">92%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div> --}}
                                <p>
                                    {{$product_details->vendor->info}}
                                </p>
                            </div>



                            <div class="tab-pane fade" id="Reviews">
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">

                                                @forelse ($order_review as $item)
                                                    @php
                                                     $user = App\Models\User::where('id',$item->user_id)->first();

                                                    
                                                    @endphp
                                                
                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img width="60px;" src="{{ $user->photo ? asset($user->photo) : asset('public/uploads/no_image.jpg') }}" alt="" />
                                                            <a href="#" class="font-heading text-brand"> {{$user->name}}</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">

                                                                    <span class="font-xs text-muted"> {{\Carbon\Carbon::parse($item->updated_at)->format('d-M-Y ')}} </span>
                                                                </div> <br>
                                                                {{-- <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 100%;">{{$item->rate}}</div>
                                                                </div> --}}

                                                                        @php
                                                                            for ($i = 1; $i <= $item->rate; $i++) {
                                                                                echo "<i style='color: #fd7e14' class='p-2 fa fa-star'></i>";
                                                                            }
                                                                        @endphp              
                                                            </div>
                                                            <p class="mb-10"> {{$item->comment}} <a href="#" class="reply">Reply</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                    <h3>No rating found yet</h3>
                                                @endforelse

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: 90%;"></div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="progress">
                                                <span>5 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                            </div>
                                            <div class="progress">
                                                <span>4 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                            </div>
                                            <div class="progress">
                                                <span>3 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                            </div>
                                            <div class="progress">
                                                <span>2 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                            </div>
                                            <div class="progress mb-30">
                                                <span>1 star</span>
                                                <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                            </div>
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->


                            @if($hasPurchased == true )
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                
                                {{-- <form class="form-contact comment_form" method="post" action="{{route('review')}}" enctype="multipart/form-data">
                                   @csrf --}}
                                   <form id="rating_form" method="post" action="{{route('user.review')}}"  enctype="multipart/form-data">
                                    @csrf
                                   <input type="hidden" id="review_product_id" name="review_product_id" value="{{$product_details->id}}">
                                    <div class="mt-2">
                                        <div class="rating-css">
                                            <div class="star-icon">
                                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                <label for="rating1" class="fa fa-star"></label>
                                                <input type="radio" value="2" name="product_rating" id="rating2">
                                                <label for="rating2" class="fa fa-star"></label>
                                                <input type="radio" value="3" name="product_rating" id="rating3">
                                                <label for="rating3" class="fa fa-star"></label>
                                                <input type="radio" value="4" name="product_rating" id="rating4">
                                                <label for="rating4" class="fa fa-star"></label>
                                                <input type="radio" value="5" name="product_rating" id="rating5">
                                                <label for="rating5" class="fa fa-star"></label>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment(Optional)"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="file" id="review_file"  name="review_file[]" multiple />
                                                </div>
                                            </div>
                                            
                                        <div class="form-group">
                                            <button type="submit" class="button button-contactForm">Submit Review</button>
                                        </div>
                                    </form>
                                </div>                                    
                                @else
                                    <strong>To rate and review this product. please buy at first</strong>
                                @endif






                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Related products</h2>
                    </div>
                    <div class="col-12">
                        <div class="row related-products">

                            @foreach ($related_products as $product)
                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap hover-up">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">
                                                <img class="default-img" src="{{asset($product->product_cover)}}" alt="" />
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
                                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
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
                                        <h2><a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span> </span>
                                        </div>
                                        <div class="product-price">
                                            <div class="product-price">
                                                @php $vendor = App\Models\User::where('id',$product->vendor_id)->get(); @endphp @if ($product->discount_price)
                                                <span>${{$product->selling_price-$product->discount_price}}</span>
                                                <span class="old-price">${{$product->selling_price}}</span>
                                                @else
                                                <span>${{$product->selling_price}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection