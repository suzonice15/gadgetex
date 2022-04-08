</div>
<section class="topfixedheader" style="background:#000" >
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="row desktop-header-logo">
    <div class="col-lg-3 p-0">
        <div style="cursor: pointer" class="desktop-category-style"><span style="margin-left:19px; "><i style="margin-right:20px;margin-top: 9px;" class="fas fa-bars"></i> <span>Categories</span> </span><i style="float: right;margin-right: 18px;margin-top: 6px;" id="hover_togole_desktop_icon" class="fas fa-chevron-down"></i></div>
    </div>
    <div class="col-lg-6 ">
        <form action="<?php echo e(url('/')); ?>/search" method="get" class="serce_bar">
            <div class="input-group ">
                <input style="height: 35px;" type="text" name="search" required=""
                       class="form-control searchbox desktop-search-field" placeholder="Search For Products">
                
                     

                    <button class="input-group-append srcarea" ><i class="fas fa-search srcicon"></i></button>

              
            </div>
            <ul class="desktop-search-menu">



            </ul>

        </form>
    </div>
    <div class="col-lg-3 d-flex flex-row">
       <ul class="rightsection">
        <li class="main-desktop-menu-right-section " onclick="location.href='<?php echo e(url('/')); ?>/login';"  >
            <img src="<?php echo e(url('/')); ?>/images/ICON/@Account.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <!-- <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Account</span> -->
</li>
        <li class="main-desktop-menu-right-section" onclick="location.href='<?php echo e(url('/')); ?>/wishlist';" style="cursor: pointer">
            <img src="<?php echo e(url('/')); ?>/images/ICON/@Wishlis.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <!-- <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Wishlist</span> -->
         
            <span class="total-whislist-item"><?php echo e(getWishlistData()); ?></span>
                
</li>
        <li class="main-desktop-menu-right-section h" style="cursor: pointer " onclick="location.href='<?php echo e(url('/')); ?>/cart';">
            <img src="<?php echo e(url('/')); ?>/images/ICON/@Cart.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <!-- <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Cart</span> -->

            <?php  $items = \Cart::getContent();
            $total = 0;
            $quantity = 0;
            foreach ($items as $row) {
                $total = \Cart::getTotal();
                $quantity = Cart::getContent()->count();
            }
            ?>
           
            <span class="total-cart-item total_cart_item_class"><?php echo e($quantity); ?></span>
               
        </li>
        </ul>
        <!-- <div class="main-desktop-menu-right-section" style="border-bottom: 2px solid white;height: 40px;">

            <img style="width: 20%" src="<?php echo e(url('/')); ?>/images/ICON/BDT Sign 1@2x.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <?php if($total > 0): ?>
            <span style="top: 83px;margin-left:4px;" class="total_cart_item_class_value"><?php echo e(number_format($total,2)); ?></span>
                <?php endif; ?>
        </div> -->

    </div>
</div>
        </div>
    </div>  
    </div>  
<section>

 

<?php if(URL::current() != url('/')): ?>
<div class="desktop-hover-menu desktop-menu">

    <ul class="nextheader" style="z-index: 10">
        <!-- <li class="">
            <img src="<?php echo e(url('/')); ?>/images/ICON/My Offers-01 1.png" width="40" class="img-fluid desktop-left-menu-picture">

            <a href="<?php echo e(url('/')); ?>/myoffer">My Offers </a>
        </li> -->

        <?php

        $categories = DB::table('category')
                ->select('category_id', 'category_title', 'category_name','category_icon')
                ->where('parent_id', 0)
                ->where('status', 1)->orderBy('rank_order','asc')->get();
        if($categories){
        foreach ($categories as $first){
        $firstCategory_id = $first->category_id;
        $secondCategories = DB::table('category')->select('category_id', 'category_title', 'category_name')->where('parent_id', $firstCategory_id)->orderBy('category_id', 'ASC')->get();
        if($first->category_icon){
            $category_icon=url('uploads/category').'/'.$first->category_icon;
        }else{
            $category_icon= 'https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg';
        }


        if(count($secondCategories) > 0){



        ?>
        <li class="">
            <img src="<?php echo e($category_icon); ?>" width="40" class="img-fluid desktop-left-menu-picture">

            <a href="<?php echo e(url('/category')); ?>/<?php echo e($first->category_name); ?>"><?php echo e($first->category_title); ?></a>
            <span class="right-main-menu-icon"><i class="fal fa-chevron-right"></i></span>

            <ul class="sub-menu-ul">
                <?php
                foreach ($secondCategories as $secondCategory){
                ?>
                <li class="">
                    <a href="<?php echo e(url('/category')); ?>/<?php echo e($secondCategory->category_name); ?>"><?php echo e($secondCategory->category_title); ?> </a>
                </li>
                <?php } ?>
            </ul>
        </li>

        <?php

        }else{

        ?>

        <li class="">
            <img src="<?php echo e($category_icon); ?>" width="40" class="img-fluid desktop-left-menu-picture">
            <a href="<?php echo e(url('/category')); ?>/<?php echo e($first->category_name); ?>"><?php echo e($first->category_title); ?> </a>
        </li>
        <?php
        }

        }
        }

        ?>

        <li class="munu-under-section"><a>Our Shops</a></li>

        <li class="munu-under-section"><a>Why GadgetEx</a></li>


    </ul>


</div>
<script>
    $(".desktop-category-style").click(function(){
        $(".desktop-hover-menu").toggle()
        $("#hover_togole_desktop_icon").toggleClass('fad fa-chevron-down fad fa-chevron-up')
    })



</script>

    <?php endif; ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/partial/desktop_header_logo.blade.php ENDPATH**/ ?>