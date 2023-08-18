<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;




class BrandController extends Controller
{
    public function ALlBrand(){
        $brand =  Brand::latest()->get();
        return view('admin.pages.brand.all_brand', compact('brand'));
    }//END METHOD

    public function AddBrand(){
        return view('admin.pages.brand.add_brand');
    }//END METHOD

    public function StoreBrand(Request $request){
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if($request->file('brand_image')){
            $file = $request->file('brand_image');
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('public/uploads/brand/'.$newName);
            $url = 'public/uploads/brand/'.$newName;

        }

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => $url,
        ]);

        $msg = [
            'message' => "Brand Inserted successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.brand')->with($msg);

    } // END METHOD


    public function EditBrand($id){
        $brand =  Brand::find($id);
        return view('admin.pages.brand.edit_brand', compact('brand'));

    }//END METHOD

    public function UpdateBrand(Request $request, $id){
        $request->validate([
            'brand_name' => 'required',
            // 'brand_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        // $id = $request->id;
        $brand =  Brand::find($id);
        $brand->brand_name =  $request->brand_name;
        $brand->brand_slug =  strtolower(str_replace(' ', '-', $request->brand_name));
        if($request->file('brand_image')){
            $file = $request->file('brand_image');

            if(file_exists($brand->brand_image)){
                @unlink($brand->brand_image);
            }

            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('public/uploads/brand/'.$newName);
            $url = 'public/uploads/brand/'.$newName;
            $brand->brand_image =  $url;

        }
    $brand->update();

        $msg = [
            'message' => "Brand Updated successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.brand')->with($msg);
    }//END METHOD

    public function DleteBrand($id){

        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();

        $msg = [
            'message' => "Brand delete successfull",
            'alert-type' => 'danger',
        ];
        return redirect()->back()->with($msg);


    }//END METHOD












}
