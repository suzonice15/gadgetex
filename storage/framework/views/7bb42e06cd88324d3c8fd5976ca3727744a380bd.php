
<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center" style="background: white;padding: 50px 50px">
                    <form class="well form-horizontal" action="https://www.sohojbuy.com/customer/form" method="post" id="contact_form">
        <input type="hidden" name="_token" value="Kz0CmaXWJ5tdfDJlxA7PqOAxGf0iifoZ8Mx7Rpwx">            <div style="border: 1px solid #ddd;">

                <!-- Form Name -->
                 <h2 style="font-size: 22px;background: #ddd;text-align: center;padding: 5px 11px;">Customer Registration Form</h2>

                <!-- Text input-->


<div style="padding: 10px;">

    <div class="form-group">
        <div class="col-12 ">
                    </div>
    </div>

    <div class="form-group">
        <div class="col-12 ">
                    </div>
    </div>

    <div class="before">
    <div class="form-group">
        <label class="col-12 control-label">Full Name</label>
        <div class="col-12 ">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input style="width:320px" name="name" id="name" placeholder="Enter Name" class="form-control" type="text">
            </div>

        </div>
        <p style="color:red" id="name_error"></p>


    </div>

    <div class="form-group">
        <label class="col-12 control-label">Contact No.</label>
        <div class="col-12 ">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input name="phone" id="phone" placeholder="01738000000" class="form-control" type="number">
            </div>
        </div>
        <p style="color:red" id="phone_error"></p>

    </div>


        <div class="form-group">
            <div class="row">
                <label class="col-3 control-label">Gender</label>
                <div class="col-3">
                    <div class="input-group">
                        <select class="form-control" id="gender" name="gender">

                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="male">Other</option>

                        </select>
                    </div>
                </div>


            </div>

        </div>


        <div class="form-group">
            <label class="col-12 control-label"></label>
            <div class="col-12"><br>
                <button type="button" id="requestForOtp" class="btn btn-info form-control">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next<span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <a href="" class="btn btn-success mt-3 form-control">Already member? Login here.</a>
            </div>
        </div>

        </div>


     

    <div class="after" style="display: none;">

        <div class="form-group">
            <label class="col-12 control-label">Otp</label>
            <div class="col-12 ">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input style="width:320px" required="" name="otp" id="otp" placeholder="Enter Your Otp" class="form-control" type="text">
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

        <div class="form-group">
            <label class="col-12 control-label">Referrer  Id</label>
            <div class="col-12 ">
                <div class="input-group">

                    <input value="2" name="affiliate_id" id="affiliate_id" placeholder="referrer id" class="form-control" type="text">
                </div>
            </div>

            <p id="cpassword_error" style="color:red"></p>

        </div>
        <div class="form-group">
            <label class="col-12 control-label"></label>
            <div class="col-12"><br>
                <button type="button" id="formSubmit" class="btn btn-info">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Confirm <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>

            </div>
        </div>
        </div>
</div>


            </div>



        </form>
    </div>


























<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/customer/sign_up_form.blade.php ENDPATH**/ ?>