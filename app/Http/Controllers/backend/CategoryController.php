<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function AllCat(){
        $cat =  Category::latest()->get();
        return view('admin.pages.category.all_cat', compact('cat'));
    }//END METHOD

    public function AddCat(){
        return view('admin.pages.category.add_cat');
    }//END METHOD

    public function StoreCat(Request $request){
        $request->validate([
            'cat_name' => 'required',
            'cat_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if($request->file('cat_image')){
            $file = $request->file('cat_image');
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(120,120)->save('public/uploads/category/'.$newName);
            $url = 'public/uploads/category/'.$newName;

        }

        Category::insert([
            'cat_name' => $request->cat_name,
            'cat_slug' => strtolower(str_replace(' ', '-', $request->cat_name)),
            'cat_image' => $url,
        ]);

        $msg = [
            'message' => "Category Inserted successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.cat')->with($msg);

    } // END METHOD


    public function EditCat($id){
        $cat =  Category::find($id);
        return view('admin.pages.category.edit_cat', compact('cat'));

    }//END METHOD

    public function UpdateCat(Request $request, $id){
        $request->validate([
            'cat_name' => 'required',
            // 'brand_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        // $id = $request->id;
        $cat =  Category::find($id);
        $cat->cat_name =  $request->cat_name;
        $cat->cat_slug =  strtolower(str_replace(' ', '-', $request->cat_name));
        if($request->file('cat_image')){
            $file = $request->file('cat_image');

            if(file_exists($cat->cat_image)){
                @unlink($cat->cat_image);
            }
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(120,120)->save('public/uploads/category/'.$newName);
            $url = 'public/uploads/category/'.$newName;
            $cat->cat_image =  $url;

        }
    $cat->update();

        $msg = [
            'message' => "Category Updated successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.cat')->with($msg);
    }//END METHOD

    public function DleteCat($id){

        $cat = Category::find($id);
        unlink($cat->cat_image);
        $cat->delete();

        $msg = [
            'message' => "Category delete successfull",
            'alert-type' => 'danger',
        ];
        return redirect()->back()->with($msg);


    }//END METHOD

}
