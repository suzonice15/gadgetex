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
             @if(mobileTabletCheck()==0)
             @include('fontend.partial.desktop_home_left_menu')
             @endif
             </div>
             <div class="col-lg-9 mt-3">
             @include('fontend.partial.desktop_slider')
                 <div class="row mt-5  ">
                     <div class="col-lg-10 d-flex flex-row">

                     <img src=" {{asset('/images/ICON/Category Bar 1.png')}}" width="50" class="product-category-bottom-slider-picture img-fluid">
                     <h4 style="font-size: 16px" class="product-category-title">Product Category</h4>

                    </div>
                    <div class="col-lg-2 text-end">
                    <div class="slider-botoom-see-all">See All</div>
                    </div>


                     <div class="regular">
                         @for($i=0;$i<=12;$i++)
                     <div class=" d-flex flex-row">
                         <div class="slider-bottom-singe-category">
                         <img src=" {{asset('/images/ICON/Smartphone 6.png')}}"  class="img-fluid"/>
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


     <?php
     $home_cat_section = explode(",", get_option('home_cat_section'));
     Arr::forget($home_cat_section,'0');


     if($home_cat_section){
         foreach ($home_cat_section as  $category) {
             //  $category_id=$category->category_id;
             $category_info = get_category_info($category);
             $products= DB::table('product')->select('product.product_id','product_title','product_name','discount_price','product_price','folder','feasured_image')
                     ->where('product.main_category_id',$category)
                     ->where('status','=',1)->orderBy('modified_time','desc')
                     ->paginate(12);
             ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-xxl-12">
            <img src=" {{asset('/images/ICON/Smart Phone Bar 22-01 6.png')}}"  class="img-fluid" style="width: 100%;"/>
        </div>
    </div>
</div>

     <div class="container-fluid">
         <div class="row mt-5">

             <div class="cateory-see-all"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
             <div class="regular-category">
                @foreach($products as $key=>$product)

                 @if($key !=10)
                     <div class="card"  style="width: 18rem;" >
                         <div>
                             <div class="discount-percent">{{++$key}}%</div>
                             <div class="discount-status">New</div>
                         </div>
                         <img src="{{ asset('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" class="card-img-top" alt="...">
                         <div class="card-body text-center">
                             <h5 class="card-title fw-bold">Vivo X70 Pro</h5>
                             <p class="card-text">(8/128GB)</p>
                             <h5 class="card-title fw-bold ">70,000 BDT</h5>
                         </div>

                     </div>
                     @else
                         <div class="card"  style="width: 18rem;
height: 529px;" >

                             <img src=" {{asset('/images/ICON/see.png')}}"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">

                         </div>
                     @endif

                 @endforeach
             </div>

         </div>
     </div>

     <?php } }?>


<!-- =================my offer============= -->
<section style="background:#EEEEEE">
    <div class="container-fluid mbmyoffer p-5">
        <div class="row">
            <div class="col-6">
                <div class="myoffer-title d-flex">
                    <img style="width:40px;z-index: 99;" src="{{asset('/images/ICON/myoffer.png')}}" alt="">
                    <span class="mytitletext">My Offers</span>
                    <span class="offerlist">7</span>
                </div>
            </div>
            <div class="col-6">
            <div class="cateory-see-all see-all"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
            </div>
            <div class="col-12 mbnomargin mt-5">
            <div class="myoffer-slide">
            <div>
                <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#00853e" class="fas fa-circle"></i><span class="offernumber"> 5</span>
                    <div class="offbox1 offbox">
                        <img src="{{asset('/images/ICON/Offer_Campaign2.png')}}" alt="">
                        <h4>Campaign</h4>
                        <p>When Campaign Starts Open for All</p>
                    </div>
                </div>
            </div>
            <div>
            <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#B700C7" class="fas fa-circle"></i><span class="offernumber"> ?</span>
                    <div class="offbox2 offbox">
                        <img src="{{asset('/images/ICON/hpd.png')}}" alt="">
                        <h4>Happy Friday</h4>
                        <p>Only for Friday Open for All </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#00853e" class="fas fa-circle"></i><span class="offernumber"> 3</span>
                    <div class="offbox3 offbox">
                        <img src="{{asset('/images/ICON/oqc.png')}}" alt="">
                        <h4>Quiz Crown</h4>
                        <p>When Quiz Starts Open for All </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#00853e" class="fas fa-circle"></i><span class="offernumber"> 5</span>
                    <div class="offbox3 offbox">
                        <img src="{{asset('/images/ICON/oqc.png')}}" alt="">
                        <h4>Quiz Crown</h4>
                        <p>When Quiz Starts Open for All </p>
                    </div>
                </div>
            </div>


            </div>
            </div>
        </div>
    </div>
</section>
<!-- =================my offer end============= -->
<!-- ==============our trusted brand =========== -->
<section>
    <div class="container-fluid mbnopad p-5">
        <div class="row">
            <div class="col-6">
                <div style="margin-left: 25px;padding-top:20px;" class="myoffer-title trustedtitle d-flex">
                    <img style="width: 66px;z-index: 99;position: absolute;margin-left: -38px; margin-top: -16px;" src="{{asset('/images/ICON/trusted.png')}}" alt="">
                    <span class="mytitletext trasted">Our Trusted Brands</span>
                    <span class="traslist">45</span>
                </div>
            </div>
            <div class="col-6">
            <div class="cateory-see-all see-all mball"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
            </div>
            <div class="col-12 mt-5">
                <div class="trasted-brand">
                    <div>
                        <button> Apple</button>
                    </div>
                    <div>
                        <button>Samsung</button>
                    </div>
                    <div>
                        <button>Vivo</button>
                    </div>
                    <div>
                        <button>Oppo</button>
                    </div>
                    <div>
                        <button>Xiaomi</button>
                    </div>
                    <div>
                        <button>Motorola</button>
                    </div>
                    <div>
                        <button>Motorola</button>
                    </div>
                    <div>
                        <button>Vivo</button>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>
<!-- ==============our trusted brand end=========== -->
<!-- ==============Customers’ Comment =========== -->
<section style="background: #EEEEEE;">
    <div class="container-fluid mbnopad p-5">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div style="margin-left: 25px;" class="myoffer-title trustedtitle d-flex">
                    <img style="width: 102px;z-index: 99;position: absolute;margin-left: -49px;margin-top: -8px;" src="{{asset('/images/ICON/saying.png')}}" alt="">
                    <span style="background-image:url({{asset('/images/ICON/rec.png')}});background-repeat: no-repeat; background-size: 100% 100%;background-position: 100%;" class="mytitletext custom-comment"><span class="comments">Customers’ Comment</span></span>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
            <div  class="cateory-see-all see-all commall"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
            </div>
            <div class="col-lg-12 mbnomargin mt-5">
                <div class="comments-slider">
                    <div>
                        <div class="row">
                        <div class="col-lg-3 comment-img col-sm-12">
                            <img src="{{asset('/images/ICON/customar1.png')}}" class="img-fluid userimg" alt="">
                            <p>Md. Kodu Khan</p>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <p class="commenttxt">Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfewa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfedfdfd etewjip e twetwe erewrwer erreqwa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. dfdfdsfds fdsfadsf dfdasfdaf fsdfafaf fdasfafa fgaggfaggdg gsgsdg dfldjfkldjf dfdfdafdaf dsfdfdsf <span><a href="">Details</a></span> </p>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                        <div class="col-lg-3 comment-img  col-sm-12">
                            <img src="{{asset('/images/ICON/customar1.png')}}" class="img-fluid userimg" alt="">
                            <p>Md. Kodu Khan 2</p>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <p class="commenttxt">Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfewa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfedfdfd etewjip e twetwe erewrwer erreqwa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. dfdfdsfds fdsfadsf dfdasfdaf fsdfafaf fdasfafa fgaggfaggdg gsgsdg dfldjfkldjf dfdfdafdaf dsfdfdsf <span><a href="">Details</a></span> </p>
                        </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                        <div class="col-lg-3 comment-img  col-sm-12">
                            <img src="{{asset('/images/ICON/customar1.png')}}" class="img-fluid userimg" alt="">
                            <p>Md. Kodu Khan 3</p>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <p class="commenttxt">Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfewa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opq rs tuvx yz. Abcd ef gh ijklmn opqjkljkl lkjdkfjfk dfkdfjkljkl dfdkljfkl dfdfedf dfkldjklj dfdfdfd dfdfdfd dfedfdfd etewjip e twetwe erewrwer erreqwa gpojup rs tuvx yz. Abcd ef ijklmn opq rs tuvx yz. dfdfdsfds fdsfadsf dfdasfdaf fsdfafaf fdasfafa fgaggfaggdg gsgsdg dfldjfkldjf dfdfdafdaf dsfdfdsf <span><a href="">Details</a></span> </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>
<!-- ==============Customers’ Comment end=========== -->

     

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
                dots: false
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
                     dots: false
                 }

             }, {

                 breakpoint: 300,
                 settings: "unslick" // destroys slick

             }]

         });
     </script>
<script>
         jQuery(".myoffer-slide").slick({
             dots: false,
             infinite: true,
             slidesToShow: 3,
             slidesToScroll: 3,
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 2,
                     infinite: true
                 }

             }, {

                 breakpoint: 600,
                 settings: {
                     slidesToShow: 1,
                     dots: false
                 }

             }, {

                 breakpoint: 300,
                 settings: "unslick" // destroys slick

             }]

         });
     </script>
     <script>
         jQuery(".trasted-brand").slick({
             dots: false,
             infinite: true,
             slidesToShow: 6,
             slidesToScroll: 6,
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 4,
                     infinite: true
                 }

             }, {

                 breakpoint: 600,
                 settings: {
                     slidesToShow:4,
                     dots: false
                 }

             }, {

                 breakpoint: 300,
                 settings: "unslick" // destroys slick

             }]

         });
     </script>
          <script>
         jQuery(".comments-slider").slick({
             dots: false,
             infinite: true,
             slidesToShow: 1,
             slidesToScroll: 1,
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 2,
                     infinite: true
                 }

             }, {

                 breakpoint: 600,
                 settings: {
                     slidesToShow: 1,
                     dots: false
                 }

             }, {

                 breakpoint: 300,
                 settings: "unslick" // destroys slick

             }]

         });
     </script>
@endsection