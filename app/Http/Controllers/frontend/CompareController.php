<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    public function addcompare($id){
        if(Auth::user()){
            $exiest = Compare::where('user_id', Auth::id())->where('product_id',$id)->first();
            if(!$exiest){
                $compare = new Compare();
                $compare->user_id = Auth::id();
                $compare->product_id = $id;
                $compare->created_at = Carbon::now();
                $compare->updated_at = Carbon::now();
                $compare->save();
                return response()->json(['success' =>  'Product added to your compare']);

            }else{
                return response()->json(['error' => 'Product already in your compare, check it']);
            }
        }else{
            return response()->json(['error' =>  'At frist login']);
        }
    }//END METHOD

    public function compare(){
        return view('frontend.pages.others.compare');

    }//END METHOD

    public function AllCompare(){
        $compare = Compare::with('product')->where('user_id',Auth::id())->get();
        $totalcompare = compare::count();
        return response()->json(['compare' => $compare, 'totalcompare' => $totalcompare ]);
    }//END METHOD

    public function compareremove($id){
        Compare::where('product_id',$id)->delete();
        return response()->json(['success' => 'Product successfully removed on Your compare']);
    }//END METHOD

}
