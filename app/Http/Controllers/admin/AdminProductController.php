<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Multi_img;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Image;
use PHPUnit\Framework\Constraint\FileExists;

class AdminProductController extends Controller
{
    public function AllProduct(){
       $product = Product::latest()->get();
       $cat = Category::latest()->get();
       $subcat = Subcategory::latest()->get();
       $user = User::latest()->get();
       $multi_img = Multi_img::latest()->get();
       $brand = Brand::latest()->get();
        return view('admin.pages.product.all_product', compact('product'));

    }//END METHOD


    public function AddProduct(){
        $product = Product::latest()->get();
        $cat = Category::latest()->get();
        $subcat = Subcategory::latest()->get();
        $vendor = User::latest()->where('role','vendor')->get();
        $multi_img = Multi_img::latest()->get();
        $brand = Brand::latest()->get();
        return view('admin.pages.product.add_product', compact('product','cat','subcat','brand','vendor'));

    
    }//END METHOD

    public function ProductStatus($id){

        $product = Product::where('id',$id)->first();
        if($product->status == 1){
            $product->status = 0;
            $product->update();
            // User::findOrfail($id)->update([
            //     'status' => 'inactive',
            // ]);
            $msg = [
                'message' => "Product status deactived successfuly!",
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($msg);
        }elseif($product->status == 0){
            $product->status = 1;
            $product->update();

            // User::findOrfail($id)->update([
            //     'status' => 'active',
            // ]);

            $msg = [
                'message' => "Product status actived successfuly!",
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($msg);
        }
    }//END METHOD


    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required',
            'product_tags' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'short_des' => 'required',
            'long_des' => 'required',
            'product_cover' => 'required',
            'multi_img' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'brand' => 'required',
            'category' => 'required',
            'subcategory' => 'required',
            'vendor' => 'required',
        ]);

        if($request->file('product_cover')){
            $file = $request->file('product_cover');
            $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(1100,1100)->save('public/uploads/product/cover/'.$newName);
            $cover_url = 'public/uploads/product/cover/'.$newName;
        }

        if($request->product_code){
           $product_code =    $request->product_code;
          }else{
           $product_code =   round(rand()* 0.00003);
          }

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand,
            'cat_id' => $request->category,
            'sub_cat_id' => $request->subcategory,
            'vendor_id' => $request->vendor,            
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
            
            'product_code' => $product_code,
            
            'product_qty' => $request->product_qty,

            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_des' => $request->short_des,
            'long_des' => $request->long_des,

            'product_cover' => $cover_url,

            'hot_deals' => $request->hot_deals??0,
            'featured' => $request->featured??0,
            'special_offer' => $request->special_offer??0,
            'special_deals' => $request->special_deals??0,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // multi image part
        if($request->file('multi_img')){
            $img = $request->file('multi_img');
            foreach($img as $file){
                $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(1100,1100)->save('public/uploads/product/Image/'.$newName);
                $multi_image = 'public/uploads/product/Image/'.$newName;
                
                Multi_img::insert([
                    'product_id' => $product_id,
                    'photo_name' => $multi_image,
                    'created_at' => Carbon::now()
                ]);
            }
            // $msg = [
            //     'message' => "Product added successfuly!",
            //     'alert-type' => 'info',
            // ];
            // return redirect()->route('admin.all.product')->with($msg);
        }
        $msg = [
            'message' => "Product added successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('admin.all.product')->with($msg);
    }  //END METHOD

public function ProductEdit($id){
    $product = Product::find($id);
    // dd($product);
    $cat = Category::latest()->get();
    $subcat = Subcategory::latest()->get();
    $vendor = User::latest()->where('role','vendor')->get();
    $multi_img = Multi_img::where('product_id',$id)->get();
    $brand = Brand::latest()->get();
    return view('admin.pages.product.edit_product', compact('product','cat','subcat','brand','vendor','multi_img'));
}// END METHOD




public function UpdateProduct(Request $request, $id){

    // dd(strtolower(str_replace(' ','-',$request->product_name)));
    Product::findOrfail($id)->update([

        'brand_id' => $request->brand,
        'cat_id' => $request->category,
        'sub_cat_id' => $request->subcategory,
        'vendor_id' => $request->vendor,            
        'product_name' => $request->product_name,
        'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
        'product_code' => $request->product_code,
        'product_qty' => $request->product_qty,
        'product_tags' => $request->product_tags,
        'product_size' => $request->product_size,
        'product_color' => $request->product_color,
        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_des' => $request->short_des,
        'long_des' => $request->long_des,
        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,
        'updated_at' => Carbon::now(),
    ]);

    $msg = [
        'message' => "Product update successfuly without photo!",
        'alert-type' => 'warning',
    ];
    return redirect()->route('admin.all.product')->with($msg);


} //END METHOD


public function ProductCoverUpdate(Request $request, $id){
    $request->validate([
        'product_cover' => 'required',
    ]);
    $product = Product::findOrFail($id);
    if($request->file('product_cover')){
        if(File::exists($product->product_cover)){
            unlink($product->product_cover);
        }
        $file = $request->file('product_cover');
        $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(1100,1100)->save('public/uploads/product/cover/'.$newName);
        $cover_url = 'public/uploads/product/cover/'.$newName;
    }
    Product::findOrfail($id)->update([
        'product_cover' => $cover_url,
    ]);
    $msg = [
        'message' => "Product Cover updated successfuly!",
        'alert-type' => 'info',
    ];
    return redirect()->back()->with($msg);
}///END METHOD


public function ProductMultiImageUpdate(Request $request){

    $id = $request->id;
    if($request->file('multi_img')){
        $img = $request->file('multi_img');
        foreach($img as $file){
            $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(1100,1100)->save('public/uploads/product/Image/'.$newName);
            $multi_image = 'public/uploads/product/Image/'.$newName;
            
            Multi_img::insert([
                'product_id' => $id,
                'photo_name' => $multi_image,
                'created_at' => Carbon::now()
            ]);
        }
    }
    $msg = [
        'message' => "Product images added successfuly!",
        'alert-type' => 'info',
    ];
    return redirect()->back()->with($msg);

}//END METHOD


public function ProductMultiPhotoUpdate(Request $request){
    $request->validate([
        'multi_img' => 'required'
    ]);
    $multi_img = $request->multi_img;

    foreach($multi_img as $key => $multi_img){
        $img = Multi_img::findOrfail($key);
        if(File::exists($img->photo_name)){
            unlink($img->photo_name);
        }
        $newName = md5(uniqid(rand(), true)).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(1100,1100)->save('public/uploads/product/Image/'.$newName);
        $multi_image = 'public/uploads/product/Image/'.$newName;
        Multi_img::findOrfail($key)->update([
            'photo_name' => $multi_image,
        ]);
    }
    $msg = [
        'message' => "Product Images updated successfuly!",
        'alert-type' => 'info',
    ];
    return redirect()->back()->with($msg);
}///END METHOD


public function Multi_Image_delete($id){

   $img = Multi_img::FindOrfail($id);
   
    if(File::exists($img->photo_name)){
        unlink($img->photo_name);
        $img->delete();
    }

    $msg = [
        'message' => "Product photo deleted successfuly!",
        'alert-type' => 'warning',
    ];
    return redirect()->back()->with($msg);

}//END METHOD

public function DeleteAllProductPhoto(Request $request){
    $request->validate([
        'all_delete' =>'required'
    ]);

    $id =  $request->id;
    $multi_img = Multi_img::where('product_id', $id)->get();
    foreach ($multi_img as $image) {
        if(File::exists($image->photo_name)){
            unlink($image->photo_name);
            $image->delete();
        }
    }
   $msg = [
    'message' => "Product multiple image deleted successfuly",
    'alert-type' => 'warning'
   ];
   return redirect()->back()->with($msg);
}//END METHOD

public function ProductDelete(Request $request){
    $id =  $request->id;
    $product = Product::findOrFail($id);
    unlink($product->product_cover);
    $multi_img = Multi_img::where('product_id', $id)->get();
    foreach ($multi_img as $image) {
        if(File::exists($image->photo_name)){
            unlink($image->photo_name);
            $image->delete();
        }
    }
    $product->delete();

    $msg = [
        'message' => "Product deleted successfuly!",
        'alert-type' => 'warning'
    ];
    return redirect()->route('admin.all.product')->with($msg);

 }//END METHOD



}
