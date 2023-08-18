<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogReact;
use App\Models\Blogview;
use App\Models\Category;
use App\Models\Order_item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\ToSweetAlert;

class BlogController extends Controller
{
    public function blog(){
        
        // dd($blog_view);
        $blog =  Blog::latest()->paginate(8);
        $cat = Category::inRandomOrder()->limit(5)->get();
        $mostBoughtProducts = Order_item::select('product_id', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(8) // Limit the results to 8 products
            ->get();
            // dd($mostBoughtProducts);
        return view('frontend.pages.blog.blog',compact('blog','cat','mostBoughtProducts'));
    }//end method


    public function blogDetails($id){
        $uid = Auth::id();
        if($uid){
            $blog_view =  Blogview::where('blog_id',$id)->where('user_id',$uid)->first();
            if(!$blog_view){
                Blogview::insert([
                    'blog_id' => $id,
                    'user_id' => $uid,
                    'created_at'=> Carbon::now()
                ]);
            }
        }

        $blog_view =  count(Blogview::where('blog_id',$id)->get());
        $blog =  Blog::where('id',$id)->first();
        $cat = Category::inRandomOrder()->limit(5)->get();
        $reacted =  BlogReact::where('user_id',$uid)->where('blog_id',$id)->first();
        $totalReact =  count(BlogReact::where('blog_id', $id)->where('react',1)->get());
        $allcomment =  BlogComment::where('blog_id',$id)->latest()->limit(5)->get();

        $mostBoughtProducts = Order_item::select('product_id', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(8) // Limit the results to 8 products
            ->get();
            // dd($mostBoughtProducts);
        return view('frontend.pages.blog.blog_details',compact('blog','cat','mostBoughtProducts','blog_view','reacted','totalReact','allcomment'));
    }//end method


    public function blogReact(Request $request){
        $react = BlogReact::where('blog_id', $request->id)->where('user_id', Auth::id())->first();
        if ($react) {
            if($request->react == 1){
                $react->react = 1;
                $react->update();
             $totalReact =  count(BlogReact::where('blog_id', $request->id)->where('react',1)->get());
            return response()->json(['data'=> 'React added','total_react' => $totalReact]);

            }else{
                $react->react = 0;
                $react->update();
             $totalReact =  count(BlogReact::where('blog_id', $request->id)->where('react',1)->get());
            return response()->json(['data'=> 'React Removed','total_react' => $totalReact]);
            }

        } else {

                BlogReact::insert([
                    'blog_id' => $request->id,
                    'user_id' => Auth::id(),
                    'react' => 1,
                ]);
             $totalReact =  count(BlogReact::where('blog_id', $request->id)->where('react',1)->get());

                return response()->json(['data' => 'React added','total_react' => $totalReact]);
        }
        return response()->json(['data' => 'Something is missing here!']);

    }//end method
    
    public function blogComment(Request $request){
        // dd($request);
        $request->validate([
            'comment' => 'required'
        ]);
        BlogComment::insert([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()

        ]);
        // ToSweetAlert::alert();
        $notification = array(
            'message' => 'Comment added',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// end method

    public function getCommentData($id){
        $blogComment = BlogComment::findOrfail($id);
        return response()->json(['comment'=> $blogComment]);
    }//end method

    public function blogCommentUpdate(Request $request){
        // dd($request);
        // BlogComment::findOrFail($request->cid)->update([
        //     'comment' => $request->comment,
        //     'updated_at'=> Carbon::now()
        // ]);

        $comment = BlogComment::findOrfail($request->cid);
        $comment->comment = $request->comment;
        $comment->updated_at = Carbon::now();
        $comment->update();
        return response()->json(['success'=>'Comment updated']);
    }//end method

    //cat wise blog
    public function CatWiseBlog($id, $slug){
        
        $blog = Blog::where('cat_id',$id)->paginate(8);
        // $blog =  Blog::latest()->paginate(8);
        $cat = Category::inRandomOrder()->limit(5)->get();
        $cat_view = Category::findOrfail($id);
        $mostBoughtProducts = Order_item::select('product_id', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->take(8) // Limit the results to 8 products
            ->get();
            // dd($mostBoughtProducts);
        return view('frontend.pages.blog.blog_catwise',compact('blog','cat','cat_view','mostBoughtProducts'));
    }//end method


}
