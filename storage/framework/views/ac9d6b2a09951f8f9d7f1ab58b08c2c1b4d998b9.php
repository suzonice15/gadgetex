

<?php $__env->startSection('content'); ?>

<link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
 
<div class="container my-3" id="wishlist" style="background: white;">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
    <h3 class="text-start fs-5">Wishlist</h3>
    <table class="table   table-bordered">


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
            <td class="price"><?php echo 'Tk ' . number_format($sell_price,2); ?></td>
            <td class="total text-center" width="8%">
             

                <a href="javascript:void(0)" class="remove_wish_list"
                                                                 data-product_id="<?php echo e($product->product_id); ?>"> <span class="fa fa-trash btn btn-danger"></span> </a></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            <tr>

                <td colspan="3" class="quantity">
               There are no product to your whislised
                </td>


            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
</div>

<script>
    $(document).on('click','.remove_wish_list',function () {
        let product_id=  $(this).data("product_id"); // will return the number 123
        $(this).css("background-color", "red");
       

        $.ajax({
            type:"GET",
            url:"<?php echo e(url('remove-to-wishlist')); ?>?product_id="+product_id,
            success:function(data)
            {
                toastr.success('Product Removed Successfully', '')
                jQuery("#wishlist").html(data.html);
               
                $('.mobile_wishlised').text(data.count)
            $('.total-whislist-item').text(data.count)
                


            }
        })

    })
</script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/wishlist/wishlist.blade.php ENDPATH**/ ?>