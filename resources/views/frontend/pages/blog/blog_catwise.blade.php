
@extends('frontend.master')
@section('title', 'Easy Shop | Blog Category')
@section('content')

  <main class="main">
        <div class="page-header mt-30 mb-75">
            <div class="container">
                <div class="archive-header">
                    <div class="row align-items-center">
                        <div class="col-xl-3">
                            <h1 class="mb-15">{{$cat_view->cat_name}} Category</h1>
                            <div class="breadcrumb">
                                <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                                <span></span> {{$cat_view->cat_name}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter mb-50 pr-30">
                            <div class="totall-product">
                                <h3>
                                    {{-- <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt="" /> --}}
                                  {{"Logo here"}}  All Articles
                                </h3>
                            </div>
                        </div>
                        <div class="loop-grid loop-list pr-30 mb-50">

                            @php
                            use Illuminate\Support\Str;
                        @endphp

                            @foreach ($blog as $item)
                            <article class="wow fadeIn animated hover-up mb-30 animated">
                                <a href="{{route('blog.details',$item->id)}}">
                                 <div class="post-thumb" style="background-image: url({{asset($item->blog_image)}})">
                                </a>
                                    <div class="entry-meta">
                                        <a class="entry-meta meta-2" href="blog-category-grid.html"><i class="fi-rs-play-alt"></i></a>
                                    </div>
                                </div>
                                <div class="entry-content-2 pl-50">
                                    <h3 class="post-title mb-20">
                                        <a href="{{route('blog.details',$item->id)}}">{{$item->blog_title}}</a>
                                    </h3>
                                    @php
                                       $str= substr($item->blog_body, 0, 30);
                                    @endphp
                                    <p class="post-exerpt mb-40"> {!! Str::words($item->blog_body, 50, '...') !!} </p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on"> {{\Carbon\Carbon::parse($item->created_at)->format('h:i a, d M Y ');}} </span>
                                            <span class="hit-count has-dot">
                                                @php
                                                    $blog_view =  count(App\Models\Blogview::where('blog_id',$item->id)->get());
                                                @endphp
                                                @if ($blog_view<1000)
                                                 {{$blog_view }} Views
                                                @else
                                                {{$blog_view/1000}}k Views
                                                @endif
                                            </span>
                                        </div>
                                        <a href="blog-post-right.html" class="text-brand font-heading font-weight-bold">Read more <i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>


                        <div class=" pagination-area mt-15 mb-sm-5 mb-lg-0 d-flex justify-content-center">
                        {{ $blog->links('vendor.pagination.custom') }}
                        </div>
                    </div>


                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget-2 widget_search mb-50">
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search…" />
                                        <button type="submit"><i class="fi-rs-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="sidebar-widget widget-category-2 mb-50">
                                <h5 class="section-title style-1 mb-30">Category</h5>
                                <ul>
                                    @foreach ($cat as $item)
                                    @php
                                    $product = App\Models\Blog::where('cat_id',$item->id)->get();
                                   @endphp 
                                    <li>
                                        <a href="{{url('/blog/category/'.$item->id.'/'.$item->cat_slug)}}"> <img src="{{asset($item->cat_image)}}" alt="" />{{$item->cat_name}}</a><span class="count">{{count($product)}}</span>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Trending Now</h5>
                              
                              @foreach ($mostBoughtProducts as $item)
                                  
                              <div class="single-post clearfix">
                                  <div class="image">
                                    <a href="{{url('/product/details/'.$item->product_id.'/'. $item->product->product_slug)}}">
                                      <img src="{{asset($item->product->product_cover)}}" alt="#" />
                                    </a>
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="{{url('/product/details/'.$item->product_id.'/'. $item->product->product_slug)}}">{{$item->product->product_name}}</a></h5>
                                        <p class="price mb-0 mt-5">${{$item->product->discount_price?$item->product->selling_price-$item->product->discount_price : $item->product->selling_price}}</p>
                                        <div class="product-rate">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                                

                            </div>
                            <div class="sidebar-widget widget_instagram mb-50">
                                <h5 class="section-title style-1 mb-30">Gallery</h5>
                                <div class="instagram-gellay">
                                    <ul class="insta-feed">
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-1.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-2.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-3.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-4.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-5.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-6.jpg" alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--Tags-->
                            <div class="sidebar-widget widget-tags mb-50 pb-10">
                                <h5 class="section-title style-1 mb-30">Popular Tags</h5>
                                <ul class="tags-list">
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Smoothie</a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Fruit</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Salad</a>
                                    </li>
                                    <li class="hover-up mr-0">
                                        <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="banner-img wow fadeIn mb-50 animated d-lg-block d-none">
                                <img src="assets/imgs/banner/banner-11.png" alt="" />
                                <div class="banner-text">
                                    <span>Oganic</span>
                                    <h4>
                                        Save 17% <br />
                                        on <span class="text-brand">Oganic</span><br />
                                        Juice
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection