
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div id="loginbox" style="margin-top:50px;" class="mainbox d-flex justify-content-center col-12 mt-5">

        <div class="card panel-info mt-5" style="margin:100px 0px">

            <div class="panel-heading">
                <div class="card-title" style="background: #ddd;text-align: center;padding: 7px;">Forgot Password</div>
            </div>

            <div style="padding-top:30px" class="card-body">

                <div class="form-group mb-3">
                                    </div>

                <div class="form-group mb-3">
                                    </div>

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form action="https://www.sohojbuy.com/customer/forgotPasswordUpdateByPhone" method="post" id="contact_form">

                    <h5 id="fadeout" style="color:red;text-aling:center"></h5>

                    <input type="hidden" name="_token" value="Kz0CmaXWJ5tdfDJlxA7PqOAxGf0iifoZ8Mx7Rpwx">                    <div class="before">

                    <div style="margin-bottom: 25px;width: 100%" class="input-group">
                        <input style="width:360px" id="phone" type="number" class="form-control" name="phone" value="" placeholder="Enter Your Phone Number">
                    </div>

                  <p id="phone_error" style="color:red"></p>


                        <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input type="button" id="requestForOtp" class="btn  btn-success form-control" value="Submit">

                        </div>
                    </div>

                    </div>

                    <div class="after" style="display: none;">

                        <div class="form-group">
                            <label class="col-12 control-label">Otp</label>
                            <div class="col-12 ">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input style="width:360px" required="" name="otp" id="otp" placeholder="Enter Your Otp" class="form-control" type="text">
                                </div>
                            </div>

                            <p id="otp_error" style="color:red"></p>


                        </div>


                        <div class="form-group">
                            <label class="col-12 control-label">Password</label>
                            <div class="col-12 ">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input required="" name="password" id="password" placeholder="Password" class="form-control" type="password">

                                </div>
                            </div>

                            <p id="password_error" style="color:red"></p>

                            <input type="hidden" id="server_otp" value="">


                        </div>


                        <div class="form-group">
                            <label class="col-12 control-label">Confirm Password</label>
                            <div class="col-12 ">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input required="" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control" type="password">
                                </div>
                            </div>

                            <p id="cpassword_error" style="color:red"></p>

                        </div>







                        <div style="margin-top:20px" class="form-group">
                            <div class="col-sm-12 controls">
                                <input type="button" id="formSubmit" class="btn  btn-success form-control" value="Confirm">

                            </div>
                        </div>

                    </div>




                </form>
            </div>
        </div>
    </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/customer/forget_password_form.blade.php ENDPATH**/ ?>