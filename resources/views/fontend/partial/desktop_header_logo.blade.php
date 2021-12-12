<div class="row desktop-header-logo">
    <div class="col-lg-3 p-0">
        <div style="font-size: 24px;cursor: pointer" class="desktop-category-style"><i class="fas fa-bars"></i> Categories <i
                    class="fad fa-chevron-down ms-5"></i></div>
    </div>
    <div class="col-lg-4 ">
        <form action="https://sohojbuy.com/search" method="get" class="serce_bar">
            <div class="input-group mt-3">
                <input style="height: 35px;" type="text" name="search" required=""
                       class="form-control searchbox desktop-search-field" placeholder="Search For Products">
                <div style="width: 50px;height: 35px;background-color: #fff;color: black;display: flex;align-items: center;justify-content: center;"
                     class="input-group-append">

                    <i class="fas fa-search"></i>

                </div>
            </div>
            <ul class="desktop-search-menu">
            </ul>
        </form>
    </div>
    <div class="col-lg-5 d-flex flex-row mt-3">
        <div class="main-desktop-menu-right-section">
            <a href="{{url('/')}}/order-tracking" class="btn btn-light fw-bold btn-sm" style="margin-top: 2px;margin-left: -9px;">Track Order</a>
        </div>
        <div class="main-desktop-menu-right-section">
            <img src="{{url('/')}}/images/ICON/@ Account_Icon 1-02.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Account</span>
        </div>
        <div class="main-desktop-menu-right-section">
            <img src="{{url('/')}}/images/ICON/@ Wishlist-iconn-02 8.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Whislist</span>
            <span class="total-whislist-item">45</span>
        </div>
        <div class="main-desktop-menu-right-section">
            <img src="{{url('/')}}/images/ICON/@ Cart Icon Png 1-02 8.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            <span class="main-desktop-menu-right-section-span" style="font-size: 10px;"><br>Cart</span>

            <?php  $items = \Cart::getContent();
            $total = 0;
            $quantity = 0;
            foreach ($items as $row) {
                $total = \Cart::getTotal();
                $quantity = Cart::getContent()->count();
            }
            ?>
            @if($quantity >0)
            <span class="total-cart-item total_cart_item_class">{{$quantity}}</span>
                @endif
        </div>

        <div class="main-desktop-menu-right-section" style="border-bottom: 2px solid white;height: 40px;">

            <img style="width: 20%" src="{{url('/')}}/images/ICON/BDT Sign 1@2x.png"
                 class="img-fluid main-desktop-menu-right-section-picture"/>
            @if($total > 0)
            <span style="top: 83px;margin-left: 4px;" class="total_cart_item_class_value">{{number_format($total,2)}}</span>
                @endif
        </div>

    </div>
</div>

 {{--for hover menu --}}

@if(URL::current() != url('/'))
<div class="desktop-hover-menu desktop-menu">

    <ul style="z-index: 10">

        <li class="" style="margin-bottom: -33px;">
            <p class="new-arrival-icon">New</p>

            <a href="{{url('/category')}}/new-arrival"> <span class="ms-2">New Arrival</span>    </a>
        </li>
        <li class="" style="margin-to: -3px;">
            <p  class="new-arrival-icon" style="background-color: #E20000">Hot</p>

            <a href="{{url('/category')}}/hot-sell"><span class="ms-2">Hot Sale </span>   </a>
        </li>
        <li class="">
            <img src="{{url('/')}}/images/ICON/My Offers-01 1.png" width="40" class="img-fluid desktop-left-menu-picture">

            <a href="{{url('/')}}/myoffer">My Offers </a>
        </li>

        <?php

        $categories = DB::table('category')
                ->select('category_id', 'category_title', 'category_name','category_icon')
                ->where('parent_id', 0)
                ->where('status', 1)->get();
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
            <img src="{{$category_icon}}" width="40" class="img-fluid desktop-left-menu-picture">

            <a href="{{url('/category')}}/{{$first->category_name}}">{{$first->category_title}}</a>
            <span class="right-main-menu-icon"><i class="fal fa-chevron-right"></i></span>

            <ul class="sub-menu-ul">
                <?php
                foreach ($secondCategories as $secondCategory){
                ?>
                <li class="">
                    <a href="{{url('/category')}}/{{$secondCategory->category_name}}">{{$secondCategory->category_title}} </a>
                </li>
                <?php } ?>
            </ul>
        </li>

        <?php

        }else{

        ?>

        <li class="">
            <img src="{{$category_icon}}" width="40" class="img-fluid desktop-left-menu-picture">
            <a href="{{url('/category')}}/{{$first->category_name}}">{{$first->category_title}} </a>
        </li>
        <?php
        }

        }
        }

        ?>
        <li style="padding-top:10px"><a>Take Guide</a></li>
        <li><a>Our Shops</a></li>
        <li><a>How to Purchase  </a></li>
        <li><a>Why GadgetEx</a></li>
        <li><a>All Polices </a></li>

    </ul>


</div>

<script>
    $(".desktop-category-style").click(function(){
        $(".desktop-hover-menu").toggle()
    })
</script>

    @endif