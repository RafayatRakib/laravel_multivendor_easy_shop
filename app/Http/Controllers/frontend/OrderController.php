<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;
use App\Models\Productcart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    
    public function CashOrder(Request $request){


        // dd($request);

        // if(Session::has('coupon')){
        //     $total_amount = Session::get('coupon')['total_amount'];
        // }else{
        //     $total_amount = round(Cart::total());
        // }

        

         $cartdata = cart();
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' => 'Usd',
            'amount' => $cartdata['total'],
            'delevarycharg' => $cartdata['delevarycharg'],
            'order_number' => substr(strval(uniqid(true)), 0, 10),

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'), 
            'status' => 'pending',
            'created_at' => Carbon::now(),  

        ]);

        $carts = cart();
        foreach($carts['cart'] as $cart){

            Order_item::insert([
                'order_id' => $order_id,
                'product_id' => $cart->product_id,
                'vendor_id' => 2,
                'user_id' => Auth::id(),
                'color' => $cart->color,
                'size' => $cart->size,
                'qty' => $cart->quantity,
                'price' => $cart->product->discount_price ? ($cart->product->selling_price - $cart->product->discount_price) * $cart->quantity : $cart->product->selling_price,
                'created_at' =>Carbon::now(),
            ]);
            Productcart::findOrFail($cart->id)->delete();
            $product = Product::findOrFail($cart->product_id);
            $product->product_qty = $product->product_qty -$cart->quantity;
            $product->update(); 
        } // End Foreach
        if (Session::has('coupon')) {
           Session::forget('coupon');
        }
        $invoice = Order::findOrFail($order_id); 
        $item =  Order_item::where('order_id',$order_id)->get();
        $data = [
            'name' => $invoice->name,
            'email' => $invoice->email,
            'amount' => $invoice->amount,
            'invoice_no' => $invoice->invoice_no,
            'item' =>$item,
            'order_date' => $invoice->order_date,
            'delevarycharg' => $cartdata['delevarycharg'],
        ];

        Mail::to($request->email)->send(new OrderMail($data));


        $notification = array(
            'message' => 'Your Order Place Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('/')->with($notification); 
    }// End Method 

}
