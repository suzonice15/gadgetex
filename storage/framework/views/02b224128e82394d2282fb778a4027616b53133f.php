
 <?php $__env->startSection('content'); ?>

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
     <div class="container desktop-slider">
         <div class="row">
             <div class="col-lg-3 desktop-menu ">
             <?php if(mobileTabletCheck()==0): ?>
             <?php echo $__env->make('fontend.partial.desktop_home_left_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             <?php endif; ?>
             </div>
             <div class="col-lg-9 mt-3">
             <?php echo $__env->make('fontend.partial.desktop_slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 <div style="padding-top:20px; class="row">
                     
                    <div style="padding-bottom:10px;  class="col-12">
                    <div style="border-bottom: 1px solid #ccc;" class="vall row">
                     <p style="padding:0px;margin:0px;" class="col-6">Shop By Brands</p>
                     <a style="text-align: right;text-decoration:none;" class="col-6"onclick="location.href='<?php echo e(url('/all-brand/')); ?>';">View All</a>
                     </div>
                    </div>
                     <div style="margin-left:6px;" class="regular">
                         <?php if($bands): ?>
                       <?php $__currentLoopData = $bands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $band): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                           <?php

                                 if($band->brand_banner){
                                     $band_icon=url('uploads/brand').'/'.$band->brand_banner;
                                 }else{
                                     $band_icon= 'https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg';
                                 }
                                   ?>
                     <div  class=" d-flex flex-row " style="cursor: pointer" onclick="location.href='<?php echo e(url('/brand/')); ?>/<?php echo e($band->brand_link); ?>';" >
                         <div class="slider-bottom-singe-category d-flex">
                         <img src="<?php echo e($band_icon); ?>"  class="img-fluid"  />
                         
                        </div>
                     </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>
                     </div>


                 </div>
              </div>
         </div>
     </div>
     <!-- desktop slider section  end -->


  


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

     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-xl-12 col-xxl-12 mbpadding"  style="cursor: pointer;margin-top: -6px;margin-bottom: -5px;padding-left:0px;padding-right:0px;" onclick="location.href='<?php echo e(url('/category')); ?>/<?php echo e($category_info->category_name); ?>';">
         <img src="<?php echo e($image); ?>"  class="img-fluid" style="width: 100%;"/>
             </div>
         </div>
     </div>

     <?php } ?>


     <div style="width:96%" class="container">
         <div class="row mt-5">

             <div class="cateory-see-all"> <span style="border: 2px solid black;padding: 1px 13px;cursor: pointer" onclick="location.href='<?php echo e(url('/category')); ?>/<?php echo e($category_info->category_name); ?>';">See All</span> </div>
             <div style="padding: 0px;" class="regular-category">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                     <?php
                     if ($product->discount_price) {
                         $sell_price = $product->discount_price;
                     } else {
                         $sell_price = $product->product_price;
                     }
                     ?>
                 <?php if($key !=10): ?>
                     <div class="card"  style="width: 18rem;cursor: pointer" onclick="location.href='<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>';" >
                         <div>

                                 <?php if($product->discount > 0): ?>
                             <div style="background:#1DBA2C" class="discount-status">-<?php echo e($product->discount); ?>%</div>
                             <?php endif; ?>
                         </div>
                         <img src="<?php echo e(asset('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>" class="card-img-top product-image" alt="...">
                         <div class="card-body text-center">
                             <h5 class="card-title product-title" style="height:50px;overflow: hidden"><?php echo e($product->product_title); ?> </h5>
                             <div class="price">
                                 <?php
                                 if($product->discount_price){
                                 ?>
                                 <p class="text-danger text-decoration-line-through"> <?php echo 'Tk ' . number_format($product->product_price,2); ?></p>
                                 <?php
                                 }
                                 ?>
                                 <p> <?php echo 'Tk ' . number_format($sell_price,2); ?></p>
                             </div>

                         </div>

                     </div>
                     <?php else: ?>
                         <div class="card"  style="width: 18rem;
height: 529px;cursor: pointer" onclick="location.href='<?php echo e(url('/category')); ?>/<?php echo e($category_info->category_name); ?>';" >
                             <img src=" <?php echo e(asset('/images/ICON/see.png')); ?>"  style="padding: 104px 63px 30px 71px;" class="card-img-top" alt="...">
                         </div>
                     <?php endif; ?>

                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>

         </div>
     </div>

     <?php } }  }?>


<!-- =================my offer============= -->
 
<section   style="background:#EEEEEE">
    <div style="width:96%;padding:0px;" class="container  m mbmyoffer">
 
     <?php $offer_count=0; ?>
     <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <?php ++$offer_count; ?>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

 
 
<section style="background:#fff">
    <div class="container mbmyoffer py-2">
         <div class="row">
            <div class="col-6 p-3">
                <div class="myoffer-title d-flex">
                    <img style="width:40px;z-index: 99;" src="<?php echo e(asset('/images/ICON/myoffer.png')); ?>" alt="">
                    <span class="mytitletext">My Offers</span>
                    <span class="offerlist"><?php echo e($offer_count); ?></span>
                </div>
            </div>
            <div class="col-6">
            <div class="cateory-see-all see-all" onclick="location.href='<?php echo e(url('/myoffer')); ?>';"> <span style="border: 2px solid black;padding: 1px 13px;cursor: pointer">See All</span> </div>
            </div>
            <div class="col-12 mbnomargin">
            <div class="myoffer-slide">

                <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#00853e" class="fas fa-circle"></i><span class="offernumber"> 5</span>
                    <div class="offbox1 offbox">
                        <img src="/<?php echo e($offer->picture); ?>" alt="">
                        <h4><?php echo e($offer->name); ?></h4>
                        <p><?php echo e(date("d-m-Y",strtotime($offer->start_date))); ?>-<?php echo e(date("d-m-Y",strtotime($offer->ending_date))); ?></p>
                    </div>
                </div>
            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>
</section>
<!-- =================my offer end============= -->
<!-- ==============our trusted brand =========== --> 

<!-- ==============our trusted brand end=========== -->
<!-- ==============Customers’ Comment =========== --> 
<section style="background: #def;">
    <div class="container mbnopad py-2">
 
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div style="margin-left: 25px;" class="myoffer-title trustedtitle d-flex">
                    <img style="width: 102px;z-index: 99;position: absolute;margin-left: -49px;margin-top: -8px;" src="<?php echo e(asset('/images/ICON/saying.png')); ?>" alt="">
                    <span style="background-image:url(<?php echo e(asset('/images/ICON/rec.png')); ?>);background-repeat: no-repeat; background-size: 100% 100%;background-position: 100%;" class="mytitletext custom-comment"><span class="comments">Customers’ Comment</span></span>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
            <div  class="cateory-see-all see-all commall" onclick="location.href='<?php echo e(url('/')); ?>/testimonial';"  > <span style="border: 2px solid black;padding: 1px 13px;cursor:pointer">See All</span> </div>
            </div>
            <div class="col-lg-12 mbnomargin mt-5">
                <div class="comments-slider">

                    <?php if(isset($testmonials)): ?>
                        <?php $__currentLoopData = $testmonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testmonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div>
                        <div class="row">
                        <div class="col-lg-3 comment-img col-sm-12">
                            <img src="<?php echo e(asset('/')); ?><?php echo $testmonial->image; ?>" class="img-fluid userimg" alt="">
                            <p> <?php echo $testmonial->user_name; ?></p>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <p class="commenttxt">

                                <?php echo $testmonial->description; ?>

                                

                            </p>
                        </div>
                        </div>
                    </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php endif; ?>

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
        slidesToShow: 6,
        slidesToScroll:1,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                infinite: true
            }

        }, {

            breakpoint: 600,
            settings: {
                slidesToShow: 4,
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
             slidesToScroll: 1,
             responsive: [{
                 breakpoint: 1024,
                 settings: {
                     slidesToShow: 1,
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/home/home.blade.php ENDPATH**/ ?>