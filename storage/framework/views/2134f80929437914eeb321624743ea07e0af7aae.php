
<?php $__env->startSection('content'); ?>
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
   <?php if(mobileTabletCheck()==1): ?>
<?php echo $__env->make('fontend.product.mobile_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <?php else: ?>
       <?php echo $__env->make('fontend.product.desktop_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

     <div class="container-fluid">
         <div class="row mt-5">

             <h2 class="related-product-section"><span class="related-product-title">Related Product</span></h2>
             <div class="cateory-see-all single-product-see-more"> <span class="allproduct" style="border: 2px solid #ddd;padding: 1px 13px;">See All</span> </div>

              <div class="regular-category">
                <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                      if ($product->discount_price) {
                          $sell_price = $product->discount_price;
                      } else {
                          $sell_price = $product->product_price;
                      }
                      ?>
                         <div class="card" style="cursor: pointer"   style="width: 18rem;" onclick="location.href='<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>';"  >
                             <div>
                                 <div class="discount-percent"><?php echo e($key); ?>%</div>
                                 <div class="discount-status">New</div>
                             </div>
                             <img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>" class="card-img-top" alt="...">
                             <div class="card-body text-center">
                                 <h5 class="card-title fw-bold" style="height:30px;overflow: hidden "><?php echo e($product->product_title); ?></h5>
                                 <?php if($product->product_ram_rom): ?>
                                     <p class="card-text">(<?php echo e($product->product_ram_rom); ?>)</p>
                                 <?php endif; ?>
                                 <h5 class="card-title fw-bold "><?php echo e($sell_price); ?> BDT</h5>
                             </div>
                         </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         </div>
             </div>
         </div>
     </div>



    

     


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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/product/product.blade.php ENDPATH**/ ?>