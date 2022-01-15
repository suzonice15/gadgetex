<div class="mobile-header-top">

<div class="top_itm text-center">

    <div>

        <a href="/"><img  src="{{asset('images/mobileicon/Logo.png')}}"></a>
    
    </div>

    <div class="hom_icon menu-toggle">
    <!-- <i class="fas fa-bars"></i><br> -->
         <!-- <p class="menu-name-of-mobile"> Menu</p> -->
     </div>
    <div>

       

    <!-- <div class="hom_icon">

    <i class="fas fa-home"></i>

    <br>

    <small>Home</small>

    </div> -->
    
    </div>

<div class="iconright d-flex">
     <div class="hom_icon" onclick="location.href='{{url('/')}}/login';">

       <img style="width: 16px;" src="{{asset('/images/ICON/@Account.png')}}">
     </div>

   <div class="hom_icon top_inc"  onclick="location.href='{{url('/')}}/wishlist';" >
   <img style="width: 16px;" src="{{asset('/images/ICON/@Wishlis.png')}}">
       @if(Session::get('total_wishlist_count')>0)
         <div class="incr mobile_wishlised">{{Session::get('total_wishlist_count')}}</div>
           @endif

     </div>

    <?php  $items = \Cart::getContent();
    $total = 0;
    $quantity = 0;
    foreach ($items as $row) {
        $total = \Cart::getTotal();
        $quantity = Cart::getContent()->count();
    }
    ?>

   <div style="margin-right: 10px;" class="hom_icon top_inc" style="cursor: pointer" onclick="location.href='{{url('/')}}/cart';">
   <img style="width: 16px;" src="{{asset('/images/ICON/@Cart.png')}}">
       @if($quantity >0)
         <div class="incrc total_cart_item_class">{{$quantity}}</div>
           @endif
     </div>
     </div>

</div>

   

</div>

<div class="container mbcontainer">
    
        <form style="box-shadow: inset -33px 0px 36px rgba(0, 0, 0, 0.3);" action="{{url('/')}}/search" method="get" class="search_bar">
                    <div class="input-group mt-3">
                        <input style="height: 40px;" type="text" name="search" required="" class="form-control searchbox desktop-search-field" placeholder="Search For Products">
                        <div class="input-group-append wind">
                          <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <ul class="desktop-search-menu">
                    </ul>
                </form>

</div>

@include('fontend.partial.mobile_nav_bar')

<script>
    $('.stellarnav').stellarNav({
        theme: 'dark',
        breakpoint: 960,
        position: 'left',
        phoneBtn: '<?=get_option('phone')?>',
        locationBtn: '<?=get_option('map')?>'
    });
</script>
    

