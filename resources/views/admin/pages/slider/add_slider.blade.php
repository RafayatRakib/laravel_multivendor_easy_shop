@extends('admin.admin_master')

@section('title','Add Slider')
    
@section('admin')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Slider</li>
            </ol>
        </nav>
    </div>

</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form action="{{route('add.slider.store')}}" method="post" enctype="multipart/form-data" >
             @csrf
             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Slider Title</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" name="slider_title" class="form-control @error('slider_title') is-invalid @enderror" placeholder="Slider title" />
                         <div class="text-danger">@error('slider_title') {{$message}} @enderror</div>
                     </div>
                 </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Short Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="short_title" class="form-control @error('short_title') is-invalid @enderror" placeholder="Short Title" />
                        <div class="text-danger">@error('short_title') {{$message}} @enderror</div>
                    </div>
                </div>
               
        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Slider Photo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="slider_image" id="image"  class="form-control @error('slider_image') is-invalid @enderror" type="file" class="form-control">

                        <div class="text-danger">@error('slider_image') {{$message}} @enderror</div>
                        
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
                         <input type="submit" class="btn btn-primary px-4" value="Add Slider" />
                         <a  class="btn btn-info px-4" href="{{route('all.slider')}}" >Back</a>
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


