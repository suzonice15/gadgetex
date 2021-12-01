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

    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">New Arrival >></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">Smartphone   >></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">Smartphone  Vivo Y29</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container-fluid px-4 mt-3">
        <div class="row">
            <div class="col-lg-9 col-xl-9 col-xxl-9">
                <div class="row">
                     {{--main picture --}}
                    <div class="col-lg-5 col-xl-5 col-xx-5">

                        <img src="{{asset('/images/ICON/Y21-10 1.png')}}" id="MainImg" class="img-fluid w-100 pd-5">

                        {{--<div class="small-img-group">--}}
                            {{--<div class="small-img-col">--}}
                                 {{--<img src="{{url('/')}}/uploads/100/100.Y11.png" width="100%" class="small-img">--}}
                            {{--</div>--}}
                            {{--<div class="small-img-col">--}}
                                 {{--<img src="{{url('/')}}/images/Icon/Y21-10 1.png" width="100%" class="small-img">--}}
                            {{--</div>--}}
                            {{--<div class="small-img-col">--}}
                                 {{--<img src="{{url('/')}}/images/Icon/Y21-10 1.png" width="100%" class="small-img">--}}
                            {{--</div>--}}
                            {{--<div class="small-img-col">--}}
                                 {{--<img src="{{url('/')}}/images/Icon/Y21-10 1.png" width="100%" class="small-img">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>

                    <div class="col-lg-7 col-xl-7 col-xx-7 px-4" style="-webkit-box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);
box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);">
                        <h2 class="text-center pt-3">Vivo Vy2 (4GB/12GB)</h2>

                        <div class="row">
                            <div class="col-6 ps-3"><h2 class="font-weight-bold">Brand :</h2></div>
                            <div class="col-6 text-end pe-5"><img src="{{asset('/images/ICON/vivo Mobile Official Logo 1.png')}}" class="img-fluid" /> </div>
                        </div>

                        <div class="row d-flex flex-row justify-content-around">
                            <div class="col-4">
                                <h4 class="available-desktop-header">In Stock</h4>
                                <h4 class="available-desktop">Available</h4>
                            </div>
                            <div class="col-4">
                                <h4 class="available-desktop-header">EMI</h4>
                                <h4 class="available-desktop">Available</h4>
                            </div>
                            <div class="col-4">
                                <h4 class="available-desktop-header">Warranty</h4>
                                <h4 class="available-desktop">12 Months</h4>
                            </div>
                        </div>



                        <div class="row ">
                            <div class="col-12 d-flex flex-row justify-content-around">
                                <h4 class="">Color:</h4>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                       Black
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                       White
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Red
                                    </label>
                                </div>

                            </div>

                        </div>



                        <div class="row d-flex flex-row justify-content-end mt-3">

                            <div class="col-lg-4">
                                <div class="QuantitySection"><div class="Dcrement">-</div><span class="Quantity" id="quantity">1</span><div class="Increment">+</div></div>

                            </div>
                            <div class="col-lg-4">

                                <a href="" class="btn btn-success btn-sm add-to-cart" >ADD TO CART</a>

                            </div>
                            <div class="col-lg-4">
                                <a href="" class="btn btn-success btn-sm buy-now"  >BUY NOW</a>
                            </div>


                        </div>


                        <div class="  d-flex flex-row justify-content-around mt-5">
                                <a href="" class="btn btn-success btn-sm add-to-wishlished"   > <i class="fal fa-heart  me-2" style=""></i>Add to Wishlist</a>
                                <a href="" class="btn btn-success btn-sm add-to-compare" > <i class="fas fa-search-plus me-2"></i>    Compare</a>
                            </div>

                        <div class="d-flex flex-row justify-content-center mt-5 ">
                            <h3>Share to | </h3>
                            <i class="fab fa-facebook  social-padding-of-single-product"></i>
                            <i class="fab fa-instagram  social-padding-of-single-product"></i>
                            <i class="fab fa-linkedin  social-padding-of-single-product "></i>
                            <i class="fab fa-twitter  social-padding-of-single-product"></i>
                            <i class="fab fa-whatsapp  social-padding-of-single-product"></i>
                        </div>

                        </div>




                        </div>

                    <div class="col-lg-12 col-xl-12 col-xx-12 mt-5">

                        <div class="row d-flex flex-row justify-content-around">
                            <div class="specification-div">
                                <h4 class="specification-header">Specifications</h4>
                            </div>
                            <div class="specification-div">
                                <h4 class="specification-header">More Details</h4>
                            </div>
                            <div class="specification-div">
                                <h4 class="specification-header">Waranty Policy</h4>
                            </div>
                            <div class="specification-div">
                                <h4 class="specification-header">Tems</h4>
                            </div>
                            <div class="specification-div">
                                <h4 class="specification-header">Riviews</h4>
                            </div>
                        </div>

                        <div class="specification-data">
                            <table class="table table-bordered">

                                <tbody>
                                <tr>
                                    <td>Colors</td>
                                    <td>Obsidian Black, Dawn White</td>
                                </tr>
                                <tr>
                                    <td>SIM</td>
                                    <td>Dual Nano SIM</td>
                                </tr>
                                <tr>
                                    <td>Rom</td>
                                    <td>4GB</td>
                                </tr>
                                <tr>
                                    <td>Ram</td>
                                    <td>64GB</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>6.51 inches</td>
                                </tr>
                                <tr>
                                    <td>Battery</td>
                                    <td>5000</td>
                                </tr>
                                <tr>
                                    <td>Network</td>
                                    <td>2G, 3G, 4G</td>
                                </tr>
                                <tr>
                                    <td>Ram</td>
                                    <td>64GB</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>6.51 inches</td>
                                </tr>
                                <tr>
                                    <td>Battery</td>
                                    <td>5000</td>
                                </tr>
                                <tr>
                                    <td>Network</td>
                                    <td>2G, 3G, 4G</td>
                                </tr>
                                <tr>
                                    <td>Ram</td>
                                    <td>64GB</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>6.51 inches</td>
                                </tr>
                                <tr>
                                    <td>Battery</td>
                                    <td>5000</td>
                                </tr>
                                <tr>
                                    <td>Network</td>
                                    <td>2G, 3G, 4G</td>
                                </tr>


                                </tbody>
                            </table>

                        </div>

                </div>

            </div>

            <div class="col-lg-3 col-xl-3 col-xxl-3">
                <div class="row">
                    @for($i=0;$i<3;$i++)
                        <div class="col-12 mb-3">
                            <img src="{{asset('/images/ICON/Rectangle 1352.png')}}" class="img-fluid w-100" />
                        </div>
                    @endfor
                </div>

            </div>

     </div>


    </div>
        </div>




     <div class="container-fluid">
         <div class="row mt-5">

             <h2 class="related-product-section"><span class="related-product-title">Related Product</span></h2>
             <div class="cateory-see-all single-product-see-more"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>

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

                             <img src="{{asset('/images/ICON/See More Items.png')}}"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">

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