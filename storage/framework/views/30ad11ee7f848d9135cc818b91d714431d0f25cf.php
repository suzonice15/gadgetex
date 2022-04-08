<?php $__env->startSection('pageTitle'); ?>
  Dashboard View
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<br>


    <div class="row">
       
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="<?php echo e(url('admin/orders')); ?>" style="text-decoration: none">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($new); ?></h3>
                    <h4><?php echo 'Tk ' . number_format($new_sum,2); ?></h4>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
             </div>
        </a>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($pending_payment); ?></h3>
                    <h4><?php echo 'Tk ' . number_format($pending_sum,2); ?></h4>

                    <p>Pending for Payment</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
         
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($processing); ?></h3>
                    <h4><?php echo 'Tk ' . number_format($processing_sum,2); ?></h4>

                    <p>On Process</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
             
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($on_courier); ?></h3>
                    <h4><?php echo 'Tk ' . number_format($on_courier_sum,2); ?></h4>

                    <p>With Courier</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
 
            </div>
        </div>
        <!-- ./col -->
    </div>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($delivered); ?></h3>
                <h4><?php echo 'Tk ' . number_format($delivered_sum,2); ?></h4>

                <p>Delivered</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
 
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($refund); ?></h3>
                <h4><?php echo 'Tk ' . number_format($refund_sum,2); ?></h4>

                <p>Refunded</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
 
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($cancled); ?></h3>
                <h4><?php echo 'Tk ' . number_format($cancled_sum,2); ?></h4>

                <p>Cancelled</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
           
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($completed); ?></h3>
                <h4><?php echo 'Tk ' . number_format($completed_sum,2); ?></h4>

                <p>Completed</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
          
        </div>
    </div>




    <!-- ./col -->
</div>


<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($today_order); ?></h3>
                <h4><?php echo 'Tk ' . number_format($today_order_sum,2); ?></h4>

                <p>Today Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
    
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($products); ?></h3>
                <h4></h4>

                <p>All Products</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
     
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($category); ?></h3>
                <h4></h4>

                <p>All Category</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
         
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3> <a href="<?php echo e(url('/admin/limited/product')); ?>" style="color: white;" ><?php echo e($limited_products); ?></a></h3>
                <h4></h4>

                <p>Limited Products</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
        
        </div>
    </div>
    <!-- ./col -->
</div>
<div class="row">
    
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo e(url('admin/vendor/pending/products')); ?>" style="color: white;" >
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3> <?php echo e($vendor_pending_product); ?></h3>
                    <h4></h4>
                    <p>Vendor Pending Product</p>
                </div>
                
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-xs-6">
        <a href="<?php echo e(url('admin/unpublishedProduct')); ?>" style="color: white;" >
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo e($unpublishedProduct); ?></h3>


                <p>Unpublished Product</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
             
        </div>
            </a>
    </div>

    <div class="col-lg-3 col-xs-6">
        <a href="<?php echo e(url('admin/unpublishedProduct')); ?>" style="color: white;" >
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo e($sohojbuyVisitor); ?></h3>


                    <p>Today Sohojbuy Visitor </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                 
            </div>
        </a>
    </div>
     
</div>


<?php

if(session::get('status')=='super-admin' || session::get('status')=='admin'){
?>

<section class="content">

    <div class="row">

    <div class="col-md-12 table-responsive ">

        <?php
            $years=date('Y');
            $month=date('m');
        $days=cal_days_in_month(CAL_GREGORIAN,$month,$years);

        ?>

     <style>
    table ,th ,tr,td{
        text-align: center;
    }
</style>

            <table class="table table-striped table-dark">
                <caption style="text-align: center;background-color: red;color: white;/* width: 98%; *//* padding: 9px; */font-size: 19px;font-weight: bold;" >Monthly Sales Report 1-<?=date('m')?>-<?=date('Y')?> to <?=$days?>-<?=date('m')?>-<?=date('Y')?></caption>
                <thead>
                <tr style="background-color:green;color:white">
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Order</th>
                    <th scope="col">Total Amount</th>
                </tr>
                </thead>
                <tbody>

            <?php

            $final_total_order_count=0;
            $final_total_order_sum=0;
            for ($day=1;  $day<=$days;$day++) {

                $date=$years.'-'.$month.'-'.$day;
                $view_date=$day .'-'.$month.'-'.$years;
                $row='amnei disi';



                $total_order_count =DB::table('order_data')
                        ->where('order_date',$date)
                        ->where(function ($query) use ($row) {
                            return $query->orWhere('order_status','=','completed')
                                    ->orWhere('order_status','=','on_courier')
                                    ->orWhere('order_status','=','delivered');
                        })->count();
                $total_order_sum   =DB::table('order_data')->where('order_date', $date)
                        ->where(function ($query) use ($row) {
                            return $query->orWhere('order_status','=','completed')
                                    ->orWhere('order_status','=','on_courier')
                                    ->orWhere('order_status','=','delivered');
                        })
                        ->sum('order_total');

            $total_order_advaned_sum   =DB::table('order_data')->where('order_date', $date)
                    ->where(function ($query) use ($row) {
                        return $query->orWhere('order_status','=','completed')
                                ->orWhere('order_status','=','on_courier')
                                ->orWhere('order_status','=','delivered');
                    })
                    ->sum('advabced_price');

            $total_order_discount_price_sum=DB::table('order_data')->where('order_date', $date)
                    ->where(function ($query) use ($row) {
                        return $query->orWhere('order_status','=','completed')
                                ->orWhere('order_status','=','on_courier')
                                ->orWhere('order_status','=','delivered');
                    })
                    ->sum('discount_price');

                    if($view_date==date("d-m-Y")){
                        $bacground_color="red";
                        $color="white";
                    } else {
                        $bacground_color="white";
                        $color="black";
                    }
            $final_total_order_count +=$total_order_count;
            $final_total_order_sum +=$total_order_sum+$total_order_advaned_sum;

            ?>


                <tr style="background: <?=$bacground_color?>;font-size: 16px;color:<?=$color?>">
                    <th ><?=$day?></th>
                    <th ><?=$view_date?></th>
                    <td ><?=$total_order_count?></td>
                    <td><?=number_format($total_order_sum,2)?> Tk</td>
                </tr>



        <?php } ?>
                </tbody>

                <tr style="background: green;color:white;font-size: 16px">
                    <th ><?=$day?></th>
                    <th ><?=$view_date?></th>
                    <td ><?=$final_total_order_count?></td>
                    <td><?=number_format($final_total_order_sum,2)?> Tk</td>
                </tr>
            </table>
    </div>
    </div>
</section>
    <?php } ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\SXampp\htdocs\gadgetex\resources\views/admin/layouts/dashboard.blade.php ENDPATH**/ ?>