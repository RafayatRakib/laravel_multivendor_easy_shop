<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Productcart;
use App\Models\ShipingDistrict;
use App\Models\ShipingDivision;
use App\Models\ShipingUpazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function CheckOut(){
        $division =  ShipingDivision::all();
        $cartdata = cart();
        return view('frontend.pages.others.checkout', compact('cartdata','division'));
    }//END METHOD

    public function get_district($division_id){
        $distritc = ShipingDistrict::where('division_id', $division_id)->get();
        return response()->json(['success' => $distritc]);
    }//END METHOD

    public function get_upazila($district_id){
        $upazila = ShipingUpazila::where('district_id', $district_id)->get();
        return response()->json(['success' => $upazila]);
    }//END METHOD

    public function checkoutStore(Request $request){
        // $request->validate([
        //     'user_name' => 'required',
        //     'user_email' => 'required|email',
        //     'user_phone' => 'required|min:11',
        //     'user_division' => 'required',
        //     'user_district' => 'required',
        //     'user_upazila' => 'required',
        //     'user_address' => 'required',
        //     // 'payment_option' => 'required',
        // ]);

        // dd($request);
        $data = [];
        $data['user_name'] = $request->user_name;
        $data['user_email'] = $request->user_email;
        $data['user_phone'] = $request->user_phone;
        $data['user_divishion'] = $request->user_divishion;
        $data['user_district'] = $request->user_divishion;
        $data['user_upazila'] = $request->user_upazila;
        $data['user_address'] = $request->user_address;
        if($request->user_post_code){
            $data['user_post_code'] = $request->user_post_code;
        }else{
            $data['user_post_code'] = '';

        }
        if($request->user_additional_info){
            $data['user_additional_info'] = $request->user_additional_info;
        }else{
            $data['user_additional_info'] = '';
        }
        $data['payment_option'] = $request->payment_option;
        //end user order data

        //cart data
        $cartdata =  cart();
        
        // payment method 
        if($request->payment_option =='stripe'){
            return view('frontend.pages.payment.stripe',compact('subTotal','discount','Total','delevaryCharg'));
        }elseif($request->payment_option =='cash'){
            // return view('frontend.pages.payment.cash',compact('subTotal','discount','Total','delevaryCharg','data'));
            return view('frontend.pages.payment.cash',compact('cartdata','data'));
        }else{
            return view('frontend.pages.payment.card');
        }

    }//END METHOD








}
