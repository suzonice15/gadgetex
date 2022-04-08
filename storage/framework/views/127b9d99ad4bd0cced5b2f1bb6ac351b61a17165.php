<!doctype html>
<html lang="en">
<head>
    <?php
    $customer_id = Session::get('customer_id');
    if (isset($page_title)) {
        $title = $page_title . '-' . get_option('site_title');
    } else {
        $title = get_option('site_title');
    }
    ?>            <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name='viewport'
          content='width=device-width, initial-scale=1.0, maximum-scale=1.0,
     user-scalable=0' >
    <title><?=$title?></title>
    <link rel="shortcut icon" href="<?=get_option('icon')?>">
    <!-- Bootstrap Core CSS -->
    <!-- Customizable CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/font_end/')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/font_end/')); ?>/css/stellarnav.css">
    <meta name="title" content="<?php if (isset($seo_title)) {
        echo $seo_title;
    }?>"/>
    <meta name="keywords" content="<?php if (isset($seo_keywords)) {
        echo $seo_keywords;
    }?>"/>
    <meta name="description" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="_base_url" content="<?php echo e(url('/')); ?>">
    <meta name="robots" content="index,follow"/>
    <link rel="canonical" href="<?php echo e(url()->current()); ?>"/>
    <meta property="og:locale" content="EN"/>
    <meta property="og:url" content="<?php echo e(url()->current()); ?>"/>
    <meta property="og:type" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>
    <meta property="og:title" content="<?php if (isset($seo_title)) {
        echo $seo_title;
    }?>"/>
    <meta property="og:description" name="description" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>
    <meta property="og:image" content="<?php if (isset($share_picture)) {
        echo $share_picture;
    } ?>"/>
    <meta property="og:site_name" content="<?php if (isset($seo_keywords)) {
        echo $seo_keywords;
    }?>"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- <link rel="stylesheet" as="font" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"> -->
    
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link href="<?php echo e(asset('website/style.css')); ?>" rel="stylesheet" type="text/css" >


    <link href="<?php echo e(asset('website/stellarnav.css')); ?>" rel="stylesheet" type="text/css" >
    
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet" type="text/css" >

    <script type="text/javascript"  src="<?php echo e(asset('website/stellarnav.js')); ?>"   ></script>
    

    <link href="<?php echo e(asset('website/slick.css')); ?>" rel="stylesheet" type="text/css" >
</head>
<body style="background: #eef0f1">
<!-- desktop header start  -->

<div style="padding:0px;" class="container-fluid desktop-header">

 
<?php if(mobileTabletCheck()==1): ?>
<?php echo $__env->make('fontend.partial.mobile_header_area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php else: ?>
   <?php echo $__env->make('fontend.partial.desktop_header_top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <?php echo $__env->make('fontend.partial.desktop_header_logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
   <?php endif; ?>

</div>
<div clss="hedtoppasd"></div>
<!-- desktop header end  --><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/partial/header.blade.php ENDPATH**/ ?>