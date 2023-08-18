<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function pendingOrder(){
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.pages.order.pending_order',compact('orders'));
    }//end method

    public function confirmedOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('admin.pages.order.confirmed_order',compact('orders'));
    }//end method

    public function processingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('admin.pages.order.processing_order',compact('orders'));
    }//end method

    public function deliveredOrder(){
        $orders = Order::where('status','deliverd')->orderBy('id','DESC')->get();
        return view('admin.pages.order.delivered_order',compact('orders'));
    }//end method

    public function adminOrderDetails($id){
        $order = Order::with('division','district','upazila')->where('id',$id)->first();
        $order_item =  Order_item::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();
        return view('admin.pages.order.order_details', compact('order','order_item'));
    }//END METHOD

    public function pendingToConfirom($id){
        Order::findOrfail($id)->update([
            'status' => 'confirm'
        ]);
        $msg = [
            'message' => "Order Confiromed successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('pending.order')->with($msg);

    }//END METHOD

    
    public function confiromToProcess($id){
        Order::findOrfail($id)->update([
            'status' => 'processing'
        ]);
        $msg = [
            'message' => "Order processes successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('pending.order')->with($msg);

    }//END METHOD


    
    public function processToDelivered($id){
        Order::findOrfail($id)->update([
            'status' => 'deliverd'
        ]);
        $msg = [
            'message' => "Order delivered successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('pending.order')->with($msg);

    }//END METHOD


























    public function AdminInvoiceDownload($id){
        $order = Order::with('user','division','district','upazila')->where('id',$id)->first();
        $order_item = Order_item::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.user.dashboard.order_invoice', compact('order','order_item'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }//END METHOD

}
