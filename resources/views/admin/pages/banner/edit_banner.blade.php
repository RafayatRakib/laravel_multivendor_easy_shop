@extends('admin.admin_master')

@section('title','Edit Banner')
    
@section('admin')


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form action="{{route('update.banner')}}" method="post" enctype="multipart/form-data" >
             @csrf
             <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Banner Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="banner_title" class="form-control" value="{{$banner->banner_title}}"  placeholder="Banner title" />
                    </div>
                </div>

                <div class="row mb-3">
                   <div class="col-sm-3">
                       <h6 class="mb-0">Banner URL</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                       <input type="text" name="banner_url" class="form-control " value="{{$banner->banner_url}}" placeholder="Banner URL" />
                   </div>
               </div>
              
       
                <div class="row mb-3">
                   <div class="col-sm-3">
                       <h6 class="mb-0">Slider Photo</h6>
                   </div>
                   <div class="col-sm-9 text-secondary">
                       <input type="file" name="banner_image" id="image"  class="form-control " type="file" class="form-control">

                       
                   </div>
               </div>
       
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0"></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img id="showImage" src="{{ asset($banner->banner_image)?? asset('public/uploads/no_image.jpg') }}" alt="Category" class="rounded p-1 bg-primary" width="110">
                    </div>
                    
                </div>
       
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="hidden" name="id" value="{{$banner->id}}">
                        <input type="submit" class="btn btn-primary px-4" value="Update Banner" />
                        <a  class="btn btn-info px-4" href="{{route('all.banner')}}" >Back</a>
                    </div>
                </div>
            </div>
         </form>
         </div>
        
        
         <script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>
        
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