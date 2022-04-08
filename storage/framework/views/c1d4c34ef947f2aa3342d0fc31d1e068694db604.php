<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(url('public/uploads/users')); ?>/<?php echo e(Session::get('picture')); ?>" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Session::get('name')); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?php
        $status= Session::get('status');

        ?>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo e(url('/admin/dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">

            </span>
                </a>

            </li>
           

            <?php
            if($status=='super-admin' or $status=='office-staff' or $status=='admin' ) {
            ?>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Orders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(url('admin/order/create')); ?>"><i class="fa fa-circle-o"></i>Add New Order</a></li>
                    <li><a href="<?php echo e(url('admin/orders')); ?>"><i class="fa fa-circle-o"></i>All Orders</a></li>

                    <li><a href="<?php echo e(url('admin/courier/view/report')); ?>"><i class="fa fa-circle-o"></i>Courier Report</a></li>
                    <li><a href="<?php echo e(url('admin/order/report')); ?>"><i class="fa fa-circle-o"></i>Order  Report</a></li>
 
                   

                </ul>
            </li>
            
          
        <?php } ?>

            <?php
            if($status=='editor' or $status=='admin') {
            ?>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Orders </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/order/create')); ?>"><i class="fa fa-circle-o"></i>Add New Order</a></li>
                    <li><a href=" <?php echo e(url('admin/orders')); ?>"><i class="fa fa-circle-o"></i>All Orders</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/product/create')); ?>"><i class="fa fa-circle-o"></i>Add New Product </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/products')); ?>"><i class="fa fa-circle-o"></i>All Products List</a></li>


                </ul>
            </li>

            <?php } ?>



            <?php


            if($status=='super-admin') {
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/product/create')); ?>"><i class="fa fa-circle-o"></i>Add New Product </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/products')); ?>"><i class="fa fa-circle-o"></i>All Products List</a></li>
                    <li><a href=" <?php echo e(url('admin/unpublishedProduct')); ?>"><i class="fa fa-circle-o"></i>All Unpublished Product</a></li>
                    <!-- <li><a href=" <?php echo e(url('admin/staff-products')); ?>"><i class="fa fa-circle-o"></i>Staff Products List</a></li> -->
 
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/category/create')); ?>"><i class="fa fa-circle-o"></i>Create category</a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/categories')); ?>"><i class="fa fa-circle-o"></i>All Categories</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/brand/create')); ?>"><i class="fa fa-circle-o"></i>Create Brand</a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/brand')); ?>"><i class="fa fa-circle-o"></i>All Brand</a></li>


                </ul>
            </li>

          

            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/user/create')); ?>"><i class="fa fa-circle-o"></i>Create User</a></li>
                    <li><a href=" <?php echo e(url('admin/users')); ?>"><i class="fa fa-circle-o"></i>Admin Users</a></li>
                    <li><a href=" <?php echo e(url('admin/generel/users')); ?>"><i class="fa fa-circle-o"></i>Generel Users</a></li>


                </ul>
            </li>
            <li class="treeview ">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Sliders</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/slider/create')); ?>"><i class="fa fa-circle-o"></i>Add Slider </a></li>
                    <li><a href=" <?php echo e(url('admin/sliders')); ?>"><i class="fa fa-circle-o"></i>All Sliders</a></li>


                </ul>
            </li>




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/report/order_report')); ?>"><i class="fa fa-circle-o"></i>Order Reports</a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/limited/product')); ?>"><i class="fa fa-circle-o"></i>Limited Product</a></li>

                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Courier</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/courier/create')); ?>"><i class="fa fa-circle-o"></i>Add New Courier </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/couriers')); ?>"><i class="fa fa-circle-o"></i>All Couriers List</a></li>


                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Advertisement</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/advertisement/create')); ?>"><i class="fa fa-circle-o"></i>Add New advertisement </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/advertisement')); ?>"><i class="fa fa-circle-o"></i>All advertisement List</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Testmonial</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/testmonial/create')); ?>"><i class="fa fa-circle-o"></i>Add New advertisement </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/testmonial')); ?>"><i class="fa fa-circle-o"></i>All advertisement List</a></li>


                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Media</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/media/create')); ?>"><i class="fa fa-circle-o"></i>Add New Media Image
                        </a></li>
                    <li><a href=" <?php echo e(url('admin/media')); ?>"><i class="fa fa-circle-o"></i>All Product Images List</a>
                    </li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Pages</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/page/create')); ?>"><i class="fa fa-circle-o"></i>Add New Page </a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/pages')); ?>"><i class="fa fa-circle-o"></i>All Pages </a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/default/setting')); ?>"><i class="fa fa-circle-o"></i>Default Setting</a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/homepage/setting')); ?>"><i class="fa fa-circle-o"></i>Home Page Setting</a></li>
                    <li><a href=" <?php echo e(url('admin/social/setting')); ?>"><i class="fa fa-circle-o"></i>Social Media Setting</a></li>
                    <li><a href=" <?php echo e(url('/admin/clear-cache')); ?>"><i class="fa fa-circle-o"></i>clear-cache</a></li>

                    


                </ul>
            </li>


        <?php } ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Offers</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" <?php echo e(url('admin/offer/create')); ?>"><i class="fa fa-circle-o"></i>Add New</a>
                    </li>
                    <li><a href=" <?php echo e(url('admin/offer')); ?>"><i class="fa fa-circle-o"></i>Offer list</a></li>
                </ul>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


<script >

    function website_message_count() {

        $.ajax({
            url:"<?php echo e(url('/')); ?>/admin/generel/message/notificationCount",
            success:function (data) {


                $('#website_message_count').text(data.message)
                $('#questions_count').text(data.product)
            }
        })

    }
    window.onload = function(e){
        website_message_count()
    }


</script>
<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/admin/layouts/includes/sidebar.blade.php ENDPATH**/ ?>