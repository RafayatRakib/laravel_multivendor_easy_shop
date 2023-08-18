@extends('frontend.master')
@section('title', 'Easy Shop | Blog')
@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         {{-- <form class="form-contact comment_form mb-50"method="post" id="commentForm"> --}}
            <div class="row">
               <div class="col-12">
                  <input type="hidden" name="comment_id" id="comment_id" value="">
                  <div class="form-group">
                     <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="20" placeholder="Write Comment"></textarea>
                  </div>
               </div>
            </div>
         {{-- </form> --}}
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" id="comment" onclick="update()" class="btn btn-primary">Update</button>
       </div>
     </div>
   </div>
 </div>







<main class="main">
   <div class="page-header mt-30 mb-75">
      <div class="container">
         <div class="archive-header">
            <div class="row align-items-center">
               <div class="col-xl-3">
                  <h1 class="mb-15">Blog & News</h1>
                  <div class="breadcrumb">
                     <a href="{{route('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                     <span></span> {{$blog->blog_title}}
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
               <div class="single-page pt-50 pr-30">
                  <div class="single-header style-2">
                     <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                           <h6 class="mb-10"><a href="#"> {{$blog->category->cat_name}} </a></h6>
                           <h2 class="mb-10">{{$blog->blog_title}}</h2>
                           <div class="single-header-meta">
                              <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                 <a class="author-avatar" href="#">
                                    <img class="img-circle" src="{{asset($blog->user->photo)}}" alt="" />
                                 </a>
                                 {{-- <span class="post-by">By <a href="#"> admin name </a></span> --}}
                                 <span class="post-by">By <a href="#"> {{$blog->user->name}} </a></span>
                                 <span class="post-on has-dot">{{\Carbon\Carbon::parse($blog->created_at)->format('h:i a, d M Y ');}}  </span>
                                 <span class="hit-count has-dot">

                                    @if ($blog_view<1000)
                                       {{$blog_view }} Views
                                       
                                    @else
                                       {{$blog_view/1000}}k Views
                                    @endif
                                 </span>
                              </div>
                              <div class="social-icons single-share">
                                 <ul class="text-grey-5 d-inline-block">
                                    <li class="mr-5">
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-bookmark.svg" alt="" /></a>
                                    </li>
                                    <li>
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-heart-2.svg" alt="" /></a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <figure class="single-thumbnail d-flex justify-content-center">
                     <img src="{{asset($blog->blog_image)}}" alt="" />
                  </figure>
                  <div class="single-content">
                     <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                          {!!$blog->blog_body!!}
                           <!--Entry bottom-->
                          
                           {{-- <div class="entry-bottom mt-50 mb-30">
                              <div class="social-icons single-share">
                                 <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Shar this:</strong></li>
                                    <li class="social-facebook">
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt="" /></a>
                                    </li>
                                    <li class="social-twitter">
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt="" /></a>
                                    </li>
                                    <li class="social-instagram">
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt="" /></a>
                                    </li>
                                    <li class="social-linkedin">
                                       <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt="" /></a>
                                    </li>
                                 </ul>
                              </div>
                           </div> --}}

                           <!--Author box-->
                           @php
                               $vendor =   \App\Models\User::where('id',$blog->user_id)->first();
                               $totalpost =   \App\Models\Blog::where('user_id',$blog->user_id)->get();
                               $totalpost =  count($totalpost);
                           @endphp
                           <div class="author-bio p-30 mt-50 border-radius-15 bg-white">
                              <div class="author-image mb-30">
                                 <a href="author.html"><img src="{{asset($blog->user->photo)}}" alt="" class="avatar" /></a>
                                 <div class="author-infor">
                                    <h5 class="mb-5"> {{$vendor->name}} </h5>
                                    <p class="mb-0 text-muted font-xs">
                                       <span class="mr-10">{{$totalpost}} posts</span>
                                       <span class="has-dot">Since {{\Carbon\Carbon::parse($vendor->created_at)->format('Y')}}</span>
                                    </p>
                                 </div>
                              </div>
                              <div class="author-des">
                                 
                                 <p> {{$vendor->info}}  </p>
                              </div>
                           </div>


                           <!--Comment form-->
                           @if (Auth::user())
                           <div class="comment-form">
                              <h3 class="mb-15">Leave a Comment</h3>
                              {{-- <div class="product-rate d-inline-block mb-30"></div> --}}
                              <input type="hidden" id="id" value="{{$blog->id}}">
                              @if ($reacted && $reacted->react == 1) <!-- Corrected the comparison operator here -->
                              <a ><i id="react_blog" class="text-danger fa-solid fa-heart fa-xl"></i></a> 
                              <span class="hit-count has-dot" id="totalReact">
                                 @if ($totalReact<1000)
                                    {{$totalReact }} People reacted
                                 @else
                                    {{$totalReact/1000}}k People reacted
                                 @endif
                              </span>
                              @else
                              <a><i id="react_blog" class=" fa-solid fa-heart fa-xl"></i></a>
                              <span class="hit-count has-dot" id="totalReact">
                                 @if ($totalReact<1000)
                                    {{$totalReact }} People reacted
                                 @else
                                    {{$totalReact/1000}}k People reacted
                                 @endif
                              </span>
                              @endif
                              
                             
                              <div class="row">
                                 <div class="col-lg-9 col-md-12">

                                        
                                    <form class="form-contact comment_form mb-50" action="{{route('blog.comment')}}" method="post" id="commentForm">
                                       @csrf
                                       <div class="row">
                                          <div class="col-12">
                                             <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                             <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group">
                                          <button type="submit" class="button button-contactForm">Post Comment</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              @else
                              <h4>If you want to make a comment please <a href="{{route('user.login')}}">login</a> first</h4>
                              @endif

                                    <div class="comments-area">
                                       <h3 class="mb-30">Comments</h3>
                                       <div class="comment-list">

                                          @foreach ($allcomment as $item)
                                             

                                          <div class="single-comment justify-content-between d-flex mb-30">
                                             <div class="user justify-content-between d-flex">
                                                <div class="thumb text-center">
                                                   <img src="{{asset($item->user->photo)}}" alt="" />
                                                   <a href="#" class="font-heading text-brand">{{$item->user->name}}</a>
                                                </div>
                                                <div class="desc">
                                                   <div class="d-flex justify-content-between mb-10">
                                                      <div class="d-flex align-items-center">      
                                                         <span class="font-xs text-muted">{{\Carbon\Carbon::parse($item->created_at)->format('h:i a, d M Y ');}} </span>                                             </div>
                                                      {{-- <div class="product-rate d-inline-block">
                                                         <div class="product-rating" style="width: 80%"></div>
                                                      </div> --}}
                                                   </div>
                                                   <p class="mb-10"> {{$item->comment}}
                                                   @if ($item->user_id == Auth::id())
                                                    <a data-bs-toggle="modal" id="{{$item->id}}" onclick="comment(this.id)" data-bs-target="#exampleModal" class="text-bold">Edit</a>
                                                   @endif
                                                  </p>
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
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar pt-50">
               <div class="widget-area">
                  <div class="sidebar-widget-2 widget_search mb-50">
                     <div class="search-form">
                        <form action="#">
                           <input type="text" placeholder="Search…" />
                           <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                     </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
      $("#react_blog").click(function() {
       $(this).toggleClass("text-danger");
       var id = $("#id").val();
      //  alert(id);
       if ($(this).hasClass("text-danger")) {
         var react = 1;
        } else {
         var react = 0;
        }
         $.ajax({
            type: 'post',
            dataType: 'json',
            data: {
               id : id,
               react: react,
            },
            url: "{{route('blog.react')}}",
            success: function(data) {
               if(data.total_react<1000){
                  $('#totalReact').text(data.total_react+" People reacted");
               }else{
                  $('#totalReact').text(data.total_react +" k people reacted");
               }
         },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
         });

      });

   });

   function comment(id){
      // alert(id);
      $.ajax({
      type: 'GET',
      dataType: 'json',
      url: `{{url('/get/comment/data/${id}')}}`,
      success: function(data){
         // console.log(data.comment);
         $('#comment_id').val(id);
         $('#comment').text(data.comment.comment);
      },
      error: function(jqXHR, textStatus, errorThrown) {
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
     }) 
   }


   function update() {
   var comment= $('#comment').val();
   var id= $('#comment_id').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {
         cid : id,
         comment: comment
      },
      url: `{{url('/blog/comment/update')}}`,
      success: function(data){
         // console.log(data.success);
         window.location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    })
}


</script>
@endsection