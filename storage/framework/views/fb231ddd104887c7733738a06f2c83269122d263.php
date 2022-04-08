<div class="row mt-2">
<?php if($products): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        if ($product->discount_price) {
            $sell_price = $product->discount_price;
        } else {
            $sell_price = $product->product_price;
        }
        ?>
        <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-1 "  style="padding: 5px;"  >
            <div class="card" style="cursor: pointer"  onclick="location.href='<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>';"  >
                <div>

                    <?php if($product->discount > 0): ?>
                        <div style="background:#1DBA2C" class="discount-status">-<?php echo e($product->discount); ?>%</div>
                    <?php endif; ?>
                </div>
                <img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>" alt="<?php echo e($product->product_title); ?>" class="card-img-top product-image" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title product-title" style="height:50px;overflow: hidden"><?php echo e($product->product_title); ?> </h5>


                    <div class="price">
                        <?php
                        if($product->discount_price){
                        ?>
                        <p class="text-danger text-decoration-line-through"> <?php echo 'Tk .' . $product->product_price; ?></p>
                        <?php
                        }
                        ?>
                        <p> <?php echo 'Tk .' . $sell_price; ?></p>
                    </div>

                </div>

            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




    <div class="col-lg-7 col-xl-7 col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php echo $products->links(); ?>

            </ul>
        </nav>
    </div>
    <div class="col-lg-5 col-xl-5 col-12 d-flex flex-row">
        <select class="form-select" aria-label="Default select example" name="search_id" id="per_page" style="width: 96px;height: 38px;margin-right: 8px;margin-top: -4px;" >
            <option> 40</option>
            <option> 50</option>
            <option> 60</option>
            <option> 100</option>
            <option> 200</option>
            <option> 500</option>
        </select>
        Items per page
    </div>
</div><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/category/ajax_category.blade.php ENDPATH**/ ?>