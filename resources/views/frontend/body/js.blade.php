<script>
           
   $.ajaxSetup({
       headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });





function modal(id){
// alert(id);

 $.ajax({
    type: 'GET',
url: 'product/view/modal/'+id,
success: function(data) {

    $('#pname').text(data.product.product_name);
    $('#pprice').text( '$'+(data.product.selling_price));
    $('#pcode').text(data.product.product_code);
    $('#pcategory').text(data.product.category.cat_name);
    $('#pbrand').text(data.product.brand.brand_name);
    $('#pid').val(id);
    $('#quantity').val(1);
    $('#pimage').attr({
       'src': data.product.product_cover,
    });

    // Product Price 
    if (data.product.discount_price == 0) {
        $('#pprice').text('');
        $('#oldprice').text('');
        $('#pprice').text("$"+data.product.selling_price);
    }else{
        $('#pprice').text("$"+(data.product.selling_price-data.product.discount_price));
        $('#oldprice').text("$"+data.product.selling_price); 
    } // end else


/// Start Stock Option
if (data.product.product_qty > 0) {
        $('#aviable').text('');
        $('#stockout').text('');
        $('#aviable').text('aviable');
    }else{
        $('#aviable').text('');
        $('#stockout').text('');
        $('#stockout').text('stockout');
    } 
    ///End Start Stock Option
     ///Size 
     $('select[name="selecteSize"]').empty();
    
    $.each(data.size, function(key, value) {
    if (value) {
       $('select[name="selecteSize"]').append(`<option value="${value}">${value}</option>`);
       $('#sizeArea').show();
    } else {
       $('#sizeArea').hide();
    }
    });

       $('select[name="selecteColor"]').empty();
     $.each(data.color,function(key,value){
        $('select[name="selecteColor"]').append('<option value="'+value+' ">'+value+'  </option')
        if (data.color == "") {
            $('#colorArea').hide();
        }else{
             $('#colorArea').show();
        }
     }) // end size
    }
 })
} 
//END PRODUCT VIEW WITH MODAL

//ADD TO CART OPTION START
/// Start Add To Cart Prodcut 
function addtocart(){

var product_name = $("#pname").text();
var id = $("#pid").val();
var color = $('#selecteColor option:selected').text();
var size = $('#selecteSize option:selected').text();
var quantity = $('#quantity').val();
var url = "cart/data/store/"+id;
var product = {
product_name: product_name,
color: color,
size: size,
quantity: quantity
};

$.ajax({
type: "POST",
dataType: "json",
data: product,
url: url,
success: function(data) {
 console.log(data.success);
 minicart();
  //   Swal.fire({
  //         icon: 'success',
  //         title: success.success,
  //         // text: 'Your request was successful.',
  //         // position: 'top-end',
  //         // icon: 'success',
  //         // title: 'Your work has been saved',
  //         // showConfirmButton: false,
  //         timer: 3000
  //   });
  const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

},
error: function(jqXHR, textStatus, errorThrown) {
 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
});
}
/// End Add To Cart Prodcut 

function detailsaddtocart(){
 var product_name = $("#dpname").text();
 var id = $("#dpid").val();
 var color = $('#dselecteColor option:selected').text();
 var size = $('#dselecteSize option:selected').text();
 var quantity = $('#dquantity').val();
// alert(product_name + id + color + size + quantity);

 var url = "cart/data/store/"+id;
 var product = {
 product_name: product_name,
 color: color,
 size: size,
 quantity: quantity
 };
// alert('F');
 $.ajax({
 type: "POST",
 dataType: "json",
 data: product,
 // url: "cart/data/store/"+id,
 url: `{{url('cart/data/store/${id}')}}`,
 success: function(data) {
   //  console.log(data);
    minicart();
     const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

 },
 error: function(jqXHR, textStatus, errorThrown) {
    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
 }
 });
}
/// End Add To Cart Prodcut 

//  addToCart();
//END ADD TO CART OPTION url :  "cart/data/store/"+id,
</script>



<script>
// //minicart satart


// define the function
function minicart() {
 $.ajax({
   type: 'GET',
   dataType: 'json',
   url: "{{route('MiniCart')}}",
   success: function(data) {
      $('#totalCartItem').text(data.totalCartItem);
  },
   error: function(jqXHR, textStatus, errorThrown) {
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
   }
 });
}
minicart();

//start view all cart item
function cart(){
   $.ajax({
   type: 'GET',
   dataType: 'json',
   url: `{{url('/my/cart')}}`,
   success: function(data) {
      console.log(data.subTotal);
      var rows = '';
      $.each(data.cart,function(key,value){
         rows+= `
                         <tr class="pt-30">
                            <td class="custome-checkbox pl-30"></td>
                            <td class="image product-thumbnail pt-40"><img src="{{asset('${value.product.product_cover}')}}" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{url('/product/details/${value.product.id}/${value.product.product_slug}')}}"> ${value.product.product_name} </a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            ${value.color? 
                              `<td class="price" data-title="Price">
                                <p class="text-body">${value.color} </p>
                            </td>`
                            :
                            `<td class="price" data-title="Price">
                                <p class="text-body"> --- </p>
                            </td>`

                            }
                            ${value.size ? 
                              `<td class="price" data-title="Price">
                                <p class="text-body">${value.size} </p>
                            </td>`
                            :
                            `<td class="price" data-title="Price">
                                <p class="text-body">---</p>
                            </td>`
                           }
                            
                            <td class="price" data-title="Price">
                                <h4 class="text-body">$${value.product.discount_price? value.product.selling_price -value.product.discount_price :value.product.selling_price} </h4>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink mr-15">
                                    <div class="detail-qty border radius">
                                        <a id="${value.id}" onclick="cartqtydown(this.id)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="${value.quantity}" min="1">
                                        <a id="${value.id}" onclick="cartqtyup(this.id)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-brand">$${(value.product.discount_price? value.product.selling_price -value.product.discount_price :value.product.selling_price)*value.quantity} </h4>
                            </td>
                            <td class="action text-center" data-title="Remove"><a id="${value.id}" onclick="removeToCart(this.id)" class="text-body"><i class="fi-rs-trash"></i></a></td>
                        </tr>`

      })
      $('#allcart').html(rows);
      $('#totalCartItem2').text(data.totalCartItem);
      $('#subtotal').text(data.subTotal);
      $('#totalvalue').text(data.total);
      
  },
   error: function(jqXHR, textStatus, errorThrown) {
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
   }
 });
}
cart();

//end view all cart item

// remove to cart start
function removeToCart(id){

   Swal.fire({
  title: 'Are you sure to remove it?',
//   showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Ok',
//   denyButtonText: `Cancel`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Successfully removed on your cart', '', 'success');
    $.ajax({
 type: 'get',
 dataType: 'json',
 url: 'cart/product/remove/'+id,
 success: function(data) {
 minicart();
 cart()
 
const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
},
error: function(jqXHR, textStatus, errorThrown) {
 console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
}
})
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})

}//end method
// remove to cart start

   //start cart qty down 
   function cartqtydown(id){
      $.ajax({
         type: "POST",
         dataType: 'JSON',
         url: `{{url('/cartqtydown/${id}')}}`,
         success: function(data){
            minicart();
            cart()

            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

         },
      error: function(jqXHR, textStatus, errorThrown) {
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
      })
   }
   //end cart qty down 


      //start cart qty down 
      function cartqtyup(id){
      $.ajax({
         type: "POST",
         dataType: 'JSON',
         url: `{{url('/cartqtyup/${id}')}}`,
         success: function(data){
            minicart();
            cart()

            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

         },
      error: function(jqXHR, textStatus, errorThrown) {
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
      })
   }
   //end cart qty down 

</script>




//apply_coupon start
<script>
   function apply_coupon(){
      var apply_coupon =  $('#apply_coupon').val();
      var subtotal = $('#subtotal').text();
      // alert(subtotal);
      $.ajax({
         type: 'post',
         dataType: 'json',
         data : { apply_coupon:apply_coupon,
            subtotal : subtotal
         },
         url: `{{url('/apply/coupon')}}`,
         success: function(data){
            // console.log(data);
            if(data.success){
               $('#coupon_apply_div').hide();
               $('#coupon_status_discount_show').show();

               $('#coupon_status_discount_show').html(`
                                <td class="cart_total_label">
                                 <h6 class="text-muted">Coupon <a onclick="remove_coupon()"><i class="fa-solid fa-trash"></i></a> </h6>

                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end"> ${data.code} </h4>
                                </td>
               `);
            }
            cart();
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
      })
   }
   //end apply_coupon

   function remove_coupon(){
      // alert('H');
      $.ajax({
         type: 'post',
         dataType: 'json',
         url: `{{url('/coupon/remove')}}`,
         success: function(data){
            // console.log(data);
            $('#coupon_apply_div').show();

               $('#coupon_status_discount_show').html(` `);
            cart();
            const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }




         
      })
   }



</script>




<script>
// {{-- //start addwishlist --}}

  function addwishlist(pid){

     $.ajax({
 type: "POST",
 dataType: "json",
 // url: "cart/data/store/"+id,
 url: `{{url('add/to/wishlist/${pid}')}}`,
 success: function(data) {
  //   console.log(data);
     wishlist()
     const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }

 },
 error: function(jqXHR, textStatus, errorThrown) {
    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
 }
 });
     

  }

// {{-- //end addwishlist --}}

</script>





<script>
  // {{-- //start wishlist --}}
  
     function wishlist(){
        $.ajax({
        type: "GET",
        dataType: "JSON",
        url: `{{url('get/all/wishlist')}}`,
        success: function(data) {
           // console.log(data);
           $('#totalwishlisth').text(data.totalwishlisth);
           var rows = '';

           $.each(data.wishlist,function(key,value){
              rows += `
              
                           <tr class="pt-30">
                               <td class="custome-checkbox pl-30"></td>
                               <td class="image product-thumbnail pt-40"><img src="${value.product.product_cover}" alt="#"></td>
                               <td class="product-des product-name">
                                   <h6><a class="product-name mb-10" href="{{url('product/details/${value.product.id}/${value.product.product_slug}')}}">${value.product.product_name}</a></h6>
                                   <div class="product-rate-cover">
                                       <div class="product-rate d-inline-block">
                                           <div class="product-rating" style="width: 90%"></div>
                                       </div>
                                       <span class="font-small ml-5 text-muted"> (4.0)</span>
                                   </div>
                               </td>
                               <td class="price" data-title="Price">
                                   <h3 class="text-brand">$${value.product.discount_price?value.product.selling_price-value.product.discount_price : value.product.selling_price}</h3>
                               </td>
                               <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty > 0
                                ?
                                `<span class="stock-status in-stock mb-0"> In Stock </span>`
                                :`<span class="stock-status out-stock mb-0"> In Stock </span>`
                                }

                               </td>
                               <td class="action text-center" data-title="Remove">
                               <a aria-label="Quick view" class="action-btn btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" id="${value.product.id}" onclick="modal(this.id)" ><i class="fi-rs-eye"></i></a>
                             </td>

                               <td class="action text-center" data-title="Remove">
                                   <a type="submit" id="${value.product.id}" onclick="wishlistremove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a>
                               </td>
                           </tr>
              `
           });
  $('#wishlist').html(rows);
        

    },
    error: function(jqXHR, textStatus, errorThrown) {
       console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
    });
        
     }

     wishlist();
  
  // {{-- //end wishlist --}}


  function wishlistremove(id){
     $.ajax({
        type: 'post',
        dataType: 'json',
        url: `{{url('wishlist/remove/${id}')}}`,
        success: function(data){
            wishlist();
           console.log(data.success);
           const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
        }

     })
  }
  
  </script>




{{-- //start Compare --}}
<script>
  // addcompare
  function addcompare(id){
     $.ajax({
        type: 'GET',
        dataType:'JSON',
        url: `{{url('add/compare/${id}')}}`,
        success: function(data){
           console.log(data);
           compare();


           const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
        }
     })
     }


     //all compare
     function compare(){
        $.ajax({
        type: "GET",
        dataType: "JSON",
        url: `{{url('get/all/compare')}}`,
        success: function(data) {
           // console.log(data);

           $('#totalcompare').text(data.totalcompare);

           //image part
           var c_image = '<td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>';
           var c_title = '<td class="text-muted font-sm fw-600 font-heading">Name</td>';
           var c_price = '<td class="text-muted font-sm fw-600 font-heading">Price</td>';
           var c_rating = '<td class="text-muted font-sm fw-600 font-heading">Rating</td>';
           // var c_des = ' <td class="text-muted font-sm fw-600 font-heading">Description</td>';
           var c_stock_status = '<td class="text-muted font-sm fw-600 font-heading">Stock status</td>';
           var c_weight = '<td class="text-muted font-sm fw-600 font-heading">Weight</td>';
           var c_addtocart = '<td class="text-muted font-sm fw-600 font-heading">Buy now</td>';
           var action = '<td class="text-muted font-md fw-600">Action</td>';

           $.each(data.compare,function(key,value){
              c_image += `
              <td class="row_img"><img style="hight:110px; width:90px;" src="${value.product.product_cover}" alt="compare-img" /></td>
              `
              c_title += `
              <td class="product_name">
                 <h6><a  class="text-heading">${value.product.product_name.substring(0,20)}...</a></h6>
              </td>
              `
              c_price += `
              <td class="product_price">
                 <h4 class="price text-brand">$${value.product.discount_price?value.product.selling_price - value.product.discount_price: value.product.selling_price }</h4>
              </td>
              `
              c_rating += `
              <td>
                  <div class="rating_wrap">
                    <div class="product-rate d-inline-block">
                    <div class="product-rating" style="width: 90%"></div>
                   </div>
                  <span class="rating_num">(121)</span>
                  </div>
              </td>
              `
           // c_des += `
           //    <td class="row_text font-xs">
           //      <p class="font-sm text-muted"> ${value.product.long_des} </p>
           //    </td>
           //    `
           c_stock_status += `
              ${
                 value.product.product_qty > 0 ? 
                 `<td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td>`
                 :
                 `<td class="row_stock"><span class="stock-status out-stock mb-0">Out of stock</span></td>`
              }
              `
              c_weight += `

              <td class="row_weight">380 gram</td>
              `
              c_addtocart += `
              ${value.product.product_qty > 0 ? `<td class="row_btn">
                  <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
              </td>` : 
              `<td class="row_btn">
                 <button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>Contact Us</button>
             </td>`
              }

              `
              action += `
              <td class="row_remove">
                 <a id="${value.product.id}" onclick="removecompare(this.id)" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
              </td>
              `
           });
           $('#c_image').html(c_image);
           $('#c_title').html(c_title);
           $('#c_price').html(c_price);
           $('#c_rating').html(c_rating);
           // $('#c_des').html(c_des);
           $('#c_stock_status').html(c_stock_status);
           $('#c_weight').html(c_weight);
           $('#c_addtocart').html(c_addtocart);
           $('#action').html(action);


        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
        });
              
           }

     compare();

     //remove compare start
     function removecompare(id){
        $.ajax({
           type: 'post',
           dataType: 'json',
           url: `{{url('compare/remove/${id}')}}`,
           success: function(data){
              compare();
              const Toast = Swal.mixin({
                 toast: true,
                 position: 'top-end',
                 icon: 'success', 
                 showConfirmButton: false,
                 timer: 3000 
           })
           if ($.isEmptyObject(data.error)) {
                   
                   Toast.fire({
                   type: 'success',
                   title: data.success, 
                   })
           }else{
              
          Toast.fire({
                   type: 'error',
                   icon: 'error',
                   title: data.error, 
                   })
               }
           }
        })
     }
     //end remove compare
</script>
{{-- //end Compare --}}



//checkout start
<script>

   //  $("#selecte_division").change(function() {
   //      var division_id = $(this).val();
   //   $('#division_id').empty();
   //    $.ajax({
   //       type: 'get',
   //       dataType: 'json',
   //       url: `{{url('/get/district_by_division/${division_id}')}}`,
   //       success: function(data){
   //          // console.log(data.success);

   //          var row +=  '<option selected disabled>Select District</option>';
   //          $.each(data.success,(key, value){

   //             `<option value="${value.id}">${value.district_name}</option>
               
   //             `
   //          })

   //          $('#selecte_district').html(row);
   //       }

   //  })
   //  })

   $("#user_divishion").change(function() {
    var division_id = $(this).val();

   //  $('#division_id').empty();
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: `{{url('/get/district_by_division/${division_id}')}}`,
        success: function(data){
         $('#user_district').prop('disabled', false);
            var row = '<option selected disabled>Select District</option>';
            $.each(data.success, function(key, value){
                row += `<option value="${value.id}">${value.district_name}</option>`;
            });
            $('#user_district').html(row);
        }
    });
});

$('#user_district').change(function(){
            // Get the selected district ID
            // var district_id = $('#user_district').val();
            var district_id = $(this).val();
            // alert(district_id);
            $.ajax({
               type: 'get',
               dataType: 'json',
               url: `{{url('/get/upazila_by_district/${district_id}')}}`,
               success: function(data){
                  $('#user_upazila').prop('disabled', false);
                  var row = '<option selected disabled>Select Upazila</option>';
                  $.each(data.success, function(key, value){
                        row += `<option value="${value.id}">${value.upazila_name}</option>`;
                  });
                  $('#user_upazila').html(row);
               }
            });
})


</script>

//checkout start




























//sslcommerz start
<script>
   var obj = {};
   obj.cus_name = $('#customer_name').val();
   obj.cus_phone = $('#mobile').val();
   obj.cus_email = $('#email').val();
   obj.cus_addr1 = $('#address').val();
   obj.amount = $('#total_amount').val();
   
   $('#sslczPayBtn').prop('postdata', obj);
 
</script>

<script>
   (function (window, document) {
       var loader = function () {
           var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
           script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
           tag.parentNode.insertBefore(script, tag);
       };

       window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
   })(window, document);
</script>


{{-- <script>

var obj = {
  cus_name: $('#customer_name').val(),
  cus_phone: $('#mobile').val(),
  cus_email: $('#email').val(),
  cus_addr1: $('#address').val(),
  amount: $('#total_amount').val()
};

$('#sslczPayBtn').prop('postdata', obj);

$(window).on('load', function () {
  $('<script>').attr('src', 'https://sandbox.sslcommerz.com/embed.min.js?' + Math.random().toString(36).substring(7))
                .insertBefore($('script')[0]);
});


</script> --}}

//sslcommerz end
