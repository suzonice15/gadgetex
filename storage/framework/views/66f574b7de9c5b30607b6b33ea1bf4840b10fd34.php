<?php if(isset($products)): ?>
    <?php $i=$products->perPage() * ($products->currentPage()-1);?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td class="text-center"> <?php echo e(++$i); ?> </td>
            <td class="text-center"><?php echo e($product->sku); ?></td>
            <td>
                <img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>">
                <a target="_blank" href="<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>"> <?php echo e($product->product_title); ?> </a>

            </td>
            <td><?php echo e($product->product_ram_rom); ?></td>
            <?php
            $status= Session::get('status');
            if ($status != 'editor') {
            ?>
            <td class="text-center"><?php echo e($product->purchase_price); ?></td>
            <?php
                }
            ?>
            <td class="text-center"><?php echo e($product->product_price); ?></td>
            <td class="text-center"><?php echo e($product->discount_price); ?></td>
            

            <td class="text-center"><?php if($product->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td class="text-center"><?php echo e($product->product_stock); ?></td>
            <td class="text-center"><?php echo e($product->product_order_count); ?></td>
            <td class="text-center"><?php echo e($product->order_by); ?></td>
            <td class="text-center"> <span class="label label-<?php if($product->product_type=="home") { echo "success";} else { echo "info";} ?>"><?php echo e($product->product_type); ?></span></td>
            <td class="text-center"><?php echo e(date('d-m-Y h:i a',strtotime($product->created_time))); ?></td>
            <td class="text-center">
                <a target="_blank" title="edit" class="on-off "  id="<?php echo e($product->product_id); ?>" >

                    <span class="glyphicon glyphicon-ok btn btn-primary btn-sm"></span>
                </a>

                <a   title="edit" href="<?php echo e(url('admin/productEdit')); ?>/<?php echo e($product->product_id); ?>">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>

                <?php
                $admin_user=Session::get('status');
                if($admin_user !='editor' && $admin_user !='office-staff') {
                ?>


                    <a title="delete" href="<?php echo e(url('admin/product/delete')); ?>/<?php echo e($product->product_id); ?>" onclick="return confirm('Are you want to delete this Product')">
                        <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                    </a>

                <?php } ?>






            </td>
        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr>
        <td colspan="9" align="center">
            <?php echo $products->links(); ?>

        </td>
    </tr>
<?php endif; ?>


<?php /**PATH C:\SXampp\htdocs\gadgetex\resources\views/admin/product/pagination.blade.php ENDPATH**/ ?>