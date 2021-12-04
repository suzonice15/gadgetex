@extends('fontend.layout.master')
@section('content')
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
                                 <div class="discount-percent">{{$key}}%</div>
                                 <div class="discount-status">New</div>
                             </div>
                             <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" class="card-img-top" alt="...">
                             <div class="card-body text-center">
                                 <h5 class="card-title fw-bold" style="height:30px;overflow: hidden ">{{$product->product_title}}</h5>
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



@endsection