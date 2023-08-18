@extends('vendor.vendor_master')
@section('title','Update Product')
@section('vendor')



<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Edit Product</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Product  </li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="card">
      <div class="card-body p-4">
         <h5 class="card-title">Edit Product</h5>
         <hr/>
         <form action="{{route('vendor.update.product',$product->id)}}" id="myForm" method="post" enctype="multipart/form-data">
          @csrf
         <div class="form-body mt-4">
            <div class="row">
               <div class="col-lg-8">
                  <div class="border border-3 p-4 rounded">
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label ">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" id="inputProductTitle" value="{{$product->product_name}}">
                      </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Tags</label>
                        <input type="text" name="product_tags" class="form-control visually-hidden  " data-role="tagsinput" value="{{$product->product_tags}}">
                        
                     
                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Size</label>
                        <input type="text" name="product_size" class="form-control visually-hidden  " data-role="tagsinput" value="{{$product->product_size}} ">               
                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Color</label>
                        <input type="text" name="product_color" class="form-control visually-hidden " data-role="tagsinput" value="{{$product->product_color}}">
                      
                        
                     </div>
                     <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Short Description</label>
                        <textarea name="short_des" class="form-control " id="inputProductDescription" rows="3">{{$product->short_des}}</textarea>
                        
                     </div>
                     <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Long Description</label>
                        <textarea id="mytextarea" name="long_des">{{$product->long_des}}</textarea>
                     </div>

                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="border border-3 p-4 rounded">
                     <div class="row g-3">
                        
                        <div class="col-md-6">
                          <label for="inputPrice" class="form-label">Product Price</label>
                          <input type="text" name="selling_price" class="form-control r" id="inputPrice" value="{{$product->selling_price}}" placeholder="00.00">
                           
                          <label for="inputCompareatprice" class="form-label">Discount Price </label>
                           <input type="text" name="discount_price" class="form-control" id="inputCompareatprice"  value="{{$product->discount_price}}" placeholder="00.00">

                        </div>
                        <div class="col-md-6">
                          <label for="inputStarPoints" class="form-label">Product Quantity</label>
                          <input type="text" name="product_qty" class="form-control " id="inputStarPoints" value="{{$product->product_qty}}"  placeholder="00.00">
                          <label for="inputCostPerPrice" class="form-label">Product Code</label>
                           <input type="text" name="product_code" class="form-control " id="inputCostPerPrice" value="{{$product->product_code}}" placeholder="Product code">
                        
                        </div>
                       
                        <div class="col-12">
                          
                           <label for="inputProductType" class="form-label">Product Brand</label>
                           <select name="brand" class="form-select form-control" id="inputProductType">
                              <option selected disabled >selet brand</option>
                              @foreach ($brand as $item)
                              <option {{($item->id == $product->brand_id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->brand_name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-12">
                           
                           <label for="inputVendor" class="form-label">Product Category</label>
                           <select name="category" class="form-select form-control  @error('category') is-invalid @enderror" id="inputVendor">
                              <option selected disabled>select category</option>
                              @foreach ($cat as $item)
                              <option {{($item->id == $product->cat_id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->cat_name}}</option>
                              @endforeach
                           </select>

                        </div>
                        <div class="col-12">
                           
                           <label for="inputCollection" class="form-label">Product SubCategory</label>
                           <select name="subcategory" class="form-select form-control  " id="inputCollection">
                              <option selected disabled>select sub category</option>
                              @foreach ($subcat as $item)
                              <option {{($item->id == $product->sub_cat_id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->subcat_name}}</option>
                              @endforeach
                           </select>

                        </div>

                        <div class="col-12">
                           <div class="row g-3">
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="hot_deals" {{$product->hot_deals? 'checked':" "}} type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label"   for="flexCheckDefault"> Hot Deals</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="featured" {{$product->featured? 'checked':" "}} type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Featured</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" {{$product->special_offer? 'checked':" "}} name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Special Offer</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" {{$product->special_deals? 'checked':" "}}  name="special_deals" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                                 </div>
                              </div>
                           </div>
                           <!-- // end row  -->
                        </div>
                        <hr>
                        <div class="col-12">
                           <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end row-->
         </div>
        </form>


      </div>
   </div>

   {{-- product cover photo change part  --}}
   <div class="card">
      <div class="card-body p-4">
         <h5 class="card-title">Change Cover Photo</h5>
         <hr/>

         <div class="form-body mt-4">
            <div class="row">
               <form action="{{route('vendor.update.product.cover',$product->id)}}" method="post" enctype="multipart/form-data">
                  @csrf
               <div class="col-lg-8">
                     <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Selecte a Photo</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input id="image" name="product_cover" type="file" class="form-control @error('product_cover') is-invalid  @enderror"/>
                           <div class="text-danger">@error('product_cover') {{$message}} @enderror</div>
                           </div>
                    </div>

                    <div class="row mb-3">
                     <div class="col-sm-3">
                         <h6 class="mb-0"></h6>
                     </div>
                     <div class="col-sm-9 text-secondary">
                         <img id="showImage" src="{{ $product->product_cover ? asset($product->product_cover) : asset('public/upload/no_image.jpg') }}" alt="Admin" class="rounded-squar p-1 bg-primary" width="110">
                     </div>
                     
                 </div>
                 <div class="row mb-3">
                  <div class="col-sm-3">
                      <h6 class="mb-0"></h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                     <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
               </div>
               </div>
            </form>
            </div>
      </div>
   </div>
</div>

   {{-- End product cover photo change part  --}}



   {{-- product multi photo change part  --}}
   <div class="card">
      <div class="card-body p-4">
         <h5 class="card-title">Change Multi image </h5>
         <hr/>

         @if (count($multi_img)>0)
         <div class="table-responsive">
            <table  class="table  table-bordered" style="width:100%">
                <thead>
                  <tr>
                     <th>SL</th>
                     <th>Image</th>
                     <th>Change Image</th>
                     <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                  <form action="{{route('vendor.update.product.multi.image')}}" method="post" enctype="multipart/form-data">
                     @csrf
                  @foreach ($multi_img as $key => $item)                      
                  <tr>
                     <td>{{$key+1}}</td>
                     <td><img src="{{asset($item->photo_name)}}" style="width: 70px; hight: 40px" alt="" srcset=""></td>
                     <td><input class="form-control @error('multi_img') is-invalid @enderror" name="multi_img[{{$item->id}}]" type="file" id="formFileMultiple"></td>
                     <td>
                        <button type="submit" class="btn btn-info" id="details" title="Update">  <i class="fa fa-pencil"></i> </button>
                           <a  href="{{route('admin.delete.product.multi.image',$item->id)}}" class="btn btn-danger" id="delete" title="Delete">  <i class="fa fa-trash"></i> </a>
                     </td>
                  </tr>
                  @endforeach
                  </form>
                </tbody>
                <tfoot>
                  <tr>
                     <th >SL</th>
                     <th >Image</th>
                     <th >Change Image</th>
                     <th >Action</th>
                   </tr>
                </tfoot>
            </table>
            {{-- // ALl image deleted part --}}
            <div class="my-3">
            <form action="{{route('vendor.delte.all.image')}}" method="post" enctype="multipart/form-data">
               @csrf
            <div class="row">
               <div class="col-md-4">
                  <div class="form-check">
                     <input type="hidden" name="id" value="{{$product->id}}">
                     <input class="form-check-input @error('all_delete')is-invalid @enderror"   name="all_delete" type="checkbox" value="1" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">Delete All</label>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <div class="d-grid">
                     <button type="submit" id="dlt" class="btn btn-danger">Delete</button>
                  </div>
               </div>
            </div>
            </form>
         </div>
         
            {{-- //End ALl image deleted part --}}

            {{-- Add some image part --}}
            <form action="{{route('vendor.insert.multi.image')}}" method="post">
               @csrf
            <div class="mb-3">
               <input type="hidden" name="id" value="{{$product->id}}">
               <label for="inputProductTitle" class="card-title"><h5 class="card-title">Add Multi image </h5></label>
               <input class="form-control @error('multi_img') is-invalid @enderror" name="multi_img[]" type="file" id="formFileMultiple" multiple="">
               @error('multi_img')  <div class="text-danger">{{$message}}</div> @enderror
               <div id="multi_img_preview" class="row">
               </div>
               <div class="col-sm-9 mt-2 text-secondary">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
               </div>
            </div>
          </form>
            {{--End add some image part --}}

        </div>
         @else
         {{-- add new image if no imge added previos --}}
         <form action="{{route('vendor.insert.multi.image')}}" method="post" enctype="multipart/form-data">
            @csrf
         <div class="mb-3">
            <input type="hidden" name="id" value="{{$product->id}}">
            <label for="inputProductTitle" class="form-label">Multiple Image</label>
            <input class="form-control @error('multi_img') is-invalid @enderror" name="multi_img[]" type="file" id="formFileMultiple" multiple="">
            @error('multi_img')  <div class="text-danger">{{$message}}</div> @enderror
            <div id="multi_img_preview" class="row">
            </div>
            <div class="col-sm-9 mt-2 text-secondary">
               <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
         </div>
       </form>
         {{-- End add new image if no imge added previos --}}

         @endif

      </div>
   </div>
   {{-- End product multi photo change part  --}}



</div>




<script src="{{asset('public/admin/assets/js/jquery.min.js')}}"></script>
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