@extends('admin.admin_master')

@section('title','Edit Brand')
    
@section('admin')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form action="{{route('update.brand', $brand->id)}}" method="post" enctype="multipart/form-data" >
             @csrf

             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Brand Name</h6>
                     </div>
                     <div class="col-sm-9 text-secondary"> 
                         <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" value="{{$brand->brand_name}}" />
                         <div class="text-danger">@error('brand_name') {{$message}} @enderror</div>

                     </div>
                 </div>
               
        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Brand Photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="brand_image" id="image"  class="form-control @error('brand_image') is-invalid @enderror" type="file" class="form-control">
                        <div class="text-danger">@error('brand_image') {{$message}} @enderror</div>
                        
                    </div>
                </div>
        
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ asset($brand->brand_image) ?? asset('public/uploads/no_image.jpg') }}" alt="Brand" class="rounded p-1 bg-primary" width="110">
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