@extends('admin.admin_master')
@section('title','Add Office')
@section('admin')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Address</li>
            </ol>
        </nav>
    </div>

</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form id="contact_form" action="{{route('admin.office.store')}}" method="post" >
             @csrf
             <div class="card-body">
                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Office Type</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" id="office_type" name="office_type" class="form-control" placeholder="Ex: Ofice or studio" value="{{ old('contact_title') }}" />
                        <strong class="text-danger">@error('office_type') {{$message}} @enderror</strong>

                     </div>
                 </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Office Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea  name="office_address" class="form-control snote" id="mytextarea" cols="30" rows="10">{{ old('contact_body') }} Write here</textarea>
                        <strong class="text-danger">@error('office_address') {{$message}} @enderror</strong>

                    </div>
                </div>

        
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Map Link</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <input class="form-control" name="map_url" type="url" placeholder="Ex:">
                        <strong class="text-danger">@error('map_url') {{$message}} @enderror</strong>

                    </div>
                </div>
        
                 <div class="row">
                     <div class="col-sm-3"></div>
                     <div class="col-sm-9 text-secondary">
                         <input type="submit" class="btn btn-primary px-4" value="Add Office" />
                         <a  class="btn btn-info px-4" href="" >Back</a>
                     </div>
                 </div>
             </div>
         </form>
         </div>
        
         <script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>
        
    </div>
</div>

@endsection