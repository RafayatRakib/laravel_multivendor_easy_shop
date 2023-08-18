<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    public function VendorOrder(){
        $id = Auth::user()->id;
        $orderitem = Order_item::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.pages.order.vendor_order',compact('orderitem'));
    }//END METHOD

    public function VendorReturnOrder(){
        $id = Auth::user()->id;
        $orderitem = Order_item::with('order')->where('vendor_id',$id)->orderBy('id','DESC')->get();
        return view('vendor.pages.order.vendor_return',compact('orderitem'));

    }//END METHOD
}
