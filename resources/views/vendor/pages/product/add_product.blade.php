@extends('vendor.vendor_master')

@section('title','Add Product')
    
@section('vendor')
    

<script src="{{asset('public/backend/assets/js/jquery.min.js')}}"></script>



<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Add New Product</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="card">
      <div class="card-body p-4">
         <h5 class="card-title">Add New Product</h5>
         <hr/>
         <form action="{{route('vendor.store.product')}}" id="myForm" method="post" enctype="multipart/form-data">
          @csrf
         <div class="form-body mt-4">
            <div class="row">
               <div class="col-lg-8">
                  <div class="border border-3 p-4 rounded">
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label ">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" id="inputProductTitle" placeholder="Enter product title">
                        <div class="text-danger">@error('product_name') {{$message}} @enderror</div>
                      </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Tags</label>
                        <input type="text" name="product_tags" class="form-control visually-hidden  @error('product_name') is-invalid @enderror" data-role="tagsinput" value="new product,top product">
                        @error('product_tags')  <div class="text-danger">{{$message}}</div> @enderror
                     
                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Size</label>
                        <input type="text" name="product_size" class="form-control visually-hidden  @error('product_name') is-invalid @enderror" data-role="tagsinput" value="Small,Midium,Large ">
                        @error('product_size')  <div class="text-danger">{{$message}}</div> @enderror
                        
                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Product Color</label>
                        <input type="text" name="product_color" class="form-control visually-hidden @error('product_color') is-invalid @enderror" data-role="tagsinput" value="Red,Blue,Black">
                        @error('product_color')  <div class="text-danger">{{$message}}</div> @enderror
                        
                     </div>
                     <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Short Description</label>
                        <textarea name="short_des" class="form-control @error('short_des') is-invalid @enderror" id="inputProductDescription" rows="3"></textarea>
                        @error('short_des')  <div class="text-danger">{{$message}}</div> @enderror
                        
                     </div>
                     <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Long Description</label>
                        <textarea id="mytextarea" name="long_des">Hello, World!</textarea>
                        @error('long_des')  <div class="text-danger">{{$message}}</div> @enderror

                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label"> Product Cover</label>
                        <input name="product_cover" class="form-control @error('product_cover') is-invalid @enderror" type="file" id="image">
                        @error('product_cover')  
                        <div class="text-danger">{{$message}}</div> @enderror

                     </div>
                     <div class="mb-3">
                        <img id="showImage" src="{{ asset('public/uploads/no_image.jpg') }}" alt="Category" class="rounded p-1 bg-primary" width="110">

                     </div>
                     <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Multiple Image</label>
                        <input class="form-control @error('multi_img') is-invalid @enderror" name="multi_img[]" type="file" id="formFileMultiple" multiple="">
                        @error('multi_img')  <div class="text-danger">{{$message}}</div> @enderror
                        <div id="multi_img_preview" class="row">
                           
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="border border-3 p-4 rounded">
                     <div class="row g-3">
                        
                        <div class="col-md-6">
                          <label for="inputPrice" class="form-label">Product Price</label>
                          <input type="text" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" id="inputPrice" placeholder="00.00">
                        @error('selling_price')  <div class="text-danger">{{$message}}</div> @enderror
                           
                          <label for="inputCompareatprice" class="form-label">Discount Price </label>
                           <input type="text" name="discount_price" class="form-control" id="inputCompareatprice" placeholder="00.00">
                        @error('discount_price')  <div class="text-danger">{{$message}}</div> @enderror

                        </div>
                        <div class="col-md-6">
                          <label for="inputStarPoints" class="form-label">Product Quantity</label>
                          <input type="text" name="product_qty" class="form-control @error('product_qty') is-invalid @enderror" id="inputStarPoints" placeholder="00.00">
                        @error('product_qty')  <div class="text-danger">{{$message}}</div> @enderror   
                          <label for="inputCostPerPrice" class="form-label">Product Code</label>
                           <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" id="inputCostPerPrice" placeholder="Product code">
                           @error('product_code')  <div class="text-danger">{{$message}}</div> @enderror
                        
                        </div>
                       
                        <div class="col-12">
                          
                           <label for="inputProductType" class="form-label">Product Brand</label>
                           <select name="brand" class="form-select form-control" id="inputProductType">
                              <option selected disabled >selet brand</option>
                              @foreach ($brand as $item)
                              <option value="{{$item->id}}">{{$item->brand_name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-12">
                           
                           <label for="inputVendor" class="form-label">Product Category</label>
                           <select name="category" class="form-select form-control  @error('category') is-invalid @enderror" id="inputVendor">
                              <option selected disabled>select category</option>
                              @foreach ($cat as $item)
                              <option value="{{$item->id}}">{{$item->cat_name}}</option>
                              @endforeach
                           </select>
                        @error('category')  <div class="text-danger">{{$message}}</div> @enderror

                        </div>
                        <div class="col-12">
                           
                           <label for="inputCollection" class="form-label">Product SubCategory</label>
                           <select name="subcategory" class="form-select form-control  @error('subcategory') is-invalid @enderror" id="inputCollection">
                              <option selected disabled>select sub category</option>
                              @foreach ($subcat as $item)
                              <option value="{{$item->id}}">{{$item->subcat_name}}</option>
                              @endforeach
                           </select>
                        @error('subcategory')  <div class="text-danger">{{$message}}</div> @enderror

                        </div>

                        <div class="col-12">
                           <div class="row g-3">
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault"> Hot Deals</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="featured" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Featured</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="special_offer" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Special Offer</label>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-check">
                                    <input class="form-check-input" name="special_deals" type="checkbox" value="1" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Special Deals</label>
                                 </div>
                              </div>
                           </div>
                           <!-- // end row  -->
                        </div>
                        <hr>
                        <div class="col-12">
                           <div class="d-grid">
                              <button type="submit" class="btn btn-primary">Save Product</button>
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
</div>

<script type="text/javascript">
	$(document).ready(function(){
    $('#image').change(function(){
        const reader = new FileReader();
        reader.onload = function(){
            $('#showImage').attr('src', this.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

	});
</script>




<script type="text/javascript">
   $(document).ready(function (){
       $('#myForm').validate({
           rules: {
            product_name: {
                   required : true,
               }, 
                short_descp: {
                   required : true,
               }, 
                product_thambnail: {
                   required : true,
               }, 
                multi_img: {
                   required : true,
               }, 
                selling_price: {
                   required : true,
               },                   
                product_code: {
                   required : true,
               }, 
                product_qty: {
                   required : true,
               }, 
                brand_id: {
                   required : true,
               }, 
                category_id: {
                   required : true,
               }, 
                subcategory_id: {
                   required : true,
               }, 
           },
           messages :{
               product_name: {
                   required : 'Please Enter Product Name',
               },
               short_descp: {
                   required : 'Please Enter Short Description',
               },
               product_thambnail: {
                   required : 'Please Select Product Thambnail Image',
               },
               multi_img: {
                   required : 'Please Select Product Multi Image',
               },
               selling_price: {
                   required : 'Please Enter Selling Price',
               }, 
               product_code: {
                   required : 'Please Enter Product Code',
               },
                product_qty: {
                   required : 'Please Enter Product Quantity',
               },
           },
           errorElement : 'span', 
           errorPlacement: function (error,element) {
               error.addClass('invalid-feedback');
               element.closest('.form-group').append(error);
           },
           highlight : function(element, errorClass, validClass){
               $(element).addClass('is-invalid');
           },
           unhighlight : function(element, errorClass, validClass){
               $(element).removeClass('is-invalid');
           },
       });
   });
   
</script>




<script> 

 $(document).ready(function(){
  $('#multi_img').on('change', function(){ //on file input change
     if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
     {
         var data = $(this)[0].files; //this file data
          
         $.each(data, function(index, file){ //loop though each file
             if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                 var fRead = new FileReader(); //new filereader
                 fRead.onload = (function(file){ //trigger function on successful read
                 return function(e) {
                     var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                 .height(80); //create image element 
                     $('#multi_img_preview').append(img); //append image to output element
                 };
                 })(file);
                 fRead.readAsDataURL(file); //URL representing the file's data.
             }
         });
          
     }else{
         alert("Your browser doesn't support File API!"); //if File API is absent
     }
  });
 });


  
//  $(document).ready(function(){
//     $('#multi_img').change(function(){
//         if (window.FileReader) {
//             var files = this.files;
//             for(let i = 0; i < files.length; i++) {
//                 if(files[i].type.startsWith("image")){
//                     var reader = new FileReader();
//                     reader.onload = function(){
//                         const img = $("<img>", {
//                             src: this.result,
//                             alt: "Image Preview",
//                             width: 100,
//                             height: 80,
//                             class: 'thumb'
//                         });
//                         $("#multi_img_preview").append(img);
//                     }
//                     reader.readAsDataURL(files[i]);
//                 }
//             }
//         }else{
//             alert("Your browser doesn't support File Reader API!");
//         }
//     });
// });


 </script>

 <script type="text/javascript">
       
       $(document).ready(function(){
          $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if (category_id) {
                $.ajax({
                   url: "{{ url('/subcategory/ajax') }}/"+category_id,
                   type: "GET",
                   dataType:"json",
                   success:function(data){
                      $('select[name="subcategory_id"]').html('');
                      var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){
                         $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                      });
                   },
                });
             } else {
                alert('danger');
             }
          });
       });
 </script>


@endsection