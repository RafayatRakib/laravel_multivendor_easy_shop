<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\{AdminController,AdminProductController, CacheController};
use App\Http\Controllers\vendor\{VendorController, VendorOrderController, VendorProductController};
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\backend\{AdminBlogController, AdminOrderController, AdminReturnController, BrandController,CategoryController,SubcategoryController,SliderController,BannerController, CouponController, ShipingController,AdimnContactController, ReportController};
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\frontend\{ApplyCouponController, BlogController, HomeController,CartController, CheckOutController, CompareController, ContactController, OrderController, ReviewController, WishlishController};
use App\Http\Middleware\Role;
use App\Models\Wishlist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home landig route
Route::get('/', [HomeController::class, 'home'])->name('/');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


// admin 
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/store', [UserCoAdminControllerntroller::class, 'AdminStore'])->name('admin.store');

//admin group middelwere
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/clear/cache',[CacheController::class,'cacheClear'])->name('cache_clear');
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/setting','setting')->name('admin.setting');
        Route::get('/admin/dashboard',  'AdminDashboard')->name('admin.dashboard');
        Route::get('/admin/logout',  'AdminLogout')->name('admin.logout');
        Route::get('/admin/profile',  'AdminProfile')->name('admin.profile');
        Route::post('/admin/profile/store',  'AdminProfileStore')->name('admin.profile.store');
        Route::get('/admin/change/password',  'AdminChangePassword')->name('admin.change.password');
        Route::post('/admin/store/password',  'AdminStorePassword')->name('admin.store.password');
    });
    Route::controller(AdminOrderController::class)->group(function(){
        Route::get('/pending/order','pendingOrder')->name('pending.order');
        Route::get('/confirmed/order','confirmedOrder')->name('confirmed.order');
        Route::get('/processing/order','processingOrder')->name('processing.order');
        Route::get('/delivered/order','deliveredOrder')->name('delivered.order');

        Route::get('/admin/order/details/{id}', 'adminOrderDetails')->name('admin.order.details');
        Route::get('/admin/order/invoice/{id}','AdminInvoiceDownload')->name('admin.order.invoice');

        Route::get('/pending/to/confirom/{id}','pendingToConfirom')->name('pending.to.process');
        Route::get('/confirom/to/process/{id}','confiromToProcess')->name('confirom.to.process');
        Route::get('/process/to/delivered/{id}','processToDelivered')->name('delivered.to.process');

    });

    Route::controller(AdminReturnController::class)->group(function(){
        Route::get('/pending/return','pendingReturn')->name('pending.return');
        Route::get('/admin/return/details/{id}','pendingReturnDetails')->name('pending.return.details');
        Route::post('/admin/refused/return', 'refusedReturn');
        Route::get('/admin/all/refused/return', 'allrefusedReturn')->name('refused.order');
        Route::get('/admin/confirmed/return', 'confirmedReturn')->name('confirmed.return');
        Route::post('/admin/confirmed/return','confirmedReturnStore');
        Route::get('/admin/confirmed/to/proccess/{id}','confirmed2proccess')->name('confirmed2proccess');
        Route::get('/admin/processing/return', 'proccessoingReturn')->name('processing.return');
        Route::get('/admin/proccess/to/deleviry/{id}','proccess2deleviry')->name('proccess2deleviry');
        Route::get('/admin/delivered/return', 'deliveredReturn')->name('delivered.return');
    });
    
    Route::controller(AdminBlogController::class)->group(function(){
        Route::get('/admin/blog/add','addblog')->name('admin.blog.add');
        Route::get('/admin/blog/all','allblog')->name('admin.blog.all');
        Route::post('/admin/blog/stor','storblog')->name('admin.blog.stor');
        Route::get('/admin/blog/edit/{id}','editblog')->name('admin.blog.edit');
        Route::post('/admin/blog/update/{id}','updateblog')->name('admin.blog.update');
        Route::post('/admin/blog/delete','deleteblog')->name('admin.blog.delete');
    });
    
});//end admin route group delivered.return

//vendor
Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware('guest');
Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor')->middleware('guest');
Route::post('/vendor/register', [VendorController::class, 'VendorReg'])->name('vendor.reg')->middleware('guest');
Route::post('/vendor/store', [VendorController::class, 'VendorStore'])->name('vendor.store');

//Vendor group middelwere
Route::middleware(['auth','role:vendor'])->group(function(){
    Route::controller(VendorController::class)->group(function(){
        Route::get('/vendor/dashboard',  'VendorDashboard')->name('vendor.dashboard');
        Route::get('/vendor/logout',  'VendorLogout')->name('vendor.logout');
        Route::get('/vendor/profile',  'VendorProfile')->name('vendor.profile');
        Route::post('/vendor/profile/store',  'VendorProfileStore')->name('vendor.profile.store');
        Route::get('/vendor/change/password',  'VendorChangePassword')->name('vendor.change.password');
        Route::post('/vendor/store/password',  'VendorStorePassword')->name('vendor.store.password');
        
    });
    //vendor order route
    Route::controller(VendorOrderController::class)->group(function(){
        Route::get('/vendor/order' , 'VendorOrder')->name('vendor.order');
        Route::get('/vendor/return/order' , 'VendorReturnOrder')->name('vendor.return.order');
        
    
    
    });
});//end vendor route group UserStore

Route::get('/user/login', [UserController::class, 'UserLogin'])->name('user.login')->middleware('guest');
Route::post('/user/store', [UserController::class, 'UserStore'])->name('user.store');
Route::get('/user/register', [UserController::class, 'UserRegister'])->name('user.register')->middleware('guest');
Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/dashboard',  'UserDashboard')->name('user.dashboard');
        Route::get('/logout',  'UserLogout')->name('user.logout.2');
        Route::get('/profile',  'UserProfile')->name('user.profile');
        Route::post('/user/profile/store',  'UserProfileStore')->name('user.profile.store');
        // Route::post('/user/change/password',  'UserChangePassword')->name('user.change.password');
        Route::post('/user/store/password',  'VendorStorePassword')->name('user.store.password');

        Route::get('/account/details', 'userDetails')->name('user.account.details');
        Route::get('/change/password', 'userPasswordChange')->name('user.password.change');
        Route::get('/my/order', 'userOrder')->name('user.orders');
        Route::get('/track/order', 'traclOrder')->name('track.orders');
        Route::get('/return/order', 'returnOrder')->name('return.orders');
        Route::get('/my/address', 'userAddress')->name('user.address');

        Route::get('/get/order/details/{id}', 'orderDetails')->name('orderDetails');
        Route::get('/user/order/invoice/{id}','UserInvoiceDownload')->name('user.order.invoice');
        Route::get('/user/return/{id}','userReturn')->name('user.return');
        Route::post('/user/return/request/{id}','userReturnRequest')->name('user.return.request');
        Route::get('/return/details/{id}','returnDetails')->name('returnDetails');
    });

    
});//end vendor route group 


Route::middleware(['auth','role:admin'])->group(function(){
    
    //ALl brand route
    Route::controller(BrandController::class)->group(function(){
        Route::get('/all/brand',  'AllBrand')->name('all.brand');
        Route::get('/add/brand',  'AddBrand')->name('add.brand');
        Route::post('/add/brand/store',  'StoreBrand')->name('add.brand.store');
        Route::get('/edit/brand/{id}',  'EditBrand')->name('edit.brand');
        Route::post('/update/brand/{id}',  'UpdateBrand')->name('update.brand');
        Route::get('/delete/brand/{id}',  'DleteBrand')->name('delete.brand');

    });

    //ALl category route
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category',  'AllCat')->name('all.cat');
        Route::get('/add/category',  'AddCat')->name('add.cat');
        Route::post('/add/category/store',  'StoreCat')->name('add.cat.store');
        Route::get('/edit/category/{id}',  'EditCat')->name('edit.cat');
        Route::post('/update/category/{id}',  'UpdateCat')->name('update.cat');
        Route::get('/delete/category/{id}',  'DleteCat')->name('delete.cat');
    
    });

    //ALl subcategory route
    Route::controller(SubcategoryController::class)->group(function(){
        Route::get('/all/subcategory',  'AllSubCat')->name('all.sub.cat');
        Route::get('/add/subcategory',  'AddSubCat')->name('add.sub.cat');
        Route::post('/add/subcategory/store',  'StoreSubCat')->name('add.sub.cat.store');
        Route::get('/edit/subcategory/{id}',  'EditSubCat')->name('edit.sub.cat');
        Route::post('/update/subcategory/{id}',  'UpdateSubCat')->name('update.sub.cat');
        Route::get('/delete/subcategory/{id}',  'DleteSUbCat')->name('delete.sub.cat');
    });

    //All vendor active and inactive route
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/active/vendor',  'ActiveVendor')->name('all.active.vendor');
        Route::get('/all/inactive/vendor',  'InactiveVendor')->name('all.inactive.vendor');
        Route::get('/vendor/status/{id}',  'VendorStatus')->name('vendor.status');
        Route::get('/vendor/details/{id}',  'VendorProfileDetails')->name('vendor.profile.details');

    });

        //All Product add update and delete route
        Route::controller(AdminProductController::class)->group(function(){
            Route::get('/all/product',  'AllProduct')->name('admin.all.product');
            Route::get('/add/product',  'AddProduct')->name('admin.add.product');
            Route::post('/store/product',  'StoreProduct')->name('admin.store.product');
            Route::get('product/edit/{id}', 'ProductEdit')->name('admin.product.edit');
            Route::get('/product/status/{id}',  'ProductStatus')->name('admin.product.status');
            //update
            Route::post('/product/update/store/{id}','UpdateProduct')->name('admin.update.product');
            Route::post('update/product/cover/{id}','ProductCoverUpdate')->name('admin.update.product.cover');
            Route::post('update/product/multi/image/','ProductMultiImageUpdate')->name('admin.insert.multi.image');
            Route::post('update/product/photo','ProductMultiPhotoUpdate')->name('admin.update.product.multi.image');
            Route::get('delete/product/photo/{id}','Multi_Image_delete')->name('admin.delete.product.multi.image');
            Route::post('delete/all/produc/photo','DeleteAllProductPhoto')->name('admin.delte.all.image');
           
            Route::post('/admin/product/delete/','ProductDelete')->name('admin.product.delete');

        });
    
        //ALl Slider route
    Route::controller(SliderController::class)->group(function(){
        Route::get('/admin/all/slider',  'AllSlider')->name('all.slider');
        Route::get('/admin/add/slider',  'AddSlider')->name('add.slider');
        Route::post('/admin/slider/store',  'StoreSlider')->name('add.slider.store');
        Route::get('/edit/slider/{id}',  'EditSlider')->name('edit.slider');
        Route::post('/update/slider/',  'UpdateSlider')->name('update.slider');
        Route::post('/delete/slider',  'DleteSlider')->name('delete.silder');
    
    });

        //ALl banner route
    Route::controller(BannerController::class)->group(function(){
        Route::get('/admin/all/banner',  'AllBanner')->name('all.banner');
        Route::get('/admin/add/banner',  'AddBanner')->name('add.banner');
        Route::post('/admin/banner/store',  'StoreBanner')->name('add.banner.store');
        Route::get('/edit/banner/{id}',  'EditBanner')->name('edit.banner');
        Route::post('/update/banner/',  'UpdateBanner')->name('update.banner');
        Route::post('/delete/banner',  'DleteBanner')->name('delete.banner');
    
    });

        //ALl coupn route
    Route::controller(CouponController::class)->group(function(){
        Route::get('/admin/all/coupon',  'AllCoupon')->name('all.coupon');
        Route::get('/admin/add/coupon',  'AddCoupon')->name('add.coupon');
        Route::post('/admin/banner/store',  'StoreCoupon')->name('add.coupon.store');
        Route::get('/edit/coupon/{id}',  'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon/{id}',  'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}',  'DleteCoupon')->name('delete.coupon');
        Route::post('/coupon/check_code',  'check_code')->name('coupons.check_code');
        Route::get('get/discount/type/{id}', 'getDiscountType');
    
    });


        //ALl shiping route
    Route::controller(ShipingController::class)->group(function(){
        Route::get('/admin/all/division',  'Alldivision')->name('all.division');
        Route::get('/admin/all/district',  'Alldistrict')->name('all.district');
        Route::get('/admin/all/upazila',  'Allupazila')->name('all.upazila');

        Route::get('/admin/get/all/division',  'Getdivisiondata');
        Route::get('/admin/get/all/district',  'Getdistrictdata');
        Route::get('/admin/get/all/upazila/',  'Getupaziladata');
        Route::get('/admin/get/district/{id}',  'GetdistrictdataByID');

        Route::post('/admin/add/division',  'AddDivision')->name('add.division');
        Route::post('/admin/add/district',  'AddDistrict')->name('add.district');
        Route::post('/admin/add/upazila',  'AddUpazila')->name('add.upazila');

        Route::get('/edit/division/{id}', 'editDivision')->name('edit.division');
        Route::get('/edit/district/{id}', 'editDistrict');
        Route::get('/edit/upazila/{id}', 'editUpazila');

        Route::post('/update/division',  'updateDivision');
        Route::post('/update/district',  'updateDistrict');
        Route::post('/update/upazila',  'updateUpazila');

        
        Route::post('/delete/division/{id}',  'DleteDivision');
        Route::post('/delete/district/{id}',  'DleteDistrict');
        Route::post('/delete/upazila/{id}',  'DleteUpazila');
    
    });

    Route::controller(AdimnContactController::class)->group(function(){
        Route::get('/admin/contact/add','addContact')->name('admin.contact.add');
        Route::post('/admin/stor/contact','storeContact')->name('admin.contact.store');
        Route::get('/admin/contact','adminContact')->name('admin.contact.all');
        Route::get('/admin/contact/edit/{id}','contactEdit')->name('admin.contact.edit');
        Route::post('/admin/update/contact/{id}','updateContact')->name('admin.contact.update');
        Route::get('admin/contact/delete/{id}','delete')->name('admin.contact.delete');
        Route::get('/admin/change/status/{id}','status')->name('adimn.contact.status');

        Route::get('/admin/office/add/address','addOffice')->name('admin.office.add');
        Route::post('/admin/office/store','StoreOffice')->name('admin.office.store');
        Route::get('/admin/office','AllOffice')->name('admin.office.address.all');
        Route::get('/admin/office/status/{id}','OfficeStatus')->name('admin.office.status');
        Route::get('/admin/office/edit/{id}','OfficeEdit')->name('admin.office.edit');
        Route::post('/admin/office/update','UpdateOffice')->name('admin.office.update');
        Route::get('/admin/office/address/delete/{id}','OfficeAddressDeleted')->name('admin.office.delete');

    });

    // user report section start
    Route::controller(ReportController::class)->group(function(){
        
    });
    // user report section end


});//end admin route group





//Vendor group middelwere
Route::middleware(['auth','role:vendor'])->group(function(){
    Route::controller(VendorProductController::class)->group(function(){
        Route::get('vendor/all/product',  'AllProduct')->name('vendor.all.product');
        Route::get('vendor/add/product',  'AddProduct')->name('vendor.add.product');
        Route::post('vendor/store/product',  'StoreProduct')->name('vendor.store.product');
        Route::get('vendor/product/edit/{id}', 'ProductEdit')->name('vendor.product.edit');
        Route::get('vendor/product/status/{id}',  'ProductStatus')->name('vendor.product.status');
        //update
        Route::post('vendor/product/update/store/{id}','UpdateProduct')->name('vendor.update.product');
        Route::post('vendor/update/product/cover/{id}','ProductCoverUpdate')->name('vendor.update.product.cover');
        Route::post('vendor/update/product/multi/image/','ProductMultiImageUpdate')->name('vendor.insert.multi.image');
        Route::post('vendor/update/product/photo','ProductMultiPhotoUpdate')->name('vendor.update.product.multi.image');
        Route::get('vendor/delete/product/photo/{id}','Multi_Image_delete')->name('vendor.delete.product.multi.image');
        Route::post('vendor/delete/all/produc/photo','DeleteAllProductPhoto')->name('vendor.delte.all.image');
        Route::post('/vendor/product/delete/','ProductDelete')->name('vendor.product.delete');
        
    });
});//end vendor route group UserStore



//frontend route\

Route::controller(HomeController::class)->group(function(){
    Route::get('/product/details/{id}/{slug}', 'ProductDetails')->name('url');
    Route::get('/all/vendor', 'AllVendor')->name('all.vendor');
    Route::get('/vendor/details/{id}/{user_name}', 'VendorDetails');
    Route::get('/product/category/{id}/{slug}','CatWiseProduct');
    Route::get('/product/subcategory/{id}/{slug}','SubcatWiseProduct');
    Route::get('/product/view/modal/{id}','ProductViewAjax');
});

Route::controller(ReviewController::class)->group(function(){
    Route::post('/review', 'review')->name('review');
});


//start cart route
Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/product/mini/cart', [CartController::class, 'MiniCart'])->name('MiniCart');
    Route::get('/cart/product/remove/{id}', [CartController::class, 'removeToCart']);
    Route::get('/cart', [CartController::class, 'Cart'])->name('cart');
    Route::get('/my/cart/', [CartController::class, 'MyCart'])->name('mycart');
    Route::post('/cartqtyup/{id}', [CartController::class, 'CartqtyUp']);
    Route::post('/cartqtydown/{id}', [CartController::class, 'CartqtyDown']);
    Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart'])->name('addtocart');
    
    //chekout start
    Route::controller(CheckOutController::class)->group(function(){
        Route::get('/checkout', 'CheckOut')->name('checkout');
        Route::get('/get/district_by_division/{division_id}', 'get_district');
        Route::get('/get/upazila_by_district/{district_id}', 'get_upazila');
        Route::post('checkout/store','checkoutStore')->name('checkout.store');
    });
    //chekout start end

    //cash on delevary start
    Route::controller(OrderController::class)->group(function(){
        Route::post('/cash/order', 'CashOrder')->name('cash.order');

    });
    //cash on delevary end
    
    //start wishlist route 
    Route::post('/add/to/wishlist/{pid}',[WishlishController::class,'addwishlist']);
    Route::get('/wishlist/count',[WishlishController::class,'countwishlist']);
    Route::get('/wishlist', [WishlishController::class, 'wishlist'])->name('wishlist');
    Route::get('get/all/wishlist', [WishlishController::class, 'AllWishlist']);
    Route::post('wishlist/remove/{id}', [WishlishController::class, 'wishlistremove']);
    //end wishlist route
    
    //start compare route
    Route::get('add/compare/{id}', [CompareController::class, 'addcompare']);
    Route::get('/compare', [CompareController::class, 'compare'])->name('compare');
    Route::get('get/all/compare', [CompareController::class, 'AllCompare']);
    Route::post('compare/remove/{id}', [CompareController::class, 'compareremove']);
    //end compare route

    //apply Coupon
    Route::post('/apply/coupon', [ApplyCouponController::class, 'applyCopuon']);
    Route::post('/coupon/remove', [ApplyCouponController::class, 'removeCopuon']);
    //apply Coupon end

    Route::controller(ReviewController::class)->group(function(){
        // Route::get('/user/review/{id}', 'reviewItem')->name('user.review');
        Route::post('/user_review', 'review')->name('user.review');
    });

    //blog route start
    Route::controller(BlogController::class)->group(function(){
        Route::post('/blog_react', 'blogReact')->name('blog.react');
        Route::post('/blog/comment', 'blogComment')->name('blog.comment');
        Route::get('/get/comment/data/{id}','getCommentData')->name('blog.react.get.comment.data');
        Route::post('/blog/comment/update', 'blogCommentUpdate')->name('blog.comment.update');
        //cat wise blog
        Route::get('/blog/category/{id}/{slug}','CatWiseBlog');

    });
    //blog route end


});

    //blog route start
    Route::controller(BlogController::class)->group(function(){
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blog/details/{id}', 'blogDetails')->name('blog.details');

    });
    //blog route end

//end cart route

Route::get('/contact',[ContactController::class,'contact'])->name('contact');







//end frontend route 



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END