<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Multi_img;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{

    public function home(){
        $skip_cat_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('cat_id',$skip_cat_0->id)->inRandomOrder()->limit(5)->get();

        $skip_cat_2 = Category::skip(4)->first();
        $skip_product_2 = Product::where('status',1)->where('cat_id',$skip_cat_2->id)->inRandomOrder()->limit(5)->get();

        $skip_cat_3 = Category::skip(7)->first();
        $skip_product_3 = Product::where('status',1)->where('cat_id',$skip_cat_3->id)->inRandomOrder()->limit(5)->get();

        return view('frontend.pages.home.home',compact('skip_cat_0','skip_cat_2','skip_cat_3','skip_product_0','skip_product_2','skip_product_3'));
    }//END METHOD

    public function ProductDetails($id,$slug){

        $uid =  Auth::id();
        $product_details =  Product::findOrFail($id);
        $size =  explode(',',$product_details->product_size);
        $color =  explode(',',$product_details->product_color);
        $tags =  explode(',',$product_details->product_tags);
        $multi_image =  Multi_img::where('product_id',$id)->get();
        $related_products =  Product::where('cat_id',$product_details->cat_id)->where('status',1)->get();
        
        $hasPurchased = Order_item::where('user_id', $uid)
                             ->where('product_id', $id)
                             ->exists();
        $order_review =  Review::where('product_id',$id)->latest()->limit(10)->get();

        return view('frontend.pages.product.product_details',compact('product_details','size','color','tags','multi_image','related_products','hasPurchased','order_review'));
    }//END METHOD

    public function AllVendor(){
        // $vendor =  User::where('status',1)->paginate(15);
        return view('frontend.pages.vendor.all_vendor');
    }//END METHOD

    public function VendorDetails($id, $user_name){
        $vendor =  User::findOrFail($id);
        $product = Product::where('status',1)->where('vendor_id',$id)->get();

        if($vendor->user_name == $user_name){
            return view('frontend.pages.vendor.vendor_details',compact('product','vendor','id'));
        }else{
            dd('Error');
        }

    }//END METHOD


    public function CatWiseProduct($id,$slug){

        $product = Product::where('cat_id',$id)->where('status',1)->get();
        $latest = Product::where('cat_id',$id)->where('status',1)->latest()->limit(3)->get();
        $cat =  Category::findOrFail($id);
        return view('frontend.pages.product.cat_wise_product',compact('product','cat','latest'));

    }//END METHOD


    public function SubcatWiseProduct($id,$slug){

        $product = Product::where('sub_cat_id',$id)->where('status',1)->get();
        $latest = Product::where('sub_cat_id',$id)->where('status',1)->latest()->limit(3)->get();
        $subcat =  Subcategory::findOrFail($id);
        return view('frontend.pages.product.sub_cat_wise_product',compact('product','subcat','latest'));
    }//END METHOD

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);
        $data = [
            'status' => 200,
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ];

        return response()->json($data);
    }//END METHOD





















}
