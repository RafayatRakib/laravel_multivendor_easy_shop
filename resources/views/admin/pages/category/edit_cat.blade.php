@extends('admin.admin_master')

@section('title','Edit Category')
    
@section('admin')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form action="{{route('update.cat', $cat->id)}}" method="post" enctype="multipart/form-data" >
             @csrf

             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Category Name</h6>
                     </div>
                     <div class="col-sm-9 text-secondary"> 
                         <input type="text" name="cat_name" class="form-control @error('cat_name') is-invalid @enderror" value="{{$cat->cat_name}}" />
                         <div class="text-danger">@error('cat_name') {{$message}} @enderror</div>

                     </div>
                 </div>
               
        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Category Photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="cat_image" id="image"  class="form-control @error('cat_image') is-invalid @enderror" type="file" class="form-control">
                        <div class="text-danger">@error('cat_image') {{$message}} @enderror</div>
                        
                    </div>
                </div>
        
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ asset($cat->cat_image) ?? asset('public/uploads/no_image.jpg') }}" alt="Category" class="rounded p-1 bg-primary" width="110">
                     </div>
                     
                 </div>
        
                 <div class="row">
                     <div class="col-sm-3"></div>
                     <div class="col-sm-9 text-secondary">
                         <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                     </div>
                 </div>
             </div>
         </form>
         </div>
        
        
         <script src="{{asset('public/admin/assets/js/jquery.min.js')}}"></script>
        
    </div>
</div>
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