@extends('fontend.layout.master')
@section('content')


    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
   <style type="text/css">
         .slick-prev:before,
         .slick-next:before {
             color: black;
         }
         .slick-slide {
             transition: all ease-in-out .3s;
         }
         .small-img-group{
            display: flex;
            justify-content: space-between;
         }
         .small-img-col{
            flex-basis: 35%;
            cursor: pointer;
         }

     </style>
   @if(mobileTabletCheck()==1)
@include('fontend.product.mobile_product')
       @else
       @include('fontend.product.desktop_product')
  @endif

     <div class="container-fluid">
         <div class="row mt-5">

             <h2 class="related-product-section"><span class="related-product-title">Related Product</span></h2>
             <div class="cateory-see-all single-product-see-more"> <span class="allproduct" style="border: 2px solid #ddd;padding: 1px 13px;">See All</span> </div>

              <div class="regular-category">
                @foreach($related_products as $key=>$product)
                      <?php
                      if ($product->discount_price) {
                          $sell_price = $product->discount_price;
                      } else {
                          $sell_price = $product->product_price;
                      }
                      ?>
                         <div class="card" style="cursor: pointer"   style="width: 18rem;" onclick="location.href='{{url('/')}}/{{$product->product_name}}';"  >
                             <div>
                                 @if($product->discount > 0)
                                     <div class="discount-percent">{{$product->discount}}%</div>
                                 @endif
                                 @if($product->main_category_id==11)
                                     <div class="discount-status">New</div>
                                 @endif
                             </div>
                             <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" class="card-img-top  product-image" alt="...">
                             <div class="card-body text-center">
                                 <h5 class="card-title fw-bold" style="height:50px;overflow: hidden ">{{$product->product_title}}</h5>
                                 @if($product->product_ram_rom)
                                     <p class="card-text">({{$product->product_ram_rom}})</p>
                                 @endif
                                 <h5 class="card-title fw-bold ">{{$sell_price}} BDT</h5>
                             </div>
                         </div>
                    @endforeach

                         </div>
             </div>
         </div>
     </div>

     {{--category end--}}


     <script>


         jQuery(".regular-category").slick({
             dots: false,
             infinite: false,
             slidesToShow: 6,
             slidesToScroll: 6,
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 2,
                     infinite: true
                 }

             }, {

                 breakpoint: 600,
                 settings: {
                     slidesToShow: 2,
                     dots: false
                 }

             }, {

                 breakpoint: 300,
                //  settings: "unslick" // destroys slick
                slidesToShow: 2,
             }]

         });
     </script>



   <script>
       $(document).ready(function ($) {
           $.ajax({
               url: "{{url('/visitor')}}",
               method: "get",
               success: function (data) {
               }
           });

       });

       $('.desktop-search-field').on('input', function () {
           var search_query = $(this).val();
           if (search_query.length >= 1) {
               jQuery.ajax({
                   type: "GET",
                   url: "{{ url('search_engine/')}}?search_query=" + search_query,
                   success: function (data) {
                       $(".desktop-search-menu").show();
                       jQuery(".desktop-search-menu").html(data.html);
                   }
               });
           } else {
               jQuery(".desktop-search-menu").html('');

           }
       });


       $(document).on('click', '.add-to-wishlist', function () {
           let product_id = $(this).data("product_id"); // will return the number 123


           $.ajax({
               type: "GET",
               url: "{{url('add-to-wishlist')}}?product_id=" + product_id,
               success: function (data) {
                   console.log(data)
                   $('.mobile_wishlised').text(data)
                   $('.total-whislist-item').text(data)
                //   location.reload();
                   toastr.success('Product added to your Wishlish Successfully', '')
               }
           })

       })
       $(document).on('click', '.add_to_cart_of_product', function () {
           let product_id = $(this).data("product_id"); // will return the number 123
           let picture = $(this).data("picture"); // will return the number 123
           let quntity = parseInt($('#quantity').text());
           if (typeof quntity === 'undefined') {
               quntity = 1;
           } else {
               quntity = quntity;
           }

           $.ajax({
               type: "GET",
               url: "{{url('add-to-cart')}}?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,

               success: function (data) {
                   toastr.success('Product Added Successfully', '')
                   $('.total_cart_item_class').text(data.result.count);
                   $('.total_cart_item_class_value').text(data.result.total);
               }
           })

       })
   </script>
   <script>
       $(document).on('click', '.buy_now_of_product', function () {
           let product_id = $(this).data("product_id"); // will return the number 123
           let picture = $(this).data("picture"); // will return the number 123
           let quntity = parseInt($('#quantity').text());

           if (typeof quntity === 'undefined') {
               quntity = 1;
           } else {
               quntity = quntity;
           }
           $.ajax({
               type: "GET",
               url: "{{url('add-to-cart')}}?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,
               success: function (data) {
                   toastr.success('Product Added Successfully', '')
                   window.location.assign("{{ url('/') }}/cart")
               }
           })

       })
   </script>




@endsection