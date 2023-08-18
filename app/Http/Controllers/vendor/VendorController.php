<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Image;

class VendorController extends Controller
{
    public function VendorLogin(){
        return view('vendor.body.vendor_login');
    }//END METHOD

    public function VendorStore(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();        
        if($request->user()->role === 'vendor'){
        return redirect()->intended('vendor/dashboard');
        }else{
            return redirect()->back();
        }
    }//END METHOD

    public function VendorDashboard(){
        return view('vendor.vendor_dashboard');
    } //END METHOD


    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('vendor.login');
    }//END METHOD


    public function VendorProfile(){
        $id =  Auth::user()->id;
        $vendor = User::find($id);
        return view('vendor.body.vendor_profile',compact('vendor'));
    }//END METHOD

    public function VendorProfileStore(Request $request){
        $id =  Auth::user()->id;
        $vendor = User::find($id);

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink($vendor->photo);
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(110,110)->save('public/vendor/avatars/'.$newName);
            $vendor->photo = 'public/vendor/avatars/'.$newName;
        }
        $vendor->updated_at = Carbon::now();
        $vendor->update();
        $msg = [
            'message' => "Update successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($msg);

    }//END METHOD


    public function VendorChangePassword(){
       return view('vendor.body.change_password');
    }//END METHOD

    public function VendorStorePassword(Request $request){

        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        //chek old password match or not
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return redirect()->back()->with('error','Old password dosn\'t match');
        }
        //update
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with('status','Password update successfuly');

    }//END METHOD

    public function BecomeVendor(){
        return view('vendor.body.vendor_reg');
    }

    public function VendorReg(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // dd('H');
        User::insert([
            'name' => $request->name,
            'user_name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
            'created_at'=> Carbon::now()
        ]);

        $msg = [
            'message' => "Register successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('vendor.login')->with($msg);

    }//END METHOD

}
