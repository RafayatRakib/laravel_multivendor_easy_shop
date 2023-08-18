<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,Subcategory};
use Image;


class SubcategoryController extends Controller
{
    
    
    public function AllSubCat(){
        $subcat =  Subcategory::latest()->get();
        return view('admin.pages.subcategory.all_subcat', compact('subcat'));
    }//END METHOD

    public function AddSubCat(){
        $cat = Category::orderBy('cat_name', 'ASC')->get();
        return view('admin.pages.subcategory.add_subcat', compact('cat'));
    }//END METHOD

    public function StoreSubCat(Request $request){
        $request->validate([
            'category' => 'required',
            'subcat_name' => 'required',
        ]);

        Subcategory::insert([
            'cat_id' => $request->category,
            'subcat_name' => $request->subcat_name,
            'subcat_slug' => strtolower(str_replace(' ', '-', $request->subcat_name)),

        ]);

        $msg = [
            'message' => "Subcategory Inserted successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.sub.cat')->with($msg);

    } // END METHOD


    public function EditSubCat($id){
        $subcat =  Subcategory::find($id);
        $cat = Category::orderBy('cat_name', 'ASC')->get();
        return view('admin.pages.subcategory.edit_subcat', compact('subcat','cat'));

    }//END METHOD

    public function UpdateSubCat(Request $request, $id){
        $request->validate([
            'subcat_name' => 'required',
        ]);
        // $id = $request->id;
        $subcat =  Subcategory::find($id);
        $subcat->cat_id =  $request->category;
        $subcat->subcat_name =  $request->subcat_name;
        $subcat->subcat_slug =  strtolower(str_replace(' ', '-', $request->subcat_name));
      
        
    $subcat->update();

        $msg = [
            'message' => "Subcategory Updated successfull",
            'alert-type' => 'success',
        ];

        return redirect()->route('all.sub.cat')->with($msg);
    }//END METHOD

    public function DleteSubCat($id){

        $subcat = Subcategory::find($id);
        $subcat->delete();

        $msg = [
            'message' => "Subcategory delete successfull",
            'alert-type' => 'danger',
        ];
        return redirect()->back()->with($msg);
    }//END METHOD

}
