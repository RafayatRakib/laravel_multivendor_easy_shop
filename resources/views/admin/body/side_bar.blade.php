

<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
       <div>
          <img src="{{asset('public/admin/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
       </div>
       <div>
          <h4 class="logo-text"><a href="{{route('admin.dashboard')}}">Rukada</a></h4>
       </div>
       <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
       </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class='bx bx-home-circle'></i>
             </div>
             <div class="menu-title">Dashboard</div>
          </a>
          <ul>
             <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
             </li>
             <li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
             </li>
             <li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
             </li>
             <li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
             </li>
             <li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
             </li>
          </ul>
       </li>
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class='bx bx-home-circle'></i>
             </div>
             <div class="menu-title">Brands</div>
          </a>
          <ul>
             <li> <a href="{{route('all.brand')}}"><i class="bx bx-right-arrow-alt"></i>ALl Brands</a>
             </li>
             <li> <a href="{{route('add.brand')}}"><i class="bx bx-right-arrow-alt"></i>Add Brands</a>
             </li>
          </ul>
       </li>
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class="bx bx-category"></i>
             </div>
             <div class="menu-title">Category</div>
          </a>
          <ul>
             <li> <a href="{{route('all.cat')}}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
             </li>
             <li> <a href="{{route('add.cat')}}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
             </li>
          </ul>
       </li>
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class="bx bx-category"></i>
             </div>
             <div class="menu-title">Sub Category</div>
          </a>
          <ul>
             <li> <a href="{{route('all.sub.cat')}}"><i class="bx bx-right-arrow-alt"></i>All Subcategory</a>
             </li>
             <li> <a href="{{route('add.sub.cat')}}"><i class="bx bx-right-arrow-alt"></i>Add Subategory</a>
             </li>
          </ul>
       </li>
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class="bx bx-category"></i>
             </div>
             <div class="menu-title">Product Manage</div>
          </a>
          <ul>
             <li> <a href="{{route('admin.all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
             </li>
             <li> <a href="{{route('admin.add.product')}}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
             </li>
          </ul>
       </li>

       <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-sliders"></i>
            </div>
            <div class="menu-title">Slider Manage</div>
         </a>
         <ul>
            <li> <a href="{{route('all.slider')}}"><i class="bx bx-right-arrow-alt"></i>All Slide</a>
            </li>
            <li> <a href="{{route('add.slider')}}"><i class="bx bx-right-arrow-alt"></i>Add Salide</a>
            </li>
         </ul>
      </li>
       

      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-tag"></i>
            </div>
            <div class="menu-title">Coupn  Manage</div>
         </a>
         <ul>
            <li> <a href="{{route('all.coupon')}}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
            </li>
            <li> <a href="{{route('add.coupon')}}"><i class="bx bx-right-arrow-alt"></i>Add Coupon</a>
            </li>
         </ul>
      </li>


      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-sharp fa-solid fa-flag"></i>
            </div>
            <div class="menu-title">Banner Manage</div>
         </a>
         <ul>
            <li> <a href="{{route('all.banner')}}"><i class="bx bx-right-arrow-alt"></i>All Banner</a>
            </li>
            <li> <a href="{{route('add.banner')}}"><i class="bx bx-right-arrow-alt"></i>Add Banner</a>
            </li>
         </ul>
      </li>

       <li>Others</li>
       <li>
          <a href="javascript:;" class="has-arrow">
             <div class="parent-icon"><i class="fa-solid fa-people-group"></i>
             </div>
             <div class="menu-title">Vendor</div>
          </a>
          <ul>
             <li> <a href="{{route('all.active.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Active Vendor</a>
             </li>
             <li> <a href="{{route('all.inactive.vendor')}}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendor</a>
             </li>
          </ul>
       </li>

       <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="menu-title">Location Manage</div>
         </a>
         <ul>
            <li> <a href="{{route('all.division')}}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
            </li>
            <li> <a href="{{route('all.district')}}"><i class="bx bx-right-arrow-alt"></i>All Distric</a>
            </li>
            <li> <a href="{{route('all.upazila')}}"><i class="bx bx-right-arrow-alt"></i>All Upazila</a>
            </li>
         </ul>
      </li>

      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart'></i>
            </div>
            <div class="menu-title">Order Manage</div>
         </a>
         <ul>
            <li> <a href="{{ route('pending.order') }}"><i class="bx bx-right-arrow-alt"></i>Pending Order</a></li>
            <li> <a href="{{ route('confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirmed Order</a></li>
            <li> <a href="{{ route('processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing Order</a></li>
            <li> <a href="{{ route('delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered Order</a></li>
         </ul>
      </li>

      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-arrow-right-arrow-left"></i>
            </div>
            <div class="menu-title">Return Manage</div>
         </a>
         <ul>
            <li> <a href="{{ route('pending.return') }}"><i class="bx bx-right-arrow-alt"></i>Pending Return</a></li>
            <li> <a href="{{ route('confirmed.return') }}"><i class="bx bx-right-arrow-alt"></i>Confirmed Return</a></li>
            <li> <a href="{{ route('processing.return') }}"><i class="bx bx-right-arrow-alt"></i>Processing Return</a></li>
            <li> <a href="{{ route('delivered.return') }}"><i class="bx bx-right-arrow-alt"></i>Delivered Return</a></li>
            <li> <a href="{{ route('refused.order') }}"><i class="bx bx-right-arrow-alt"></i>Refused Return</a></li>
         </ul>
      </li>
      <hr>

      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-solid fa-blog"></i>
            </div>
            <div class="menu-title">Blog Manage</div>
         </a>
         <ul>
            <li> <a href="{{ route('admin.blog.add') }}"><i class="bx bx-right-arrow-alt"></i>Add blog</a></li>
            <li> <a href="{{ route('admin.blog.all') }}"><i class="bx bx-right-arrow-alt"></i>All blog</a></li>
         
         </ul>
      </li>
      <li>
         <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="fa-regular fa-address-card"></i>
            </div>
            <div class="menu-title">Cantact Manage</div>
         </a>
         <ul>
            <li> <a href="{{ route('admin.contact.add') }}"><i class="bx bx-right-arrow-alt"></i>New Contact</a></li>
            <li> <a href="{{ route('admin.contact.all') }}"><i class="bx bx-right-arrow-alt"></i>All Contact</a></li>
            <li> <a href="{{ route('admin.office.add') }}"><i class="bx bx-right-arrow-alt"></i>Add Office</a></li>
            <li> <a href="{{ route('admin.office.address.all') }}"><i class="bx bx-right-arrow-alt"></i>All Contact</a></li>
         </ul>
      </li>
      <li>
         <a href="{{route('admin.setting')}}" >
            <div class="parent-icon"><i class="fa-solid fa-gear"></i>
            </div>
            <div class="">Setting</div>
         </a>
      </li>

    </ul>
    <!--end navigation-->
 </div>