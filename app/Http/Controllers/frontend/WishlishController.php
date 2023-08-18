<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlishController extends Controller
{
    
    public function addwishlist($id){
        if(Auth::user() == true){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        // return response()->json(['success' => $id]);
    
            if(!$wishlist){
                $w = new Wishlist();
                $w->user_id =  Auth::user()->id;
                $w->product_id =  $id;
                $w->created_at =  Carbon::now();
                $w->created_at =  Carbon::now();
                $w->save();
    
                return response()->json(['success' => 'Product added to your wishlist']);
            }else{
                return response()->json(['error' => 'Product already in your wishlist, check it']);
        
                    }

            }else{
                return response()->json(['error' => 'At frist login']);
            }

    }//EMD METHOD


    public function wishlist(){
        return view('frontend.pages.others.wishlist');

    }//END METHOD


    public function AllWishlist(){
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        $totalwishlisth =  wishlist::count();
        return response()->json(['wishlist'=> $wishlist, 'totalwishlisth' => $totalwishlisth ]);
    }//END METHOD

    public  function wishlistremove($id){
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id',$id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }


}