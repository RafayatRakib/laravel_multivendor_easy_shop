@extends('admin.admin_master')
@section('title','Edit Contact')
@section('admin')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
            </ol>
        </nav>
    </div>

</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form id="contact_form" action="{{route('admin.contact.update',$contact->id)}}" method="post" enctype="multipart/form-data" >
             @csrf
             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Contact Title</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" id="contact_title" name="contact_title" class="form-control" placeholder="Contact title" value="{{ $contact->contact_title }}" />
                        <strong class="text-danger">@error('contact_title') {{$message}} @enderror</strong>

                     </div>
                 </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Contact body</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea  name="contact_body" class="form-control snote" id="mytextarea" cols="30" rows="10">{{ old('contact_body')   }} {{$contact->contact_des}}</textarea>
                        <strong class="text-danger">@error('contact_body') {{$message}} @enderror</strong>

                    </div>
                </div>

        
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Contact Photo(Optional)</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="file" name="contact_image" id="contact_image"  class="form-control" type="file" class="form-control" value="{{old('')}}">
                        <strong class="text-danger">@error('contact_image') {{$message}} @enderror</strong>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Photo link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="url" id="photo_link" value="{{old('photo_link')}}" name="photo_link" class="form-control" placeholder="Ex: https://abc.com" />
                       <strong class="text-danger">@error('photo_link') {{$message}} @enderror</strong>

                    </div>
                </div>
               
        
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ $contact->contact_image ? asset($contact->contact_image) : asset('public/uploads/no_image.jpg')}}" alt="Category" class="rounded p-1 bg-primary" width="110">
                        </div>
                 </div>
        
                 <div class="row">
                     <div class="col-sm-3"></div>
                     <div class="col-sm-9 text-secondary">
                         <input type="submit" class="btn btn-primary px-4" value="Update Contact" />
                         <a  class="btn btn-info px-4" href="" >Back</a>
                     </div>
                 </div>
             </div>
         </form>
         </div>
        
         <script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>
        
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
        $('#contact_form').validate({
            rules:{
                contact_title: 'required',
                mytextarea: 'required',
                contact_title: 'required',
            },
            messages:{
                contact_title: "<strong class='text-danger'>Enter contact title field</strong>",
                mytextarea: "<strong class='text-danger'>Enter contact body field</strong>",
            }
        })







		$('#contact_image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>





@endsection