<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order_item;
use App\Models\Review;
use App\Models\ReviewImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image; 
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    
    public function reviewItem($id){
        // dd('H');
        $item = Order_item::with('product')->where('order_id',$id)->get();
        return view('frontend.user.review.review',compact('item'));
    }//end method


    public function review(Request $request){
        // dd($request->review_file);

        $review_id = Review::insertGetId([
            'product_id' => $request->review_product_id,
            'user_id' => Auth::id(),
            'rate' => $request->product_rating,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        if ($request->hasFile('review_file')) {
            $imgs = $request->file('review_file');
            // dd('$request');
            foreach($imgs as $file){
                $newName = md5(uniqid(rand(), true)).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(400,400)->save('public/uploads/review/'.$newName);
                $review_file = 'public/uploads/review/'.$newName;
                ReviewImage::insert([
                    'review_id' => $review_id,
                    // 'review_id' => 1,
                    'images' => $review_file,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]);
            }
            return redirect()->back()->with('success', 'Rate added successfully');

        }else{
            return redirect()->back()->with('error', 'Somthing is missing!');

        }




    }//end method


}
