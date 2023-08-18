@extends('admin.admin_master')

@section('title','Add Blog')
    
@section('admin')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Blog</li>
            </ol>
        </nav>
    </div>

</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form id="add_blog_form" action="{{route('admin.blog.stor')}}" method="post" enctype="multipart/form-data" >
             @csrf
             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Blog Title</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" id="blog_title" name="blog_title" class="form-control" placeholder="Blog title" />
                        <strong class="text-danger">@error('blog_title') {{$message}} @enderror</strong>

                     </div>
                 </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select class="form-select" name="category"  id="category" aria-label="Default select example">
                            <option selected value=" ">Select Category</option>
                            @foreach ($cat as $item)
                             <option value="{{$item->id}}">{{$item->cat_name}}</option>
                            @endforeach
                          </select>
                        <strong class="text-danger">@error('cat_id') {{$message}} @enderror</strong>

                    </div>
                </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog body</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea  name="blog_body" class="form-control snote" id="mytextarea" cols="30" rows="10">Write you blog</textarea>
                        <strong class="text-danger">@error('blog_body') {{$message}} @enderror</strong>

                    </div>
                </div>
               
        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Blog Photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="blog_image" id="blog_image"  class="form-control" type="file" class="form-control">
                        <strong class="text-danger">@error('blog_image') {{$message}} @enderror</strong>

                    </div>
                </div>
        
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ asset('public/uploads/no_image.jpg') }}" alt="Category" class="rounded p-1 bg-primary" width="110">
                         
                     
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
    // $(document).ready(function() {
    //   $("#add_blog_form").validate({
    //     rules: {
    //         blog_title: "required",
    //         "cat_id": "required",
    //         blog_image: "required",
    //         mytextarea: "required", // Add a comma here
    //     },
    //     messages: {
    //         blog_title: "<strong class='text-danger'>Please enter your blog title</strong>",
    //         "cat_id": "<strong class='text-danger'>Please select category</strong>",
    //         blog_image: "<strong class='text-danger'>Please select your blog image</strong>",
    //         mytextarea: "<strong class='text-danger'>Please enter your blog body</strong>",
    //     },
        
    //   });
    // });
    </script>
    
    


<script type="text/javascript">
	$(document).ready(function(){
		$('#blog_image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection


