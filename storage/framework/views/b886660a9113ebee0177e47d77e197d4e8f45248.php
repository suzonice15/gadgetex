
<?php $__env->startSection('content'); ?>

    <div class="container" style="background-color: #eef0f1;">
<div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
        <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                <li class="breadcrumb-item">
                     <?php if(isset($products[0]->main_category_id)): ?>
                        <?php echo e(getParentCategoryName($products[0]->main_category_id)); ?>

                        <?php endif; ?>
                 </li>
                <li class="breadcrumb-item active" aria-current="page"  style="color:black">  <?php if(isset($products[0]->sub_category)): ?>
                        <?php echo e(getParentCategoryName($products[0]->sub_category)); ?>

                    <?php endif; ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
</div>

    <div class="container mt-2">
        <div class="row">
 <?php
            if($medium_banner){
            $image=url('uploads/category').'/'.$medium_banner;

                ?>
            <div class="col-lg-12 col-xl-12 col-xxl-12">
                <img src="<?php echo e($image); ?>"  class="img-fluid" style="width: 100%;"/>
            </div>

     <?php } ?>


        </div>
    </div>

    <div class="container mt-2 px-5" style="background-color: #eef0f1;">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-xxl-3  mt-2">
                <i class="fas fa-caret-right"></i>   <?php echo $products->total(); ?> items found in New Arrival

            </div>
            <div class="col-lg-7 col-xl-7 col-xxl-7 text-center">
                <form action="https://sohojbuy.com/search" method="get" class="serce_bar">
                    <div class="input-group mt-3">
                        <input style="height: 35px;" type="text" name="search_category_product" id="search_value_product_by_category_id" class="form-control searchbox desktop-search-field" placeholder="Search For Products">
                        <div style="width: 50px;height: 35px;background-color: #ddd;color: black;display: flex;align-items: center;justify-content: center;" class="input-group-append">
                   <i class="fas fa-search"></i>

                        </div>
                    </div>

                </form>

            </div>
            <div class="col-lg-2 col-xl-2 col-xxl-2  mt-3">

                <select class="form-control form-select" aria-label="Default select example" name="order_by" id="order_by" >
                    <option>Latest Product</option>
                    <option>Old Product</option>
                    <option>High Price Product</option>
                    <option>Low Price Product</option>
                </select>

            </div>
        </div>
    </div>



    <div class="container">
            <span id="data_result">
 <?php echo $__env->make('fontend.category.ajax_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </span>
    </div>


    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" id="category_id" value="<?php echo e($category_row_id); ?>">


    <script>
        $(document).ready(function(){

            function fetch_data(page)
            {

                var category_id=$('#category_id').val();
                var order_by=$('#order_by').val();
                var per_page=$('#per_page').val();
                $.ajax({
                    type:"GET",
                    url:"<?php echo e(url('/fontend/category/products/')); ?>?page="+page+"&category_id="+category_id+"&order_by="+order_by+"&per_page="+per_page,
                    success:function(data)
                    {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                        $("#data_result").empty()
                       $("#data_result").html(data.html)

                    },
                    error:function(data){
                        console.log(data)
                    }
                })
            }
            $(document).on('change', '#per_page', function(){
                var page = $('#hidden_page').val();
                fetch_data(page);

            });

            $(document).on('change', '#order_by', function(){
                var page = $('#hidden_page').val();
                    fetch_data(page);

            });

            $(document).on('keyup input', '#search_value_product_by_category_id', function(){
                var search = $(this).val();
                var category_id=$('#category_id').val();
              if(search.length >2 ){
                  $.ajax({
                      type:"GET",
                      url:"<?php echo e(url('/fontend/category/productsSearch/')); ?>?search="+search+"&category_id="+category_id,
                      success:function(data)
                      {

                          $("#data_result").empty()
                          $("#data_result").html(data.html)

                      },
                      error:function(data){
                          console.log(data)
                      }
                  })
              }
            });


            $(document).on('keyup input', '#serach', function(){
                var query = $('#serach').val();
                var page = $('#hidden_page').val();
                if(query.length >0) {
                    fetch_data(page, query);
                } else {
                    fetch_data(1, '');
                }
            });

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];

                $('#hidden_page').val(page);
                fetch_data(page);
            });

        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/category/category.blade.php ENDPATH**/ ?>