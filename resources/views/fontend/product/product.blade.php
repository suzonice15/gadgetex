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
                 @for($i=0;$i<=12;$i++)

                     @if($i !=12)
                         <div class="card"  style="width: 18rem;" >
                             <div>
                                 <div class="discount-percent">{{$i}}%</div>
                                 <div class="discount-status">New</div>
                             </div>
                             <img src="{{asset('/images/ICON/X70 Pro-10 7.png')}}" class="card-img-top" alt="...">
                             <div class="card-body text-center">
                                 <h5 class="card-title fw-bold">Vivo X70 Pro</h5>
                                 <p class="card-text">(8/128GB)</p>
                                 <h5 class="card-title fw-bold ">70,000 BDT</h5>
                             </div>
                         </div>
                     @else
                         <div class="card"  style="width: 18rem;
height: 529px;" >

                             <img src="{{asset('/images/ICON/SeeMoreItems.png')}}"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">

                         </div>
                     @endif

                 @endfor
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