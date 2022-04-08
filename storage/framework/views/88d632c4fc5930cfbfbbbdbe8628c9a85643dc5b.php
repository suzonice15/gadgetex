<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="<?php echo e($key); ?>" class="<?php if($key==0): ?> active <?php endif; ?>" aria-current="true" aria-label="Slide <?php echo e($key); ?>"></button>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="carousel-inner">

    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php if($key==0): ?> active <?php endif; ?>" data-bs-interval="10000">
            <img style="cursor:pointer" onclick="location.href='<?php echo e($slider->target_url); ?>';"   src="<?php echo e(asset('/uploads/sliders')); ?>/<?php echo e($slider->homeslider_picture); ?>" class="d-block w-100" alt="...">           
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       
       

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/partial/desktop_slider.blade.php ENDPATH**/ ?>