
<table class="table table-bordered mb-0">
    <tbody>
    <tr>
        <td class="first-column top" width="15%"  >Product Name</td>
        <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="product-image-title c1075"  onclick="location.href='<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>';"   style="text-align: center;cursor: pointer">
                    <img class="img-fluid" src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>"  >
                    <p href="<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>">
                        <?php echo e($product->product_title); ?>

                    </p>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </tr>
    <tr>
        <td class="first-column">Price</td>

        <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if ($product->discount_price) {
                    $sell_price = $product->discount_price;
                } else {
                    $sell_price = $product->product_price;
                }
                ?>
                <td class="pro-price c1075" style="text-align: center">৳ &nbsp;<?php echo e(number_format($sell_price,2)); ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </tr>

    <tr>
        <td class="first-column">Description</td>

        <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <td class="pro-price c1075" style="text-align: center"> <?php echo $product->product_description; ?> </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </tr>


    <tr>
        <td class="first-column">Add To Cart</td>
        <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if ($product->discount_price) {
                    $sell_price = $product->discount_price;
                } else {
                    $sell_price = $product->product_price;
                }
                ?>
                <td class="c1075">

                    <a href="javascript:;" data-product_id="<?php echo e($product->product_id); ?>"
                       data-picture="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>" class="btn btn-success add_to_cart_of_product add-to-cart form-control">Add To Cart</a>
                    <a  data-product_id="<?php echo e($product->product_id); ?>"
                        data-picture="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>" class="btn btn-success buy-now buy_now_of_product">Buy Now</a>
                </td>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>


    </tr>
    <tr>
        <td class="first-column">Remove</td>


        <?php if(isset($products)): ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                if ($product->discount_price) {
                    $sell_price = $product->discount_price;
                } else {
                    $sell_price = $product->product_price;
                }
                ?>
                <td style="text-align: center" class="compare-remove" onclick="removeCompare(<?php echo e($product->product_id); ?>)">
                    <i class="fal fa-trash  btn btn-danger btn-sm compare"   ></i>
                </td>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </tr>
    </tbody>
</table></div>
<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/compare/ajax_compare.blade.php ENDPATH**/ ?>