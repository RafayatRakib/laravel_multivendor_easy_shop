<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\Auth\LoginRequest;
use Image;



class AdminController extends Controller
{
    

    public function AdminDashboard(){
        return view('admin.admin_dashboard');

    } //END METHOD

    public function AdminStore(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();        
        if($request->user()->role === 'admin'){
        return redirect()->intended('admin/dashboard');
        }else{
            return redirect()->back();
        }
    }//END METHOD


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }//END METHOD

    public function AdminLogin(){
        return view('admin.body.admin_login');
    }//END METHOD

    public function AdminProfile(){
        // dd('H');
        // $id =  Auth::user()->id;
        // $admin = User::find($id);
        $admin =  Auth::user();
        return view('admin.body.admin_profile',compact('admin'));
    }//END METHOD

    public function AdminProfileStore(Request $request){
        $id =  Auth::user()->id;
        $admin = User::find($id);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink($admin->photo);
            $newName = time().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(110,110)->save('public/admin/avatars/'.$newName);
            $admin->photo = 'public/admin/avatars/'.$newName;
        }
        $admin->update();
        $msg = [
            'message' => "Update successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->back()->with($msg);

    }//END METHOD

    public function AdminChangePassword(){
        return view('admin.body.change_password');
    }//END METHOD

    public function AdminStorePassword(Request $request){

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


    //active and inactive vendor controller

    public function ActiveVendor(){
        $vendor =  User::where('role','vendor')->where('status','active')->get();
        return view('admin.pages.vendor.active_vendor',compact('vendor'));
    }//END METHOD


    public function InactiveVendor(){
        $vendor =  User::where('role','vendor')->where('status','inactive')->get();
        return view('admin.pages.vendor.inactive_vendor',compact('vendor'));
    }//END METHOD

    public function VendorStatus($id){

        $vendor = User::where('id',$id)->first();
        if($vendor->status == 'active'){
            $vendor->status = 'inactive';
            $vendor->update();
            // User::findOrfail($id)->update([
            //     'status' => 'inactive',
            // ]);
            $msg = [
                'message' => "Vendor deactived successfuly!",
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($msg);
        }elseif($vendor->status == 'inactive'){
            $vendor->status = 'active';
            $vendor->update();

            // User::findOrfail($id)->update([
            //     'status' => 'active',
            // ]);

            $msg = [
                'message' => "Vendor actived successfuly!",
                'alert-type' => 'info',
            ];
            return redirect()->back()->with($msg);
        }
    }//END METHOD

    public function VendorProfileDetails($id){
        $vendorProfile =  User::findOrFail($id);
        return view('admin.pages.vendor.vendorprofile', compact('vendorProfile'));

    }//END METHOD


    public function setting(){
        return view('admin.pages.setting.setting');
    }//end method





}
