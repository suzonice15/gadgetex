
<?php $__env->startSection('pageTitle'); ?>
    Add New Testmonial
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">
        <?php if(count($errors) > 0): ?>
            <div class=" alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <ul>

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li style="list-style: none"><?php echo e($error); ?></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
        <?php endif; ?>


        <form action="<?php echo e(url('admin/testmonial')); ?>" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="box" style="border: 2px solid #ddd;">
                <div class="box-header with-border" style="background-color: green;color:white;">
                    <h3 class="box-title">testmonial Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                            <div class="form-group">
                                <label for="user_name">User Name<span class="required">*</span></label>
                                <input required type="text" id="user_name" class="form-control the_title"
                                       name="user_name" value="">
                            </div>
                            

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12" style="margin-left: 20px">

                            <div class="form-group featured-image">
                                <label>Advertisement Banner<span class="required"></span></label>
                                <input type="file" class="form-control" name="image"/>

                            </div>


                        </div>
                        <div class="col-10" style="margin-left: 20px">
                        <div class="form-group">
                                <label for="description">Description<span class="required">*</span></label>
                                <textarea required  id="description" class=" ckeditor "
                                       name="description"></textarea>
                            </div>
                            </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>

            <div class="box-footer">
                <input type="submit" class="btn btn-success pull-left" value="Save">

            </div>

        </form>

    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/testmonial/create.blade.php ENDPATH**/ ?>