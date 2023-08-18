@extends('frontend.master')
@section('title', 'Easy Shop | Home')
    
@section('content')
    
{{-- home slider --}}
@include('frontend.pages.home.home_slider')
{{--end home slider --}}


{{-- home category --}}
@include('frontend.pages.home.home_category')
{{--end home category --}}

{{-- home banner --}}
@include('frontend.pages.home.home_banner')
{{--end home banner --}}

{{-- home new product --}}
@include('frontend.pages.home.home_new_product')
{{--end home new product --}}




 <!--Featured Products-->
 @include('frontend.pages.home.home_featured_product')
 <!--Featured Products-->








 <!-- Fashion Category -->
 {{-- @include('frontend.pages.home.home_Fashion_product') --}}
 <section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>{{$skip_cat_0->cat_name}} Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">

               @forelse ($skip_product_0 as $product)
                            
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
                           <a aria-label="Add To Wishlist" type="submit" class="action-btn" id="{{ $product->id}}" onclick="addwishlist(this.id)"><i class="fi-rs-heart"></i></a>
                           <a aria-label="Compare" class="action-btn" id="{{ $product->id}}" onclick="addcompare(this.id)"><i class="fi-rs-shuffle"></i></a>
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
            </div>
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>


 <!--End Fashion Category -->


 <!-- Tshirt Category -->
 <section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>{{$skip_cat_2->cat_name}} Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">

               @forelse ($skip_product_2 as $product)
                            
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
                           <a aria-label="Add To Wishlist" type="submit" class="action-btn" id="{{ $product->id}}" onclick="addwishlist(this.id)"><i class="fi-rs-heart"></i></a>
                           <a aria-label="Compare" class="action-btn" id="{{ $product->id}}" onclick="addcompare(this.id)"><i class="fi-rs-shuffle"></i></a>
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
            </div>
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>
 <!--End Tshirt Category -->


 <!-- Computer Category -->
 <section class="product-tabs section-padding position-relative">
   <div class="container">
      <div class="section-title style-2 wow animate__animated animate__fadeIn">
         <h3>{{$skip_cat_3->cat_name}} Category </h3>
      </div>
      <!--End nav-tabs-->
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
            <div class="row product-grid-4">
      
               @forelse ($skip_product_3 as $product)
                            
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
                           <a aria-label="Add To Wishlist" type="submit" class="action-btn" id="{{ $product->id}}" onclick="addwishlist(this.id)"><i class="fi-rs-heart"></i></a>
                           <a aria-label="Compare" class="action-btn" id="{{ $product->id}}" onclick="addcompare(this.id)"><i class="fi-rs-shuffle"></i></a>
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
            </div>
            <!--End product-grid-4-->
         </div>
      </div>
      <!--End tab-content-->
   </div>
</section>
 <!--End Computer Category -->


 {{-- $hot_deals = App\Models\Product::where('status',1)->where()->inRandomOrder()->limit(3)->get() --}}


 <section class="section-padding mb-30">
    <div class="container">
       <div class="row">

          <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
             <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
             <div class="product-list-small animated animated">
               @php
                   $hot_deals = App\Models\Product::where('status',1)->where('hot_deals',1)->inRandomOrder()->limit(3)->get()
               @endphp
               @forelse ($hot_deals as $product)
                <article class="row align-items-center hover-up">
                   <figure class="col-md-4 mb-0">
                      <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_cover)}}" alt="" /></a>
                   </figure>
                   <div class="col-md-8 mb-0">
                      <h6>
                         <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                      </h6>
                      <div class="product-rate-cover">
                         <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                         </div>
                         <span class="font-small ml-5 text-muted"> (4.0)</span>
                      </div>
                      <div class="product-price">
                        @if ($product->discount_price)
                           <span>${{$product->selling_price-$product->discount_price}}</span>
                           <span class="old-price">${{$product->selling_price}}</span>
                        @else
                           <span>${{$product->selling_price}}</span>
                        @endif
                      </div>
                   </div>
                </article>
                @empty
                   <h4 class="text-danger text-center">Product Not Found</h4>
                @endforelse
             </div>
          </div>




          <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
             <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
             <div class="product-list-small animated animated">
               @php
                   $special_offer = App\Models\Product::where('status',1)->where('special_offer',1)->inRandomOrder()->limit(3)->get()
               @endphp
               @forelse ($special_offer as $product)
                <article class="row align-items-center hover-up">
                   <figure class="col-md-4 mb-0">
                      <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_cover)}}" alt="" /></a>
                   </figure>
                   <div class="col-md-8 mb-0">
                      <h6>
                         <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                      </h6>
                      <div class="product-rate-cover">
                         <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                         </div>
                         <span class="font-small ml-5 text-muted"> (4.0)</span>
                      </div>
                      <div class="product-price">
                        @if ($product->discount_price)
                           <span>${{$product->selling_price-$product->discount_price}}</span>
                           <span class="old-price">${{$product->selling_price}}</span>
                        @else
                           <span>${{$product->selling_price}}</span>
                        @endif
                      </div>
                   </div>
                </article>
                @empty
                   <h4 class="text-danger text-center">Product Not Found</h4>
                @endforelse
             </div>
          </div>
         
         
         
         
         
         
          <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
             <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
             <div class="product-list-small animated animated">
               @php
                   $recent_added = App\Models\Product::where('status',1)->latest()->inRandomOrder()->limit(3)->get()
               @endphp
               @forelse ($recent_added as $product)
                <article class="row align-items-center hover-up">
                   <figure class="col-md-4 mb-0">
                      <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_cover)}}" alt="" /></a>
                   </figure>
                   <div class="col-md-8 mb-0">
                      <h6>
                         <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                      </h6>
                      <div class="product-rate-cover">
                         <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                         </div>
                         <span class="font-small ml-5 text-muted"> (4.0)</span>
                      </div>
                      <div class="product-price">
                        @if ($product->discount_price)
                           <span>${{$product->selling_price-$product->discount_price}}</span>
                           <span class="old-price">${{$product->selling_price}}</span>
                        @else
                           <span>${{$product->selling_price}}</span>
                        @endif
                      </div>
                   </div>
                </article>
                @empty
                   <h4 class="text-danger text-center">Product Not Found</h4>
                @endforelse
             </div>
          </div>
          <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
             <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
             <div class="product-list-small animated animated">
               @php
                   $special_deals = App\Models\Product::where('status',1)->where('special_deals',1)->inRandomOrder()->limit(3)->get()
               @endphp
               @forelse ($special_deals as $product)
                <article class="row align-items-center hover-up">
                   <figure class="col-md-4 mb-0">
                      <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}"><img src="{{asset($product->product_cover)}}" alt="" /></a>
                   </figure>
                   <div class="col-md-8 mb-0">
                      <h6>
                         <a href="{{url('/product/details/'.$product->id.'/'.$product->product_slug)}}">{{$product->product_name}}</a>
                      </h6>
                      <div class="product-rate-cover">
                         <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: 90%"></div>
                         </div>
                         <span class="font-small ml-5 text-muted"> (4.0)</span>
                      </div>
                      <div class="product-price">
                        @if ($product->discount_price)
                           <span>${{$product->selling_price-$product->discount_price}}</span>
                           <span class="old-price">${{$product->selling_price}}</span>
                        @else
                           <span>${{$product->selling_price}}</span>
                        @endif
                      </div>
                   </div>
                </article>
                @empty
                   <h4 class="text-danger text-center">Product Not Found</h4>
                @endforelse
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--End 4 columns-->






 
 <!--Vendor List -->
 @include('frontend.pages.vendor.home_vendor_list')

 <!--End Vendor List -->

@endsection