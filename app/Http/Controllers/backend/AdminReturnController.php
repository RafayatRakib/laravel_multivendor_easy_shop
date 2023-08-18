<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\ReturnMail;
use App\Models\Retrurn;
use App\Models\Return_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class AdminReturnController extends Controller
{
    public function pendingReturn (){
        // return "return";
        $return  = Retrurn::with('product','order')->where('status','pending')->where('cancel_status', NULL)->orderBy('id','DESC')->get();
        return view('admin.pages.return.pernding_return',compact('return'));
    }//end method

    public function pendingReturnDetails($id){
        $return = Retrurn::findOrFail($id);
        $return_image = Return_image::where('return_id',$id)->get();
        return response()->json(['return'=>$return,'imgages'=>$return_image]);
    
    }//end method
    
    public function allrefusedReturn(){
        $return  = Retrurn::with('product','order')->where('cancel_status', 'refused')->orderBy('id','DESC')->get();
        return view('admin.pages.return.all_refused_return',compact('return'));
    
    }//end method

    public function refusedReturn(Request $request){
        $id = $request->id;
        $refused =  $request->refused;
        $return = Retrurn::findOrFail($id)->update([
                'cancel_status' => 'refused',
                'cancle_reson' => $refused
        ]);
        
        $cartdata = cart();
        $data = [
            'name' => $return->product->name,
            'email' => $return->order->email,
            'amount' => $return->order->price,
            'invoice_no' => $return->order->invoice_no,
            'item' =>$return,
            'order_date' => $return->order->order_date,
            'delevarycharg' => $cartdata['delevarycharg'],
        ];
        Mail::to($return->order->email)->send(new ReturnMail($data));

        // Alert::success('Retrun request refused');
        return response()->json(['success' => 'Retrun request refused']);

    }//end method


    public function confirmedReturn(){
        $return  = Retrurn::with('product','order')->where('status','confirm')->where('cancel_status', NULL)->orderBy('id','DESC')->get();
        return view('admin.pages.return.confirmed_return',compact('return'));
    }//end method

    public function confirmedReturnStore(Request $request){
        $id = $request->id;
        $return = Retrurn::findOrFail($id)->update([
            'status' => 'confirm',
    ]);
    return response()->json(['success' => 'Retrun request confirmed']);
    }//end method

    public function confirmed2proccess($id){
        $return = Retrurn::findOrFail($id)->update([
            'status' => 'processing',
    ]);
    Alert::success('Retrun request proccessed');
    return redirect()->back();
    }//emd method


    public function proccessoingReturn(){
        $return  = Retrurn::with('product','order')->where('status','processing')->where('cancel_status', NULL)->orderBy('id','DESC')->get();
        return view('admin.pages.return.proccessing_return',compact('return'));
    }//end method

    public function proccess2deleviry($id){
        $return = Retrurn::findOrFail($id)->update([
            'status' => 'deliverd',
    ]);
    Alert::success('Retrun request deliverd');
    return redirect()->back();
    }//endm method

    public function deliveredReturn(){
        $return  = Retrurn::with('product','order')->where('status','deliverd')->where('cancel_status', NULL)->orderBy('id','DESC')->get();
        return view('admin.pages.return.delivered_return',compact('return'));
    }// end method

}

