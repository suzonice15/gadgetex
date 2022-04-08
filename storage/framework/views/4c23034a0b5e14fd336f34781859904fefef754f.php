
<?php $__env->startSection('content'); ?>

    <div class="container my-2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>

                <li class="breadcrumb-item active " aria-current="page"><?php echo e($page->page_name); ?></li>

            </ol>
        </nav>




    </div>



    <div class="container">
<br/>
    <div class="row">


        <div class="col-md-12">


               <?php echo $page->page_content; ?>
         </div>


    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/page/page.blade.php ENDPATH**/ ?>