<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Productcart;

if(!function_exists('cart')){

    function cart(){

        $cart = Productcart::with('product')->where('user_id',Auth::id())->get();
        $totalValue = 0;
        $totalDiscount = 0;
        foreach ($cart as $item) {
            $totalValue += $item->product->selling_price * $item->quantity;
            $totalDiscount += $item->product->discount_price * $item->quantity;
            }
            $Total = $totalValue - $totalDiscount;
            $delevarycharg =  80;
            // $Total = 0;
            $discount = '';

            // $discountType = session('coupon')['discount_type'];
            if(Session()->has('coupon')){
                // $Total = Session()->get('coupon')['total_amount'];
                if(Session()->get('coupon')['discount_type']=='percentage'){
                    $percentage = Session()->get('coupon')['discount_percentage'];
                    $discount = $Total * $percentage /100;
                    $Total = $Total - ($Total * $percentage /100);
                }else{
                    $discount_amount = Session()->get('coupon')['discount_amount'];
                    $discount = $discount_amount;
                    $Total = $Total - $discount_amount;
                }
            }
            $data = [
                'total' => $Total,
                'subtotal' => $Total,
                'delevarycharg' => $delevarycharg,
                'discount' => $discount,
                'cart' => $cart,
            ];
        return $data;

    }//end method
    
}

