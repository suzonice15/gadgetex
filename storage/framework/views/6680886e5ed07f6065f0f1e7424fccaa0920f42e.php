
    <div class="container">
        <h3>Wishlist</h3>

        <table class="table table-striped table-bordered">


            <thead>
            <tr>
                <th class="name">Product</th>
                <th class="quantity">Availability</th>
                <th class="price">Price</th>
                <th class="total text-center">Action</th>
            </tr>
            </thead>

            <tbody>

            <?php if($products): ?>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    $product_stock=$product->product_stock;
                    if ($product->discount_price) {
                        $sell_price = $product->discount_price;
                    } else {
                        $sell_price = $product->product_price;
                    }
                    ?>
                    <tr>
                        <td class="name">
                            <a href="<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>" style="text-decoration: none;color:black">
                                <img
                                        src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/thumb/<?php echo e($product->feasured_image); ?>"
                                        alt="Menz full sleev polo-shirt-4327" width="80"> <?php echo e($product->product_title); ?> </a></td>
                        <td class="quantity">
                            <div class="availability"><?php if($product_stock >0): ?> In Stock <?php else: ?> Out of Stock <?php endif; ?></div>
                        </td>
                        <td class="price"><?php echo 'Tk .' . $sell_price; ?></td>
                        <td class="total text-center" width="8%">
                            
                            
                                    

                            <a href="javascript:void(0)" class="remove_wish_list"
                                                                             date-product_id="<?php echo e($product->product_id); ?>"> <span class="fa fa-trash btn btn-danger"></span>  </a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php else: ?>
                <tr>

                    <td class="quantity">
                        There are no product to your whislised
                    </td>


                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/wishlist/wishlist_ajax.blade.php ENDPATH**/ ?>