<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if(isset($site_title)) {echo $site_title; } ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <meta name="_base_url" content="<?php echo e(url('/')); ?>">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="<?php echo e(asset('backed/')); ?>/ckeditor/ckeditor.js"></script>
    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('backed/adminfile')); ?>/bower_components/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('backed/adminfile')); ?>/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition fixed  skin-blue layout-boxed sidebar-mini"   >
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo e(url('/')); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>I<b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Panel</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src=" <?php echo e(url('public/uploads/users')); ?>/<?php echo e(Session::get('picture')); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"> <?php echo e(Session::get('name')); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo e(url('public/uploads/users')); ?>/<?php echo e(Session::get('picture')); ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo e(Session::get('name')); ?>


                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-left">
                                    <a href="<?php echo e(url('admin/user')); ?>/<?php echo e(Session::get('id')); ?>" class="btn btn-success btn-flat">Profile</a>
                                </div>

                                <div class="pull-right">

                                       <a href="<?php echo e(url('/admin/logout')); ?>" class="btn btn-info btn-flat">Sign out</a>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/layouts/includes/header.blade.php ENDPATH**/ ?>