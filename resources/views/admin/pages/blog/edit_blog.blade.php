@extends('admin.admin_master')

@section('title','Edit Blog')
    
@section('admin')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form id="add_blog_form" action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data" >
             @csrf
             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Blog Title</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" id="blog_title" name="blog_title" class="form-control" value="{{$blog->blog_title}}" placeholder="Blog title" />
                     </div>
                 </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select class="form-select" name="cat_id" id="cat_id" aria-label="Default select example">
                        <option selected value="{{$blog->cat_id}}">{{ $blog->category->cat_name." --(selected)"}}</option>
                        @foreach ($cat as $item)
                         <option value="{{$item->id}}">{{$item->cat_name}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>

                 
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog body</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea  name="blog_body" class="form-control snote" id="mytextarea" cols="30" rows="10">{!!$blog->blog_body!!}</textarea>
                        <strong class="text-danger">@error('blog_body') {{$message}} @enderror</strong>

                    </div>
                </div>
               






                





        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog Photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="blog_image" id="blog_image"  class="form-control" type="file" class="form-control">

                    </div>
                </div>
        
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ $blog->blog_image ? asset($blog->blog_image) : asset('public/uploads/no_image.jpg') }}" alt="Category" class="rounded p-1 bg-primary" width="110">
                     </div>
                     
                 </div>
        
                 <div class="row">
                     <div class="col-sm-3"></div>
                     <div class="col-sm-9 text-secondary">
                         <input type="submit" class="btn btn-primary px-4" value="Add Blog" />
                         <a  class="btn btn-info px-4" href="{{route('admin.blog.all')}}" >Back</a>
                     </div>
                 </div>
             </div>
         </form>
         </div>
        
        
         <script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>
        
    </div>
</div>

<script>
    $(document).ready(function() {
      $("#add_blog_form").validate({
        rules: {
            blog_title: "required",
            // blog_image: "required",
            mytextarea: "required", // Add a comma here
        },
        messages: {
            blog_title: "<strong class='text-danger'>Please enter your blog title</strong>",
            // blog_image: "<strong class='text-danger'>Please select your blog image</strong>",
            mytextarea: "<strong class='text-danger'>Please enter your blog body</strong>",
        },
        
      });
    });
    </script>
    
    


    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection