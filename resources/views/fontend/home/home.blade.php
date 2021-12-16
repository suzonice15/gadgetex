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
                    <div class="slider-botoom-see-all" style="cursor:pointer" onclick="location.href='{{url('/all-category/')}}';" >See All</div>
                    </div>
                     <div class="regular">
                         @if($product_categories)
                       @foreach($product_categories as $category)

                           <?php

                                 if($category->category_icon){
                                     $category_icon=url('uploads/category').'/'.$category->category_icon;
                                 }else{
                                     $category_icon= 'https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg';
                                 }
                                   ?>
                     <div  class=" d-flex flex-row " style="cursor: pointer" onclick="location.href='{{url('/category/')}}/{{$category->category_name}}';" >
                         <div class="slider-bottom-singe-category d-flex">
                         <img src="{{$category_icon}}"  class="img-fluid"/>
                         <h4 class="home-product-category-title">{{$category->category_title}}</h4>
                        </div>
                     </div>
                  @endforeach
                             @endif
                     </div>


                 </div>
              </div>
         </div>
     </div>
     <!-- desktop slider section  end -->


  {{--category start --}}


     <?php
     $home_cat_section = explode(",", get_option('home_cat_section'));
     if($home_cat_section){
         foreach ($home_cat_section as  $category) {
             $category_info = get_category_info($category);
             if($category_info){
             $products=getHomePageProductByCategoryID($category);

             ?>

     <?php
     if($category_info->medium_banner){
     $image=url('uploads/category').'/'.$category_info->medium_banner;

     ?>

     <div style="width:96%" class="container-fluid">
         <div class="row">
             <div class="col-lg-12 col-xl-12 col-xxl-12"  style="cursor: pointer" onclick="location.href='{{url('/category')}}/{{$category_info->category_name}}';">
         <img src="{{$image}}"  class="img-fluid" style="width: 100%;"/>
             </div>
         </div>
     </div>

     <?php } ?>


     <div style="width:96%" class="container-fluid">
         <div class="row mt-5">

             <div class="cateory-see-all"> <span style="border: 2px solid black;padding: 1px 13px;cursor: pointer" onclick="location.href='{{url('/category')}}/{{$category_info->category_name}}';">See All</span> </div>
             <div style="padding: 0px;" class="regular-category">
                @foreach($products as $key=>$product)

                     <?php
                     if ($product->discount_price) {
                         $sell_price = $product->discount_price;
                     } else {
                         $sell_price = $product->product_price;
                     }
                     ?>
                 @if($key !=10)
                     <div class="card"  style="width: 18rem;cursor: pointer" onclick="location.href='{{url('/')}}/{{$product->product_name}}';" >
                         <div>
                             @if($product->discount > 0)
                             <div class="discount-percent">{{$product->discount}}%</div>
                             @endif
                             @if($product->main_category_id==11)
                             <div class="discount-status">New</div>
                             @endif
                         </div>
                         <img src="{{ asset('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" class="card-img-top product-image" alt="...">
                         <div class="card-body text-center">
                             <h5 class="card-title fw-bold" style="height:50px;overflow: hidden">{{$product->product_title}} </h5>
                             @if($product->product_ram_rom)
                                 <p class="card-text">({{$product->product_ram_rom}})</p>
                             @endif
                             <h5 class="card-title fw-bold ">{{$sell_price  }} BDT</h5>
                         </div>
                     </div>
                     @else
                         <div class="card"  style="width: 18rem;
height: 529px;cursor: pointer" onclick="location.href='{{url('/category')}}/{{$category_info->category_name}}';" >
                             <img src=" {{asset('/images/ICON/see.png')}}"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">
                         </div>
                     @endif

                 @endforeach
             </div>

         </div>
     </div>

     <?php } }  }?>


<!-- =================my offer============= -->
<section   style="background:#EEEEEE">
    <div style="width:96%;" class="container-fluid mbmyoffer">
        <div class="row">
            <div class="col-6 p-3">
                <div class="myoffer-title d-flex">
                    <img style="width:40px;z-index: 99;" src="{{asset('/images/ICON/myoffer.png')}}" alt="">
                    <span class="mytitletext">My Offers</span>
                    <span class="offerlist">7</span>
                </div>
            </div>
            <div class="col-6">
            <div class="cateory-see-all see-all"> <span style="border: 2px solid black;padding: 1px 13px;">See All</span> </div>
            </div>
            <div class="col-12 mbnomargin">
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
    <div style="width:96%" class="container-fluid mbnopad p-5">
        <div class="row">
            <div class="col-6">
                <div style="margin-left: 25px;padding-top:20px;" class="myoffer-title trustedtitle d-flex">
                    <img style="width: 66px;z-index: 99;position: absolute;margin-left: -38px; margin-top: -16px;" src="{{asset('/images/ICON/trusted.png')}}" alt="">
                    <span class="mytitletext trasted">Our Trusted Brands</span>
                    <span class="traslist">{{$total_brands}}</span>
                </div>
            </div>
            <div class="col-6">
            <div class="cateory-see-all see-all mball"> <span onclick="location.href='{{url('/all-brand/')}}';" style="cursor:pointer;border: 2px solid black;padding: 1px 13px;">See All</span> </div>
            </div>
            <div class="col-12 mt-5">
                <div class="trasted-brand">
                    @foreach($bands as $band)
                    <div>
                        <button onclick="location.href='{{url('/brand/')}}/{{$band->brand_link}}';" > {{$band->brand_name}}</button>
                    </div>
                 @endforeach
                </div>
            </div>
    </div>
    </div>
</section>
<!-- ==============our trusted brand end=========== -->
<!-- ==============Customers’ Comment =========== -->
<section style="background: #EEEEEE;">
    <div style="width:96%" class="container-fluid mbnopad p-5">
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