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


     </style>

        <!-- desktop slider section  start -->
     <div class="container-fluid desktop-slider">
         <div class="row">
             <div class="col-lg-3 desktop-menu ">
             @include('fontend.partial.desktop_home_left_menu')
             </div>
             <div class="col-lg-9 mt-3">
             @include('fontend.partial.desktop_slider')

                 <div class="row mt-5  ">
                     <div class="col-lg-10 d-flex flex-row">
                     
                     <img src="{{url('/')}}/images/Icon/Category Bar 1.png" width="50" class="product-category-bottom-slider-picture img-fluid">
                     <h4 class="product-category-title">Product Category</h4>

                    </div>
                    <div class="col-lg-2 text-end">
                    <div class="slider-botoom-see-all">See All</div>
                    </div>

                    
                     <div class="regular">
                         @for($i=0;$i<=12;$i++)
                     <div class=" d-flex flex-row">
                         <div class="slider-bottom-singe-category">
                         <img src="{{url('/')}}/images/Icon/Smartphone 6.png"  class="img-fluid"/>
                         <h2 class="home-product-category-title">Smartphone Collections</h2>
                        </div>
                     </div>
                    @endfor
                     </div>


                 </div>
              </div>
         </div>
     </div>



     <!-- desktop slider section  end -->


  {{--category start --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-xxl-12">
            <img src="{{url('/')}}/images/Icon/Smart Phone Bar 22-01 6.png"  class="img-fluid" style="width: 100%;"/>
        </div>
    </div>
</div>




     <div class="container-fluid">
         <div class="row mt-5">

             <div class="cateory-see-all"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
             <div class="regular-category">
                 @for($i=0;$i<=12;$i++)

                 @if($i !=12)
                     <div class="card"  style="width: 18rem;" >
                         <div>
                             <div class="discount-percent">{{$i}}%</div>
                             <div class="discount-status">New</div>
                         </div>
                         <img src="{{url('/')}}/images/Icon/X70 Pro-10 7.png" class="card-img-top" alt="...">
                         <div class="card-body text-center">
                             <h5 class="card-title fw-bold">Vivo X70 Pro</h5>
                             <p class="card-text">(8/128GB)</p>
                             <h5 class="card-title fw-bold ">70,000 BDT</h5>
                         </div>
                         <div class="cart-section d-flex justify-content-around mb-3">
                             <button class="btn btn-default cart-style">ADD TO CART</button>
                             <button class="btn btn-default cart-style">BUY NOW</button>
                             <i class="far fa-heart btn btn-default fs-2"></i>

                         </div>
                     </div>
                     @else
                         <div class="card"  style="width: 18rem;
height: 529px;" >

                             <img src="{{url('/')}}/images/Icon/See More Items.png"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">

                         </div>
                     @endif

                 @endfor
             </div>

         </div>
     </div>



     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12 col-xl-12 col-xxl-12">
                 <img src="{{url('/')}}/images/Icon/Smart Phone Bar 22-01 3.png"  class="img-fluid" style="width: 100%;"/>
             </div>
         </div>
     </div>

     <div class="container-fluid">
         <div class="row mt-5">

             <div class="cateory-see-all"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
             <div class="regular-category">
                 @for($i=0;$i<=12;$i++)

                     @if($i !=12)
                         <div class="card"  style="width: 18rem;" >
                             <div>
                                 <div class="discount-percent">{{$i}}%</div>
                                 <div class="discount-status">New</div>
                             </div>
                             <img src="{{url('/')}}/images/Icon/X70 Pro-10 7.png" class="card-img-top" alt="...">
                             <div class="card-body text-center">
                                 <h5 class="card-title fw-bold">Vivo X70 Pro</h5>
                                 <p class="card-text">(8/128GB)</p>
                                 <h5 class="card-title fw-bold ">70,000 BDT</h5>
                             </div>
                             <div class="cart-section d-flex justify-content-around mb-3">
                                 <button class="btn btn-default cart-style">ADD TO CART</button>
                                 <button class="btn btn-default cart-style">BUY NOW</button>
                                 <i class="far fa-heart btn btn-default fs-2"></i>

                             </div>
                         </div>
                     @else
                         <div class="card"  style="width: 18rem;
height: 529px;" >

                             <img src="{{url('/')}}/images/Icon/See More Items.png"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">

                         </div>
                     @endif

                 @endfor
             </div>

         </div>
     </div>


     <div class="container-fluid">
         <div class="row">
             <div class="col-lg-12 col-xl-12 col-xxl-12">
                 <img src="{{url('/')}}/images/Icon/Rectangle 1119.png"  class="img-fluid" style="width: 100%;"/>
             </div>
         </div>
     </div>

     {{--category end--}}

<script>
    jQuery(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                infinite: true
            }

        }, {

            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                dots: true
            }

        }, {

            breakpoint: 300,
            settings: "unslick" // destroys slick

        }]

    });
</script>

     <script>
         jQuery(".regular-category").slick({
             dots: false,
             infinite: true,
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
                     dots: true
                 }

             }, {

                 breakpoint: 300,
                 settings: "unslick" // destroys slick

             }]

         });
     </script>

@endsection