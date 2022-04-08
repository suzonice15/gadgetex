
<?php $__env->startSection('content'); ?>

<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-12 d-flex justify-content-center">
        <div class="card panel-info">
            <div class="card-heading">
                <div class="panel-title" style="text-align: center;padding: 5px;background: #ddd;">Sign In</div>

            </div>

            <div style="padding-top:30px" class="card-body">

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form action="<?php echo e(url('/')); ?>/login" method="post">

                  <h4 style="color:green">  </h4>
                    <h5 id="fadeout" style="color:red;text-aling:center"><?php if(isset($error)): ?>   <?php echo e($error); ?> <?php endif; ?></h5>
                    <?php echo csrf_field(); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input style="width:360px" id="login-username" type="text" class="form-control" name="phone" value="" placeholder="Phone">
                    <!-- <input type="text" name="url" value="<?php echo e($url); ?>" > -->
                  
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div style="margin-top:10px" class="form-group">


                        <div class="col-sm-12 controls">
                            <input type="submit" class="btn  btn-success" value="Login">

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-12 control">
                            <div class="col-12" style=" padding-top:15px; font-weight: 600">
                                <a style="color: red" href="<?php echo e(url('forgotpassword')); ?>">
                                    Forgot Password?
                                </a>
                            </div>
                            <div class="col-12" style=" padding-top:15px; font-weight: 600">
                                Don't have an account!
                                <a style="color: green" href="<?php echo e(url('signup')); ?>">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </div>
   </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/customer/login_form.blade.php ENDPATH**/ ?>