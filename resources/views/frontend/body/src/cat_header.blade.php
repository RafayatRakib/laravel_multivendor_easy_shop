

<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="index.html"><img src="{{asset('public/uploads/theme/logo-2.svg')}}" alt="logo" /></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-categori-wrap d-none d-lg-block">
                    <a class="categories-button-active" href="#">
                        <span class="fi-rs-apps"></span>   All Categories
                        <i class="fi-rs-angle-down"></i>
                    </a>

                    @php
                        $category = App\Models\Category::orderBy('cat_name','ASC')->get();
                    @endphp

                    <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                @foreach ($category as $cat)
                                    
                                <li>
                                    <a href=""> <img src="{{asset($cat->cat_image)}}" alt="" />{{$cat->cat_name}}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                            <ul class="end">
                                @foreach ($category as $cat)
                                    
                                <li>
                                    <a href=""> <img src="{{asset($cat->cat_image)}}" alt="" />{{$cat->cat_name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="more_slide_open" style="display: none">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-1.svg" alt="" />Milks and Dairies</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-2.svg" alt="" />Clothing & beauty</a>
                                    </li>
                                </ul>
                                <ul class="end">
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-3.svg" alt="" />Wines & Drinks</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/icon-4.svg" alt="" />Fresh Seafood</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                    </div>
                </div>


                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            
                            <li>
                                <a class="active" href="{{url('/')}}">Home  </a>
                                
                            </li>
                            @php
                                $category = App\Models\Category::inRandomOrder()->limit(3)->get();
                            @endphp 

                                @foreach ($category as $cat)
                                @php
                                  $subcat = App\Models\Subcategory::where('cat_id',$cat->id)->get();
                                @endphp 
                                <li>
                                    <a href="{{url('product/category/'.$cat->id.'/'.$cat->cat_slug)}}"> {{$cat->cat_name}} <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach ($subcat as $subcat)
                                            
                                        <li><a href="{{url('product/subcategory/'.$subcat->id.'/'.$subcat->subcat_slug)}}">{{$subcat->subcat_name}}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </li>
                                @endforeach

                                <li>
                                    <a href="{{route('blog')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">Contact</a>
                                </li>
                        </ul>
                    </nav>
                </div>













            </div>


            <div class="hotline d-none d-lg-flex">
                <img src="{{asset('public/uploads/theme/icons/icon-headphone.svg')}}" alt="hotline" />
                <p>1900 - 888<span>24/7 Support Center</span></p>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.html">
                            <img alt="Nest" src="{{asset('public/uploads/theme/icons/icon-heart.svg')}}" />
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="#">
                            <img alt="Nest" src="{{asset('public/uploads/theme/icons/icon-cart.svg')}}" />
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('public/uploads/shop/thumbnail-3.jpg')}}" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest" src="{{asset('public/uploads/shop/thumbnail-4.jpg')}}" /></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="shop-cart.html">View cart</a>
                                    <a href="shop-checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>