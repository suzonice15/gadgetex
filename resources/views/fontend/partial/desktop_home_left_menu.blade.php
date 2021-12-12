<ul>

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
            ->where('status', 1)->limit(10)->get();
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
