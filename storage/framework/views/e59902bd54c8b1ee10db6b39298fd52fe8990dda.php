
<?php $__env->startSection('pageTitle'); ?>
  Limited Products
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>



    <div class="box-body">



        <div class="table-responsive">

            <table  class="table table-bordered table-striped ">
                <thead>
                <tr>

                    <th>SL</th>

                    <th width="35%">Product</th>
                    <th>Product Code</th>
                    <th>Purchase Price</th>
                    <th>Sell Price</th>
                    <th>Discount Price</th>

                    <th>Published Status</th>
                    <th>Registration date</th>

                </tr>
                </thead>
                <tbody>

                <?php if(isset($products)): ?>

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td>
                                <img src="<?php echo e(url('/public/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>">
                                <a href="<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>"> <?php echo e($product->product_title); ?> </a>

                            </td>
                            <td><?php echo e($product->sku); ?></td>
                            <td><?php echo e($product->purchase_price); ?></td>
                            <td><?php echo e($product->product_price); ?></td>
                            <td><?php echo e($product->discount_price); ?></td>


                            <td><?php if($product->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
                            <td><?php echo e(date('d-m-Y H:m s',strtotime($product->created_time))); ?></td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php endif; ?>
                </tbody>

            </table>

        </div>





    </div>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/report/stock_product.blade.php ENDPATH**/ ?>