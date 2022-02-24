<script src="{{asset('fontend')}}/assets/js/jquery-1.11.1.min.js"></script>
    
    <script src="{{asset('fontend')}}/assets/js/bootstrap.min.js"></script>
    
    <script src="{{asset('fontend')}}/assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/owl.carousel.min.js"></script>
    
    <script src="{{asset('fontend')}}/assets/js/echo.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/jquery.easing-1.3.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/jquery.rateit.min.js"></script>
    <script type="{{asset('fontend')}}/text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/wow.min.js"></script>
    <script src="{{asset('fontend')}}/assets/js/scripts.js"></script>
    <script src="{{ asset('fontend') }}/assets/js/sweetalert2@8.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript">
    </script>

    
    <script type="text/javascript" src="{{ asset('common') }}/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
          lang: 'en'
        });
      </script>
          <!-- toaster js cdn link -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;

            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
    @endif
    </script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

    //start product view with modal
    function productView(id){
        $.ajax({
            type:'GET',
            url: '/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
               $('#pname').text(data.product.product_name_en);
               $('#price').text(data.product.selling_price);
               $('#pcode').text(data.product.product_code);
               $('#pcategory').text(data.product.category.category_name_en);
               $('#pbrand').text(data.product.brand.brand_name_en);
               $('#pimage').attr('src','/'+data.product.product_thambnail);
               $('#product_id').val(id);
               $('#qty').val(1);
                //product price
               if (data.product.discount_price == null) {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').text(data.product.selling_price);
               }else{
                $('#pprice').text(data.product.discount_price);
                $('#oldprice').text(data.product.selling_price);
               }

               //stock
               if (data.product.product_qty > 0) {
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#aviable').text('aviable');
               }else{
                    $('#aviable').text('');
                    $('#stockout').text('');
                    $('#stockout').text('stockout');
               }

               //color
               $('select[name="color"]').empty();
               $.each(data.color,function(key,value){
                    $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
               })
               //size
               $('select[name="size"]').empty();
               $.each(data.size,function(key,value){
                    $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')
                    if (data.size == "") {
                        $('#sizeArea').hide();
                    }else{
                        $('#sizeArea').show();
                    }
               })


            }
        })
    }
      //end product view with modal

//Start add to cart product
    function addToCart(){
         var product_name = $('#pname').text();
         var id = $('#product_id').val();
         var color = $('#color option:selected').text();
         var size = $('#size option:selected').text();
         var quantity = $('#qty').val();

         $.ajax({
             type: "POST",
             dataType: 'json',
             data:{
                 color:color, size:size, quantity:quantity, product_name:product_name
             },
             url: "/cart/data/store/"+id,
             success:function(data){
                miniCart();
                 $('#closeModal').click();
                 //  start message
                 const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
             }
         })
    }
//End add to cart product
</script>
@yield('scripts')
<script>
    function miniCart(){
        $.ajax({
            type:'GET',
            url: '/product/mini/cart',
            dataType:'json',
            success:function(response){
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
               $.each(response.carts, function(key,value){
                   miniCart += `<div class="cart-item product-summary">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="image">
                                <a href="detail.html"><img src="/${value.options.image}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                            <div class="price">${value.price}</div>
                        </div>
                        <div class="col-xs-1 action">
                            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div><!-- /.cart-item -->
                <div class="clearfix"></div> <hr>`

               });

               $('#miniCart').html(miniCart);

            }
        })
    }
    miniCart();

    /// mini cart remove start
    function miniCartRemove(rowId){
        $.ajax({
            type:'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
                miniCart();
                //  start message
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
            }
        });
    }
    // mini cart remove end

</script>
<script>
    function addToWishlist(product_id){

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "{{ url('/add-to-wishlist/') }}/"+product_id,
            success:function(data){
                //  start message
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                    })

                    if($.isEmptyObject(data.error)){
                        Toast.fire({
                        type: 'success',
                        title: data.success
                        })
                    }else{
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                //  end message
            }
        })
    }
</script>

{{-- =============wishlist page ================== --}}
<script>
    function wishlist(){
        $.ajax({
            type:'GET',
             url: "{{ url('/user/get-wishlist-product') }}",
            dataType:'json',
            success:function(response){
                var rows = ""
               $.each(response, function(key,value){
                   rows += `<tr>
                    <td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>

                        <div class="price">
                        ${value.product.discount_price == null
                            ? `$${value.product.selling_price}`
                            :
                            `$${value.product.discount_price} <span>$${value.product.selling_price}</span>`
                        }
                        </div>
                    </td>
                    <td class="col-md-2">
                        <button class="btn-upper btn btn-primary" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
                    </td>
                    <td class="col-md-1 close-btn">
                        <button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-times"></i></button>
                    </td>
                </tr>`

               });

               $('#wishlist').html(rows);

            }
        })
    }
    wishlist();

    function wishlistRemove(id){
        $.ajax({
            type:'GET',
            url: "{{ url('/user/wishlist-remove/') }}/"+id,
            dataType:'json',
            success:function(data){
                wishlist();
                //  start message
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
            }
        });
    }
</script>
{{-- //end wishlist --}}



{{-- =============wishlist page ================== --}}

{{-- ================= start cart page ====================== --}}
<script>
    function cart(){
        $.ajax({
            type:'GET',
             url: "{{ url('/get-cart-product') }}",
            dataType:'json',
            success:function(response){
                var rows = ""
               $.each(response.carts, function(key,value){
                   rows += `<tr>
                    <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="height:60px; width:60px;"></td>
                    <td class="col-md-2">
                        <div class="product-name"><strong>${value.name}</strong></div>

                        <strong>
                        $${value.price}
                        </strong>
                    </td>

                    <td class="col-md-2">

                        <strong>${value.options.color}</strong>
                    </td>
                    <td class="col-md-2">
                        ${value.options.size == null
                            ? `<span >......</span>`
                            :
                            `<strong>${value.options.size}</strong>`
                        }

                    </td>

                    <td class="col-md-2">
                        ${value.qty > 1
                        ? ` <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                        : ` <button type="submit" class="btn btn-success btn-sm" disabled>-</button>`
                        }

                        <input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
                        <button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-danger btn-sm">+</button>
                    </td>

                    <td class="col-md-1">
                        <strong>$${value.subtotal}</strong>
                    </td>

                    <td class="col-md-1 close-btn">
                        <button type="submit" class="" id="${value.rowId}" onclick="CartRemove(this.id)" ><i class="fa fa-times"></i></button>
                    </td>
                </tr>`

               });

               $('#cartPage').html(rows);

            }
        })
    }
    cart();

    function CartRemove(id){
        $.ajax({
            type:'GET',
            url: "{{ url('/cart-remove/') }}/"+id,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
                couponCalculation();
                 $('#couponField').show();
                 $('#coupon_name').val('');
                //  start message
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
            }
        });
    }

    // ============ cart increment==============
    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "{{ url('/cart-increment/') }}/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
    // ============ cart increment end==============

// ============ cart deccrement==============
    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "{{ url('/cart-decrement/') }}/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
 }


</script>
{{-- ================= end cart page ====================== --}}
{{-- ===================== coupon apply start ===============  --}}
<script>
    function applyCoupon(){
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data: { coupon_name:coupon_name},
            url: "{{ url('/coupon-apply') }}",
            success:function(data){
                couponCalculation();
                if (data.validity == true) {
                 $('#couponField').hide();
                }
                   // $('#couponField').css("display","none");
                 //  start message
                 const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                        $('#coupon_name').val('');
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
            }
        });
    }

    function couponCalculation(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-calculation') }}",
            dataType:'json',
            success:function(data){
               if (data.total) {
                    $('#couponCalField').html(`
                    <tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$ ${data.total}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$${data.total}</span>
                        </div>

                    </th>
                </tr>
                `)
               }else{
                $('#couponCalField').html(`
                <tr>
                <th>
                    <div class="cart-sub-total">
                        Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                    </div>
                    <div class="cart-sub-total">
                        Coupon<span class="inner-left-md">${data.coupon_name} </span>
                        <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="cart-sub-total">
                        Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
                    </div>
                    <div class="cart-grand-total">
                        Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                    </div>

                </th>
            </tr>
            `)
               }
            }
        });
    }
    couponCalculation();


</script>
{{-- ===================== coupon apply end ===============  --}}
<script>
     //remove coupon
     function couponRemove(){
        $.ajax({
            type:'GET',
            url: "{{ url('/coupon-remove') }}",
            dataType:'json',
            success:function(data){
                couponCalculation();
                
                $('#couponField').show();
                // $('#couponField').css("display","");
                $('#coupon_name').val('');
                //  start message
                const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                      })

                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
                     }
                    //  end message
            }
        });
    }
</script>

//search product
<script>
    $("body").on("keyup","#search",function () {
        let searchData = $("#search").val();
        if (searchData.length > 0) {
            $.ajax({
            type:'POST',
            url: "{{ url('/find-products') }}",
            data:{search:searchData},
            success:function(result){
                $('#suggestProduct').html(result)
            }
            });
        }

        if(searchData.length < 1) $('#suggestProduct').html("");
    })
</script>


<script>
    function showSearchResult(){
        $('#suggestProduct').slideDown();
    }

    function hideSearchResult(){
        $('#suggestProduct').slideUp();
    }
</script>