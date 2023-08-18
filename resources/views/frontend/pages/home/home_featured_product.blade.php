
@php
    $featured_product = App\Models\Product::where('status',1)->where('featured',1)->inRandomOrder()->limit(4)->get()
@endphp






<section class="section-padding pb-5">
    <div class="container">
       <div class="section-title wow animate__animated animate__fadeIn">
          <h3 class=""> Featured Products </h3>
       </div>
       <div class="row">
          <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
             <div class="banner-img style-2">
                <div class="banner-text">
                   <h2 class="mb-100">Bring nature into your home</h2>
                   <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                </div>
             </div>
          </div>

          <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
             <div class="tab-content" id="myTabContent-1">
                <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                   <div class="carausel-4-columns-cover arrow-center position-relative">
                      <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                      <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                         
                        @forelse ($featured_product as $product)
                            
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
                                           <a class="add" ><i class="fi-rs-shopping-cart mr-5" id="addToCart" ></i>Add </a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @empty
                       <h5 class="text-danger text-center">No product found</h5>
                       @endforelse

                      </div>
                   </div>
                </div>
                <!--End tab-pane-->
             </div>
             <!--End tab-content-->
          </div>
          <!--End Col-lg-9-->
       </div>
    </div>
 </section>