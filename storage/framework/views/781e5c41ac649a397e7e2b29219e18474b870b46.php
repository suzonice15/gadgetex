
<?php $__env->startSection('content'); ?>


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
   <?php if(mobileTabletCheck()==1): ?>
<?php echo $__env->make('fontend.product.mobile_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       <?php else: ?>
       <?php echo $__env->make('fontend.product.desktop_product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>

     <div class="container" style="background-color: #eef0f1;">
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

                                 <?php if($product->discount > 0): ?>
                                     <div style="background:#1DBA2C" class="discount-status">-<?php echo e($product->discount); ?>%</div>
                                 <?php endif; ?>
                             </div>
                             <img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>" class="card-img-top  product-image" alt="...">
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </div>
             </div>
         </div>
     </div>

     



    <!-- Modal -->
    <div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i  style="background: green;color: white;border: none;border-radius: 46%;" class="fal fa-check-circle"></i> &nbsp; &nbsp; Success: You have added <span  style="color:red" id="compare_product_title"></span> to your product comparison!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue</button>
                    <a href="<?php echo e(url('/')); ?>/compare">
                        <button type="button" class="btn btn-primary">Compare Now </button>
                    </a>

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



   <script>

       function IncrementFunction() {
           var quantity = parseInt($("#quantity").text());

           if (quantity) {
               quantity = quantity + 1;
           }
           let product_stock = $('#limit_stock_product').val();

               $("#quantity").text(quantity);

       }

       function DecrementFunction() {
           var quantity = parseInt($("#quantity").text());

           if (quantity > 1) {
               quantity = quantity - 1;
           }
           $("#quantity").text(quantity);
       }

       $(document).ready(function ($) {
           $.ajax({
               url: "<?php echo e(url('/visitor')); ?>",
               method: "get",
               success: function (data) {
               }
           });

       });




       $(document).on('click', '.add-to-wishlist', function () {
           let product_id = $(this).data("product_id"); // will return the number 123


           $.ajax({
               type: "GET",
               url: "<?php echo e(url('add-to-wishlist')); ?>?product_id=" + product_id,
               success: function (data) {
                $('.mobile_wishlised').text(data.count)
            $('.total-whislist-item').text(data.count)
                 

           if(data.result=='no'){
             
            toastr.success('You already added this product to your wishlist', '')
           }else{
             
            toastr.success('Product added to your Wishlish Successfully', '') 
           
           }
                 
               }
           })

       })

       $(document).on('click', '.add_to_compare_class', function () {
           let product_id = $(this).data("product_id"); // will return the number 123
           let product_title = $(this).data("product_title"); // will return the number 123


           $.ajax({
               type: "GET",
               url: "<?php echo e(url('add-to-compare')); ?>?product_id=" + product_id,
               success: function (data) {
               $("#compare_product_title").text(product_title)

                   $('#compareModal').modal('toggle');

                   //   location.reload();
                   toastr.success('Product added to your Compare ', '')
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
               url: "<?php echo e(url('add-to-cart')); ?>?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,

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
               url: "<?php echo e(url('add-to-cart')); ?>?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,
               success: function (data) {
                   toastr.success('Product Added Successfully', '')
                   window.location.assign("<?php echo e(url('/')); ?>/cart")
               }
           })

       })
   </script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/product/product.blade.php ENDPATH**/ ?>