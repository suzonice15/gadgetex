

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        GadgetEx
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">অ্যাডমিন প্যানেলে প্রবেশ করতে আপনার সঠিক ই-মেইল ও পাসওয়ার্ড ব্যাবহার করুন.</p>
        <h5 id="fadeout" style="color:red;text-aling:center"><?php
            if(isset($error)) { echo  $error;} ?></h5>

        <form action="<?php echo e(url('/admin/login')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">


                <input  required type="email" class="form-control" placeholder="Email" name="email">
                <input   type="hidden" class="form-control" placeholder="Email" name="redirect" value="<?php echo e(Session::get('redirect')); ?>">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input  required type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

       
        <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo e(asset('backed/adminfile')); ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('backed/adminfile')); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo e(asset('backed/adminfile')); ?>/plugins/iCheck/icheck.min.js"></script>
<script>

    $("#fadeout").fadeOut(50000);
</script>
</body>
</html>
<?php /**PATH C:\SXampp\htdocs\gadgetex\resources\views/admin/login.blade.php ENDPATH**/ ?>