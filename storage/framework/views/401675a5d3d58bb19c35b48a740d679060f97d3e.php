
<?php $__env->startSection('pageTitle'); ?>
    Add New Page
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">


        <div class="col-sm-offset-0 col-md-12">

            <form action="<?php echo e(url('admin/page/store')); ?>" class="form-horizontal" method="post"
                  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="box" style="border: 2px solid #ddd;">
                    <div class="box-header with-border" style="background-color: green;color:white;">
                        <h3 class="box-title">Page  Information</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12" style="margin-left: 10px">
                                <div class="form-group">
                                    <label for="category_title">Page Name<span class="required">*</span></label>
                                    <input required type="text" id="page_name" class="form-control"
                                           name="page_name" value="">
                                </div>

                            </div>
                            <div class="col-md-5 col-sm-12" style="margin-left: 10px">

                                <div class="form-group ">
                                    <label for="category_name">Page Parmalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control " id="page_link"
                                           name="page_link"
                                           value="">

                                </div>
                            </div>
                            <div class="col-md-11 col-sm-12" style="margin-left: 10px">
                            <div class="form-group ">
                                <label for="category_name">Page Discripttion</label>

                                <textarea   class="form-control ckeditor" rows="10" name="page_content"
                            id="page_content"></textarea>
                            </div>

                                <div class="box-footer">
                                    <input type="submit" class="btn btn-success pull-right" value="Save">

                                </div>
                            </div>




                    </div>
                    </div>

                    <!-- /.box-body -->

                </div>





            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/page/create.blade.php ENDPATH**/ ?>