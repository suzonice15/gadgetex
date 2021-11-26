<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page</title>
    <link rel="stylesheet" as="font" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link href="{{asset('website/style.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('website/slick.css')}}" rel="stylesheet" type="text/css" >
</head>
<body>
<!-- desktop header start  -->
<div class="container-fluid desktop-header">

 
@if(mobileTabletCheck()==1)
@include('fontend.partial.mobile_header_area')
   @else
   @include('fontend.partial.desktop_header_top')
   @include('fontend.partial.desktop_header_logo')
 
   @endif

</div>
<!-- desktop header end  -->