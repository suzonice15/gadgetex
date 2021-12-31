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
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/font_end/')}}/css/stellarnav.css">
    <meta name="title" content="<?php if (isset($seo_title)) {
        echo $seo_title;
    }?>"/>
    <meta name="keywords" content="<?php if (isset($seo_keywords)) {
        echo $seo_keywords;
    }?>"/>
    <meta name="description" content="<?php if (isset($seo_description)) {
        echo $seo_description;
    }?>"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_base_url" content="{{ url('/') }}">
    <meta name="robots" content="index,follow"/>
    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:locale" content="EN"/>
    <meta property="og:url" content="{{url()->current()}}"/>
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


    <link rel="stylesheet" as="font" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    {{--<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>--}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link href="{{asset('website/style.css')}}" rel="stylesheet" type="text/css" >


    <link href="{{asset('website/stellarnav.css')}}" rel="stylesheet" type="text/css" >
    <script type="text/javascript"  src="{{asset('website/stellarnav.js')}}"   ></script>




    <link href="{{asset('website/slick.css')}}" rel="stylesheet" type="text/css" >
</head>
<body style="background: #eef0f1">
<!-- desktop header start  -->
<div style="padding:0px;" class="container-fluid desktop-header">

 
@if(mobileTabletCheck()==1)
@include('fontend.partial.mobile_header_area')

   @else
   @include('fontend.partial.desktop_header_top')
   @include('fontend.partial.desktop_header_logo')
 
   @endif

</div>
<!-- desktop header end  -->