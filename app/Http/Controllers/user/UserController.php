<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Retrurn;
use App\Models\Return_image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use PhpParser\Node\Stmt\Return_;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    
    public function UserLogin(){
        return view('frontend.user.login');
    } //END METHOD

    public function UserStore(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();        
        if($request->user()->role === 'user'){
        return redirect()->intended('/dashboard');
        }else{
            return redirect()->back();
        }
    }//END METHOD

    public function UserRegister(){
        return view('frontend.user.register');
    }//END METHOD

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $msg = [
            'message' => "Logout successfuly!",
            'alert-type' => 'success',
        ];
        return redirect('user/login')->with($msg);
    }//END METHOD

    public function UserDashboard(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        $msg = [
            'message' => "Login successfuly!",
            'alert-type' => 'success',
        ];
        return view('frontend.user.dashboard.dashboard', compact('userData'))->with($msg);
    }//END METHOD


    public function UserProfileStore(Request $request){
        $id =  Auth::user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink($user->photo);
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(1100,1100)->save('public/uploads/imgs/user/'.$newName);
            $user->photo = 'public/uploads/imgs/user/'.$newName;
        }
        $user->update();
        $msg = [
            'message' => "Update successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($msg);


    } // END METHOD

    public function userDetails(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.dashboard.account_details', compact('userData'));
    }// END METHOD

    public function userPasswordChange(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.dashboard.change_password', compact('userData'));
    }// END METHOD

    public function userOrder(){
        $id = Auth::user()->id;
        $order = Order::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.user.dashboard.user_orders', compact('order'));
    }// END METHOD

    public function returnOrder(){
        $id = Auth::user()->id;
        // Retrurn
        $return = Retrurn::where('user_id',$id)->orderBy('id','DESC')->get();
        return view('frontend.user.dashboard.user_return', compact('return'));
    }//end method


    public function traclOrder(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.dashboard.track_order', compact('userData'));
    }// END METHOD



    public function userAddress(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.user.dashboard.user_address', compact('userData'));
    }// END METHOD



    public function orderDetails($id){
        // dd($id);

        $order = Order::with('user','division','district','upazila')->where('id',$id)->where('user_id', Auth::user()->id)->first();
        $order_item = Order_item::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();
        // dd($order_item->product_id);
        // echo "<pre>";
        // print_r($order_item);
        // return response()->json(['item' => $order_item]);
        $cart = cart();
        return view('frontend.user.dashboard.order_details',compact('order','order_item','cart'));
    }


    public function UserInvoiceDownload($id){
        $order = Order::with('user','division','district','upazila')->where('id',$id)->where('user_id', Auth::user()->id)->first();
        $order_item = Order_item::with('product')->where('order_id', $id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('frontend.user.dashboard.order_invoice', compact('order','order_item'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');

        // return view('frontend.user.dashboard.order_invoice',compact('order','order_item'));

    }//END METHOD


    public function userReturn($id){
        // $order = Order::findOrFail($id);
        $order_item =  Order_item::with('product')->where('product_id',$id)->first();
        // dd($order_item);
        return view('frontend.user.dashboard.return',compact('order_item'));
    }//END METHOD


    public function userReturnRequest(Request $request, $id){
        // $all = Retrurn::all();
        $order_item =  Order_item::findOrFail($id);
        $order_id =  $order_item->order_id;
        if($request->reason_for_return && $request->file('return_images')){
            $return = new Retrurn();
            $return->order_id = $order_item->order_id; 
            $return->product_id = $order_item->product_id; 
        $return->user_id = Auth::user()->id; 
        $return->vendor_id = $order_item->vendor_id; 
        $return->color = $order_item->color; 
        $return->size = $order_item->size; 
        $return->qty = $order_item->qty; 
        $return->price = $order_item->price; 
        $return->reason_for_return = $request->reason_for_return; 
        $return->save(); 
        // dd($return->id);
        

        if($request->file('return_images')){
            
            $img = $request->file('return_images');
            foreach($img as $file){
                
                // dd($file); 
                $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
                // Image::make($file)->save('public/uploads/imgs/return/'.$newName);
                // $multi_image = 'public/uploads/imgs/return/'.$newName;
                $file->move(public_path('/uploads/imgs/return/'), $newName);
                $image = new Return_image();
                $image->return_id =  $return->id;
                $image->order_id =  $return->order_id;
                $image->product_id =  $order_item->product_id;
                $image->images =  'public/uploads/imgs/return/'. $newName;
                $image->created_at = Carbon::now();
                $image->save();
                // dd($order_id);
             
            }

        }

        Alert::toast('Return request successfuly submited!','success');
        return redirect()->route('user.orders');

    }else{
        $msg = [
            'message' => "feild requered!",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);
    }

    }//END METHOD


    public function returnDetails($id){
        $return = Retrurn::findOrFail($id);
        return view('frontend.user.dashboard.return_details',compact('return'));
    }//end method
























































    public function VendorStorePassword(Request $request){
         //validation
         $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        // dd('password');
        //chek old password match or not
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->back()->with('error',"Old password dosn't match");
        }
        //update
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('status','Password update successfuly');
    }// END METHOD







}
