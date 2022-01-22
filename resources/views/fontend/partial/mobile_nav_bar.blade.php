<div class="stellarnav mobile-menu-responsive">
    <ul>



        <?php

        $categories = DB::table('category')
                ->select('category_id', 'category_title', 'category_name')
                ->where('parent_id', 0)
                ->where('status', 1)->orderBy('rank_order','asc')->get();


        if($categories){



        foreach ($categories as $first){
        $firstCategory_id = $first->category_id;
        $secondCategories = DB::table('category')->select('category_id', 'category_title', 'category_name')->where('parent_id', $firstCategory_id)->orderBy('category_id', 'ASC')->get();

        if(count($secondCategories) > 0){



        ?>
        <li><a href="{{url('/category')}}/{{$first->category_name}}">{{$first->category_title}}</a>
            <ul>
                <?php foreach ($secondCategories as $second){

                $secondCategory_id = $second->category_id;
                $thirdCategories = DB::table('category')->select('category_title', 'category_name')->where('parent_id', $secondCategory_id)->orderBy('category_id', 'ASC')->get();
                if(count($thirdCategories) > 0){
                ?>

                <li><a href="#">{{$second->category_title}}</a>
                    <ul>
                        <?php foreach ($thirdCategories as $third) {?>
                        <li><a href="{{url('/category')}}/{{$third->category_name}}">{{$third->category_title}}</a>
                        </li>
                        <?php } ?>

                    </ul>
                </li>
                <?php } else { ?>
                <li><a href="{{url('/category')}}/{{$second->category_name}}">{{$second->category_title}}</a></li>


                <?php } }?>


            </ul>
        </li>

        <?php } else { ?>

        <li><a href="{{url('/category')}}/{{$first->category_name}}">{{$first->category_title}}</a></li>

        <?php
        }

        }
        }
        ?>


    </ul>
</div>
