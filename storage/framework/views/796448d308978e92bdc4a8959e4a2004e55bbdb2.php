<div class="stellarnav mobile-menu-responsive">
    <ul>



        <?php

        $categories = DB::table('category')
                ->select('category_id', 'category_title', 'category_name','category_icon')
                ->where('parent_id', 0)
                ->where('status', 1)->orderBy('rank_order','asc')->get();


        if($categories){



        foreach ($categories as $first){
        $firstCategory_id = $first->category_id;
        $secondCategories = DB::table('category')->select('category_id', 'category_title', 'category_name')->where('parent_id', $firstCategory_id)->orderBy('category_id', 'ASC')->get();

        if(count($secondCategories) > 0){



        ?>
        <li><a  style="font-size: 12px;" href="<?php echo e(url('/category')); ?>/<?php echo e($first->category_name); ?>"><?php echo e($first->category_title); ?></a>
            <ul>
                <?php foreach ($secondCategories as $second){

                $secondCategory_id = $second->category_id;
                $thirdCategories = DB::table('category')->select('category_title', 'category_name')->where('parent_id', $secondCategory_id)->orderBy('category_id', 'ASC')->get();
                if(count($thirdCategories) > 0){
                ?>

                <li><a href="#"><?php echo e($second->category_title); ?></a>
                    <ul>
                        <?php foreach ($thirdCategories as $third) {?>
                        <li><a  href="<?php echo e(url('/category')); ?>/<?php echo e($third->category_name); ?>"><?php echo e($third->category_title); ?></a>
                        </li>
                        <?php } ?>

                    </ul>
                </li>
                <?php } else { ?>
                <li><a  style="font-size: 12px;" href="<?php echo e(url('/category')); ?>/<?php echo e($second->category_name); ?>"><?php echo e($second->category_title); ?></a></li>


                <?php } }?>


            </ul>
        </li>

        <?php } else {

            if($first->category_icon){
                $category_icon=url('uploads/category').'/'.$first->category_icon;
            }else{
                $category_icon= 'https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg';
            }
            ?>


        <li><a href="<?php echo e(url('/category')); ?>/<?php echo e($first->category_name); ?>"><img  style="width: 18px;margin-right: 4px;" src="<?php echo e($category_icon); ?>"> <?php echo e($first->category_title); ?></a></li>

        <?php
        }

        }
        }
        ?>


    </ul>
</div>
<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/partial/mobile_nav_bar.blade.php ENDPATH**/ ?>