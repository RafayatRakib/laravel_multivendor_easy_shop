<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\Productcart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    
    public function AddToCart(Request $request, $id){

        if(session()->has('coupon')){
            session()->forget('coupon');
        }

        $uid = Auth::id();
        if(Auth::user()){
            $product = Product::with('category','brand')->findOrFail($id);
            $cart = Productcart::where('user_id', $uid)->where('product_id', $id)->first();
        
            if ($cart) {
                // Product already exists in the cart, update quantity
                
                $cart = new Productcart();
                $cart->user_id = $uid;
                $cart->vendor_id = $product->vendor_id;
                $cart->product_id = $id;
                $cart->product_name = $product->product_name;
                $cart->color = $request->color;
                $cart->size = $request->size;
                $cart->quantity = $request->quantity;
                $cart->product_cover = $product->product_cover;
                $cart->save();
                return response()->json(['success' => 'Product added to your cart']);

                // $cart->quantity += $request->quantity;
                // $cart->save();
                // return response()->json(['success' => 'Product quantity updated on your cart']);
            } else {
                // Product does not exist in the cart, add it
                $cart = new Productcart();
                $cart->user_id = $uid;
                $cart->vendor_id = $product->vendor_id;
                $cart->product_id = $id;
                $cart->product_name = $product->product_name;
                $cart->color = $request->color;
                $cart->size = $request->size;
                $cart->quantity = $request->quantity;
                $cart->product_cover = $product->product_cover;
                $cart->save();
                return response()->json(['success' => 'Product added to your cart']);
            }
        }else{
            return response()->json(['error' => 'At first login']);
        }
    }// End Method
    
    
    public function MiniCart(){
        $id = Auth::id();
        if(Auth::user()){
            $totalCartItem =  Productcart::where('user_id',$id)->sum('quantity');
            return response()->json(['totalCartItem' => $totalCartItem]);
        }
        else{
            return response()->json(['totalCartItem' => 0]);
        }

    }//End Method

    public function removeToCart($id){

        $cartRemove = Productcart::findOrfail($id);
        $cartRemove->delete();
        return response()->json([
            'error' => 'Product successfully removed on Your cart'
        ]);

    }//END METHOD

    public function Cart(){
        return view('frontend.pages.others.cart');
    }//END METHOD

    public function MyCart(){
        $cartdata = cart();
        return response()->json(['cart' => $cartdata['cart'],'subTotal' => $cartdata['subtotal'],'total' =>$cartdata['total']]);
        // return response()->json(['cart' => $cart,'subTotal' => $subTotal,'total' =>$Total]);
    }//END METHOD

    public function CartqtyDown( $id){
        $cartitem = Productcart::findOrfail($id);
        $cartitem->decrement('quantity');
        return response()->json(['success' => 'Cart quantity decrement.']);

    }//END METHOD

    public function CartqtyUp( $id){
        $cartitem = Productcart::findOrfail($id);
        $cartitem->increment('quantity');
        return response()->json(['success' => 'Cart quantity increment.']);

    }//END METHOD

}
