@extends('admin.admin_master')

@section('title','Update Subcategory')
    
@section('admin')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <form action="{{route('update.sub.cat', $subcat->id)}}" method="post"  >
             @csrf
             <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <select name="category" class="form-select form-control  @error('category') is-invalid @enderror" aria-label="Default select example">
                            <option selected disabled value="{{$subcat->cat_id}}">--{{$subcat->category->cat_name}}</option>
                            @foreach ($cat as $item)
                            <option  value="{{$item->id}}">{{$item->cat_name}}</option>                             
                            @endforeach
                          </select>
                        <div class="text-danger">@error('category') {{$message}} @enderror</div>
                        
                    </div>
                </div>

                 <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0">Subcategory Name</h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <input type="text" name="subcat_name" class="form-control @error('subcat_name') is-invalid @enderror" value="{{$subcat->subcat_name}}" />
                         <div class="text-danger">@error('subcat_name') {{$message}} @enderror</div>

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


@endsection