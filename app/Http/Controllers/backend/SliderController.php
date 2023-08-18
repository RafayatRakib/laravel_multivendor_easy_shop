<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image;


class SliderController extends Controller
{
    
    public function AllSlider(){
        $slider =  Slider::latest()->get();
        return view('admin.pages.slider.all_slider', compact('slider'));
    }//END METHOD

    public function AddSlider(){
        return view('admin.pages.slider.add_slider');
    }//END METHOD

    public function StoreSlider(Request $request){
        $request->validate([
            'slider_title' => 'required',
            'short_title' => 'required',
            'slider_image' => 'required',
        ]);

        if($file = $request->file('slider_image')){
            $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(2376,807)->save('public/uploads/slider/'.$newName);
            $slider_image_url = 'public/uploads/slider/'.$newName;

        }
        Slider::insert([
            'slider_title' => $request->slider_title,
            'short_title' => $request->short_title,
            'slider_image' => $slider_image_url,
            'created_at' => Carbon::now(),
        ]);

        $msg = [
            'message' => "Slider added successfuly!",
            'alert-type' => 'info',
        ];
        return redirect()->route('all.slider')->with($msg);
    }//END METHOD


    public function EditSlider($id){
        $slider = Slider::findOrFail($id);
        return view('admin.pages.slider.edit_slider',compact('slider'));
    }//END METHOD

    public function UpdateSlider(Request $request){
        $id = $request->id;
        if($file = $request->file('slider_image')){
            $newName =  md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(2376,807)->save('public/uploads/slider/'.$newName);
            $slider_image_url = 'public/uploads/slider/'.$newName;
            Slider::findOrFail($id)->update([
                'slider_title' => $request->slider_title,
                'short_title' => $request->short_title,
                'slider_image' => $slider_image_url,
                'updated_at' => Carbon::now(),
            ]);
            $msg = [
                'message' => "Slider updated successfuly with images!",
                'alert-type' => 'info',
            ];
            return redirect()->route('all.slider')->with($msg);
        }else{
            Slider::findOrFail($id)->update([
                'slider_title' => $request->slider_title,
                'short_title' => $request->short_title,
                'updated_at' => Carbon::now(),
            ]);
            $msg = [
                'message' => "Slider updated successfuly without images!",
                'alert-type' => 'info',
            ];
            return redirect()->route('all.slider')->with($msg);
        }
        
    } //END METHOD


    public function DleteSlider(Request $request){
        $id = $request->id;
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_image);
        $slider->delete();

        $msg = [
            'message' => "Slider deleted successfuly with images!",
            'alert-type' => 'warning',
        ];
        return redirect()->route('all.slider')->with($msg);


    }//END METHOD






}
