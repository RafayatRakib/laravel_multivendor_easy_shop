<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Carbon\Carbon;
use Image;




class BannerController extends Controller
{
    public function AllBanner(){
        $banner =  Banner::latest()->get();
        return view('admin.pages.banner.all_banner', compact('banner'));
    }//END METHOD

    public function AddBanner(){
        return view('admin.pages.banner.add_banner');
    }//END METHOD

    public function StoreBanner(Request $request){
        $request->validate([
            'banner_title' => 'required',
            'banner_url' => 'required|url',
            'banner_image' => 'required',
        ]);

        if($file = $request->file('banner_image')){
            $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(768,450)->save('public/uploads/banner/'.$newName);
            $banner_image_url = 'public/uploads/banner/'.$newName;

        }
        Banner::insert([
            'banner_title' => $request->banner_title,
            'banner_url' => $request->banner_url,
            'banner_image' => $banner_image_url,
            'created_at' => Carbon::now(),
        ]);

        $msg = [
            'message' => "Banner added successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('all.banner')->with($msg);
    }//END METHOD


    public function EditBanner($id){
        $banner = Banner::findOrFail($id);
        return view('admin.pages.banner.edit_banner',compact('banner'));
    }//END METHOD

    public function UpdateBanner(Request $request){
        $id = $request->id;
        if($file = $request->file('banner_image')){
            $newName =  md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(2376,807)->save('public/uploads/banner/'.$newName);
            $banner_image_url = 'public/uploads/banner/'.$newName;
            Banner::findOrFail($id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'banner_image' => $banner_image_url,
                'updated_at' => Carbon::now(),
            ]);
            $msg = [
                'message' => "Banner updated successfuly with images!",
                'alert-type' => 'info',
            ];
            return redirect()->route('all.banner')->with($msg);
        }else{
            Banner::findOrFail($id)->update([
                'banner_title' => $request->banner_title,
                'banner_url' => $request->banner_url,
                'updated_at' => Carbon::now(),
            ]);
            $msg = [
                'message' => "Banner updated successfuly without images!",
                'alert-type' => 'info',
            ];
            return redirect()->route('all.banner')->with($msg);
        }
        
    } //END METHOD


    public function DleteBanner(Request $request){
        $id = $request->id;
        $banner = Banner::findOrFail($id);
        unlink($banner->banner_image);
        $banner->delete();
        $msg = [
            'message' => "Banner deleted successfuly with images!",
            'alert-type' => 'warning',
        ];
        return redirect()->route('all.banner')->with($msg);


    }//END METHOD

}
