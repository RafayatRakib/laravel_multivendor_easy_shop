
<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
       <div class="section-title">
          <div class="title">
             <h3>Featured Categories</h3>
          </div>
          <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
       </div>
       <div class="carausel-10-columns-cover position-relative">
          <div class="carausel-10-columns" id="carausel-10-columns">
            @php
             $cat = App\Models\Category::orderBy('cat_name','ASC')->get();
            @endphp 
            @foreach ($cat as $cat)
            @php
            $product = App\Models\product::where('cat_id',$cat->id)->get();
           @endphp 
             <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <figure class="img-hover-scale overflow-hidden">
                   <a href="{{url('product/category/'.$cat->id.'/'.$cat->cat_slug)}}"><img src="{{$cat->cat_image}}" alt="" /></a>
                </figure>
                <h6><a href="{{url('product/category/'.$cat->id.'/'.$cat->cat_slug)}}">{{$cat->cat_name}}</a></h6>
                <span>{{count($product)}} items</span>
             </div>
             @endforeach

          </div>
       </div>
    </div>
 </section>