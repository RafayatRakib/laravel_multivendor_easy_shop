<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Productcart;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyCouponController extends Controller
{

    public function applyCopuon(Request $request) {
        $id = Auth::id();
        $code = strtoupper($request->apply_coupon);
        $coupon = Coupon::where('coupon_code', $code)->first();

        if ($coupon) {
            if ($coupon->status == 'active') {
                if (Carbon::parse($coupon->end_date) >= Carbon::now()) {
                    if($request->subtotal >= $coupon->minimum_purchase_amount ){

                    // }
                    // $cart = Productcart::with('product')->where('user_id', Auth::id())->get();
                    // $totalValue = 0;
                    // $totalDiscount = 0;
    
                    // foreach ($cart as $item) {
                    //     $totalValue += $item->product->selling_price * $item->quantity;
                    //     $totalDiscount += $item->product->discount_price * $item->quantity;
                    // }
    
                    // $subTotal = $totalValue - $totalDiscount;
                    // $Total = $subTotal + 80;
    
                    $couponData = [
                        'user_id' => $id,
                        'coupon_code' => $code,
                        // 'total_amount' => $Total,
                    ];
    
                    if ($coupon->discount_type == 'percentage') {
                        $couponData['discount_type'] = $coupon->discount_type;
                        $couponData['minimum_purchase_amount'] = $coupon->minimum_purchase_amount;
                        $couponData['discount_percentage'] = $coupon->discount_percentage;
                        $couponData['discount_amount'] = null;
                        // $Total = $Total - ($Total * $coupon->discount_percentage / 100);
                    } else {
                        $couponData['discount_type'] = $coupon->discount_type;
                        $couponData['minimum_purchase_amount'] = $coupon->minimum_purchase_amount;
                        $couponData['discount_percentage'] = null;
                        $couponData['discount_amount'] = $coupon->discount_amount;
                        // $Total = $Total - $coupon->discount_amount;
                    }
    
                    $couponData['end_date'] = $coupon->end_date;
    
                    // Session::put('coupon', $couponData);
                    session()->put('coupon', $coupon);


                    // $session = app('session');
                    // $session->put('coupon', $coupon);


                    return response()->json([ 'code' =>$code ,'success' => 'Coupon code applied successfully']);
                }else{
                    return response()->json(['error' => 'Minimum amount must be '.$coupon->minimum_purchase_amount]);

                }

                } else {
                    return response()->json(['error' => 'Coupon code validity expired']);
                }
            } else {
                return response()->json(['error' => 'This coupon code expired']);
            }
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }

    }//END METHOD 


    public function removeCopuon(){
        session()->forget('coupon');
        return response()->json(['success' => 'Coupon Removed']);


    }//END METHOD
    
}
