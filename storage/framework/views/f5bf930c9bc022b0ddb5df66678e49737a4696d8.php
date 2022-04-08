

<?php $__env->startSection('content'); ?>

    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    <div class="container my-3" id="wishlist" style="background: white" >
        <div class="row">

            <div class="col-lg-12 col">
                <div class="content">
                    <div class="com-heading">
                        <h2 class="title">
                            Product Compare
                        </h2>
                    </div>
                    <div class="compare-page-content-wrap">
                        <div class="compare-table table-responsive">
                            <div class="table-responsive">
                                <span id="data">
                                        <?php echo $__env->make('fontend.compare.ajax_compare', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </span>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>

        function removeCompare(product_id) {
         let confirm_data=confirm("Are you want to remove product from compare");
            if(confirm_data){

                $.ajax({
                    type: "GET",
                    url: "<?php echo e(url('remove_compare')); ?>?product_id=" + product_id,
                    success: function (data) {
                      $("#data").html('')
                      $("#data").html(data)
                        toastr.success('Product Removed Successfully', '')

                    }
                })
            }

        }

        $(document).on('click', '.add_to_cart_of_product', function () {
            let product_id = $(this).data("product_id"); // will return the number 123
            let picture = $(this).data("picture"); // will return the number 123

             var   quntity = 1;


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

        $(document).on('click', '.buy_now_of_product', function () {
            let product_id = $(this).data("product_id"); // will return the number 123
            let picture = $(this).data("picture"); // will return the number 123
               var quntity = 1;

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

<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/compare/compare.blade.php ENDPATH**/ ?>