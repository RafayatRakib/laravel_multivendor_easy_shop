<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class AdminBlogController extends Controller
{
    public function addblog(){
        $cat =  Category::all();
        return view('admin.pages.blog.add_blog',compact('cat'));
    }//end method

    public function allblog(){
        $allblog = Blog::orderBy('id','DESC')->get();
        return view('admin.pages.blog.all_blog',compact('allblog'));
    }//end method

    public function storblog(Request $request){
        // dd($request);
        $request->validate([
            'blog_title' => 'required',
            'category' => 'required',
            'blog_body' => 'required',
            'blog_image' => 'required',
        ]);

        if($request->hasFile('blog_image')){
            $file = $request->file('blog_image');
            $new_name = md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(438,366)->save('public/uploads/blog/'.$new_name);
            $banner_image_url = 'public/uploads/blog/'.$new_name;
        }
        
        Blog::insert([
            'blog_title' => $request->blog_title,
            'cat_id' => $request->category,
            'blog_body' => $request->blog_body,
            'blog_image' => $banner_image_url,
        ]);
        $msg = [
            'message' => "Blog added successfuly!",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);

    }//end method

    public function editblog($id){
        $blog =  Blog::findOrfail($id);
        $cat =  Category::all();
        return view('admin.pages.blog.edit_blog',compact('blog','cat'));

    }//end method

    public function updateblog(Request $request, $id){
        $request->validate([
            'blog_body' => 'required',
        ]);

        
        $blog = Blog::findOrfail($id);
        if($request->blog_title){
            $blog->blog_title = $request->blog_title;
        }
        if($request->cat_id){
            $blog->cat_id = $request->cat_id;
        }

        if($request->blog_body){
            $blog->blog_body = $request->blog_body;
        }

        if($request->hasFile('blog_image')){
            @unlink($blog->blog_image);
            $file = $request->file('blog_image');
            $new_name = md5(uniqid(rand(),true)).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(438,366)->save('public/uploads/blog/'.$new_name);
            $blog->blog_image = 'public/uploads/blog/'.$new_name;
        }
        $blog->update();

        $msg = [
            'message' => "Blog updated successfuly!",
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($msg);
    }//end method

    public function deleteblog(Request $request){
        // dd($request);
        $blog = Blog::findOrFail($request->id);
        @unlink($blog->blog_image);
        $blog->delete();
        $msg = [
            'message' => "Blog delete successfuly!",
            'alert-type' => 'warning',
        ];
        return redirect()->back()->with($msg);

    }//end method

}
