<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    public function AllCoupon(){
        $coupon =  Coupon::with('user')->latest()->get();
        // dd($coupon);
        return view('admin.pages.coupon.all_coupon',compact('coupon'));
    }//END METHOD

    // public function check_code(Request $request){
    //     $couponCode = $request->input('coupon_code');
    //     $coupon = Coupon::where('coupon_code', $couponCode)->first();
    //     if ($coupon) {
    //         return response()->json(['message' => 'Coupon code already exists'], 422);
    //     }
    //     return response()->json(['message' => 'Coupon code is available'], 200);
    // }//END METHOD

    public function AddCoupon(){
        return view('admin.pages.coupon.add_coupon');
    }//END METHOD

    public function StoreCoupon(Request $request){

        $request->validate([
            'coupon_code' => 'required|unique:coupons'
        ]);
        $coupon =  new Coupon();
        $coupon->coupon_code  = strtoupper($request->coupon_code);
        $coupon->description = $request->description;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->minimum_purchase_amount = $request->minimum_purchase_amount;
        if($request->percentage){
            $coupon->discount_percentage = $request->percentage;
        }else{
            $coupon->discount_percentage =0;
        }
        if($request->fixed_amount){
            $coupon->discount_amount = $request->fixed_amount;
        }else{
            $coupon->discount_amount = 0;

        }
        $coupon->created_at = Carbon::now();
        $coupon->updated_at = Carbon::now();
        $coupon->save();

        $msg = [
            'message' => "Coupon added successfully",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);
        // return response()->json(['success'=> $request]);
        // return response()->json(['success'=>'Coupon added successfuly']);

    }//END METHOD

    public function EditCoupon($id){
        $coupon = Coupon::findOrFail($id);
        return view('admin.pages.coupon.edit_coupon', compact('coupon'));
    }//END METHOD


    public function UpdateCoupon(Request $request,$id){
        // dd($request);
        // $id = $request->id;
        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_code  = strtoupper($request->coupon_code);
        $coupon->description = $request->description;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->minimum_purchase_amount = $request->minimum_purchase_amount;
        if($request->percentage){
            $coupon->discount_percentage = $request->percentage;
        }else{
            $coupon->discount_percentage =0;
        }
        if($request->fixed_amount){
            $coupon->discount_amount = $request->fixed_amount;
        }else{
            $coupon->discount_amount = 0;
        }
        $coupon->updated_at = Carbon::now();
        $coupon->update();


        $msg = [
            'message' => "Coupon updated successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route('all.coupon')->with($msg);
    }//END METHOD

    public function DleteCoupon($id){
        Coupon::findOrFail($id)->delete();
        $msg = [
            'message' => "Coupon deleted successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route('all.coupon')->with($msg);
    }//END METHOD

    public function getDiscountType($id){
        $coupon = Coupon::findOrFail($id);
        return response()->json(['success'=> $coupon]);
    }// END METHOD

}
