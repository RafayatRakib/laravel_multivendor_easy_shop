

<div class="container">
    <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
       <h3 class="">All Our Vendor List </h3>
       <a class="show-all" href="{{route('all.vendor')}}">
       All Vendors
       <i class="fi-rs-angle-right"></i>
       </a>
    </div>
    <div class="row vendor-grid">

        {{-- start vendor card --}}
@php
    $vendor =  App\Models\User::where('role','vendor')->where('status','active')->inRandomOrder()->limit(4)->get();
@endphp
@forelse ($vendor as $vendor)

       <div class="col-lg-3 col-md-6 col-12 col-sm-6 justify-content-center">
          <div class="vendor-wrap mb-40">
             <div class="vendor-img-action-wrap">
                <div class="vendor-img">
                   <a href="{{url('/vendor/details/'.$vendor->id.'/'.$vendor->user_name)}}">
                   <img class="default-img" src="{{ $vendor->photo? asset($vendor->photo) : asset('public/uploads/no_image.jpg') }}" style="width: 144px; hight: 144px;" alt="" />
                   </a>
                </div>
                <div class="product-badges product-badges-position product-badges-mrg">
                   <span class="hot">Mall</span>
                </div>
             </div>
             <div class="vendor-content-wrap">
                <div class="d-flex justify-content-between align-items-end mb-30">
                   <div>
                      <div class="product-category">
                         <span class="text-muted">Since {{ date("Y", strtotime($vendor->join_date)) }}</span>
                      </div>
                      <h4 class="mb-5"><a href="{{url('/vendor/details/'.$vendor->id.'/'.$vendor->user_name)}}">{{$vendor->name}}</a></h4>
                      <div class="product-rate-cover">
                        @php
                            $product = App\Models\Product::where('vendor_id', $vendor->id)->get()
                        @endphp
                         <span class="font-small total-product">{{count($product)}} products</span>
                      </div>
                   </div>
                </div>
                <div class="vendor-info mb-30">
                   <ul class="contact-infor text-muted">
                      <li><img src="{{asset($vendor->photo)}}" alt="" /><strong>Call Us:</strong><span> {{$vendor->phone}} </span></li>
                   </ul>
                </div>
                <a href="{{url('/vendor/details/'.$vendor->id.'/'.$vendor->user_name)}}" class="btn btn-xs">Visit Store <i class="fi-rs-arrow-small-right"></i></a>
             </div>
          </div>
       </div>
       @empty
       <h4 class="text-danger text-center">Vendor Not Found</h4>
   @endforelse
       <!--end vendor card-->
    </div>
 </div>