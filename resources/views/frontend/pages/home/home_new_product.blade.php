@php 
$product = App\Models\Product::where('status',1)->latest()->limit(10)->get(); 
$cat = App\Models\Category::latest()->limit(7)->get(); 
@endphp

<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>New Products</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>

                @foreach ($cat as $cat)

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{$cat->id}}" type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{$cat->cat_name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
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

            {{-- category wise data --}} 
            @php $cat = App\Models\Category::latest()->get(); @endphp @foreach ($cat as $cat) @php $product = App\Models\Product::where('cat_id',$cat->id )->latest()->get(); @endphp
            <div class="tab-pane fade" id="category{{$cat->id}}" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
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
                </div>
                <!--End product-grid-4-->
            </div>

            @endforeach {{--end category wise data --}}

            <!--En tab seven-->
        </div>
        <!--End tab-content-->
    </div>
</section>
