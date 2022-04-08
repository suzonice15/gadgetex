<div class="container" style="background-color: #eef0f1;">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
            <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;"
                 aria-label="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" class="text-decoration-none " style="color:black"> <i
                                    class="fa fa-home"></i> Home >></a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:black">
                        <?php if(isset($product->main_category_id)): ?>
                            <?php echo e(getParentCategoryName($product->main_category_id)); ?>

                        <?php endif; ?>



                    </li>
                    <li class="breadcrumb-item active" aria-current="page" style="color:black">
                        <?php if(isset($product->sub_category)): ?>
                            <?php echo e(getParentCategoryName($product->sub_category)); ?>

                        <?php endif; ?>
                        >>

                    </li>

                    <li class="breadcrumb-item active" aria-current="page" style="color:black"><?php echo e($product->product_title); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container  mt-3" style="background-color: #eef0f1;">
    <div class="row">
        <div class="col-lg-9 col-xl-9 col-xxl-9">
            <div class="row">
                
                <div class="col-lg-5 col-xl-5 col-xx-5">

                    <img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->feasured_image); ?>"
                         id="MainImgClass" class="img-fluid w-100 pd-5 xzoom"
                         xoriginal="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->feasured_image); ?>">

                    <div class="product-carusal col-lg-12 mt-3">
                        <?php
                        if($product->galary_image_1){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->feasured_image); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>

                        <?php
                        if($product->galary_image_1){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_1); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_2){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_2); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_3){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_3); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_4){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_4); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_5){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_5); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_6){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_6); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_7){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_7); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_8){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_8); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_9){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_9); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                        <?php
                        if($product->galary_image_10){
                        ?>
                        <div><img src="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/<?php echo e($product->galary_image_10); ?>"
                                  id="MainImg" class="ProductSubImage img-fluid w-100 pd-5"></div>
                        <?php } ?>
                    </div>

                </div>

                <div class="col-lg-7 col-xl-7 col-xx-7 px-4" style="-webkit-box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);
box-shadow: 0px 0px 7px 6px rgba(221,221,221,0.98);">
                    <h4 class="text-start pt-3"><?php echo e($product->product_title); ?></h4>

                    <?php if($product->brand_id > 0): ?>
                    <div class="row">
                        <div class="col-6 ps-3"><h4 class="font-weight-bold">Brand : &nbsp; <a  style="color: black;" href="<?php echo e(url('/')); ?>/brand/<?php echo e(getSingleBrand($product->brand_id)->brand_link); ?>"><?php echo e(getSingleBrand($product->brand_id)->brand_name); ?></a></h4></div>

                    </div>
                    <?php endif; ?>

                    <?php
                    if ($product->discount_price) {
                        $sell_price = $product->discount_price;
                    } else {
                        $sell_price = $product->product_price;
                    }
                    ?>

                    <div class="row">
                        <div class="col-12 ps-3" style="display: flex;justify-content: start;font-weight: bold">


                            <p  style="margin-right: 4px;"> <span class="ta">ট</span> <?php echo e(number_format($sell_price)); ?> </p>
                            <?php
                            if($product->discount_price){
                            ?>
                            <p class="text-danger text-decoration-line-through"><span class="ta">ট</span> <?php echo e(number_format($product->product_price)); ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="row d-flex flex-row available-box justify-content-around">
                        <div class="col-4">
                            <p class="available-desktop-header">In Stock</p>
                            <p class="available-desktop"><?php if($product->product_stock >0): ?> Available <?php else: ?> Unavailable <?php endif; ?></p>
                        </div>
                        <div class="col-4">
                            <p class="available-desktop-header">EMI</p>

                            <p class="available-desktop">    <?php if($product->emi==1): ?> Available  <?php else: ?>  Unavailable <?php endif; ?></p>
                        </div>
                        <div class="col-4">
                            <p class="available-desktop-header">Warranty</p>
                            <p class="available-desktop"><?php echo e($product->warenty); ?></p>
                        </div>
                    </div>


                    <?php if(!$colors->isEmpty()): ?>


                    <div class="row ">

                        <div class="col-2">
                            <h4 class="">Color:</h4>
                        </div>
                        <div class="col-5">
                            <div class="colorform ">
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key < 3): ?>
                                <div class="form-check">
                                    <input class="form-check-input color-check" type="radio" style="background:<?php echo e($color->color_code); ?>;"
                                           name="flexRadioDefault" id="flexRadioDefault1">
                                    <lebel style="margin-left: 5px;"><?php echo e($color->color_name); ?></lebel>
                                </div>
                                    <?php endif; ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="colorform ">
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key >2): ?>
                                        <div class="form-check">
                                            <input class="form-check-input color-check" type="radio" style="background:<?php echo e($color->color_code); ?>;"
                                                   name="flexRadioDefault" id="flexRadioDefault1">
                                            <lebel style="margin-left: 5px;"><?php echo e($color->color_name); ?></lebel>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>


                    </div>

                    <?php endif; ?>


                    <div class="row d-flex flex-row justify-content-end mt-3">

                        <div class="col-lg-4">
                            <div class="QuantitySection">
                                <div class="Dcrement" onclick="DecrementFunction()">-</div>
                                <span class="Quantity" id="quantity">1</span>
                                <div class="Increment" onclick="IncrementFunction()">+</div>
                            </div>

                        </div>
                        <div class="col-lg-4">

                            <a href="javascript:void(0)" class="btn btn-success btn-sm add-to-cart add_to_cart_of_product" data-product_id="<?php echo e($product->product_id); ?>"
                               data-picture="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>">ADD TO CART</a>

                        </div>
                        <div class="col-lg-4">
                            <a href="javascript:void(0)" data-product_id="<?php echo e($product->product_id); ?>"
                            data-picture="<?php echo e(url('/uploads')); ?>/<?php echo e($product->folder); ?>/small/<?php echo e($product->feasured_image); ?>" class="btn btn-success btn-sm buy-now buy_now_of_product">BUY NOW</a>
                        </div>


                    </div>


                    <div class="  d-flex flex-row justify-content-around mt-5">

                    <?php
             $user_id=Session::get('customer_id');
             if($user_id){

            ?>

                        <a href="javascript:void(0)" class="btn btn-success btn-sm add-to-wishlished add-to-wishlist" data-product_id="<?php echo e($product->product_id); ?>" > <i class="fal fa-heart  me-2"
                                                                                        style=""></i>Add to Wishlist</a>
          <?php } else { ?>      
            
            
            <a href="<?php echo e(url('/')); ?>/login?url=<?php echo e(url('/')); ?>/<?php echo e($product->product_name); ?>" class="btn btn-success btn-sm add-to-wishlished add-to-wishlist" data-product_id="<?php echo e($product->product_id); ?>" > <i class="fal fa-heart  me-2"
                                                                                        style=""></i>Add to Wishlist</a>
 
            <?php } ?>
                        <a data-product_id="<?php echo e($product->product_id); ?>" data-product_title="<?php echo e($product->product_title); ?>" href="javascript:void(0)" class="btn btn-success btn-sm add-to-compare add_to_compare_class"> <img class="compareicon"
                                                                                       src="<?php echo e(asset('/images/ICON/Compare_Icon27.png')); ?>">
                            Compare</a>
                    </div>

                    <div class="d-flex shareto flex-row justify-content-center mt-5 ">
                        <h4>Share to | </h4>
                        <a class="solik" href="http://"> <i
                                    class="fab fa-facebook-square  social-padding-of-single-product"></i></a>
                        <a class="solik" style="color: #833AB4;" href="http://" target="_blank"
                           rel="noopener noreferrer"> <i class="fab fa-instagram  social-padding-of-single-product"></i></a>
                        <a class="solik" style="color:#25D366;" href="http://" target="_blank"
                           rel="noopener noreferrer"><i
                                    class="fab fa-whatsapp  social-padding-of-single-product"></i></a>
                        <a class="solik" style="color:#2867B2;" href="http://" target="_blank"
                           rel="noopener noreferrer"> <i class="fab fa-linkedin  social-padding-of-single-product "></i></a>
                        <a class="solik" style="color:#1DA1F2;" href="http://" target="_blank"
                           rel="noopener noreferrer"> <i
                                    class="fab fa-twitter  social-padding-of-single-product"></i></a>
                    </div>

                </div>

            </div>

            <div class="col-lg-12 spec_section  col-xl-12 col-xx-12 mt-5">

                <div class="row d-flex flex-row justify-content-around">
                    <div class="specification-div">
                        <h4 class="specification-header" style="cursor: pointer" id="specificationID">
                            Specifications</h4>
                    </div>
                    <div class="specification-div">
                        <h4 class="specification-header" style="cursor: pointer" id="more_detailID">More Details</h4>
                    </div>
                    <div class="specification-div">
                        <h4 class="specification-header" style="cursor: pointer" id="warantyID">Waranty Policy</h4>
                    </div>
                    <!-- <div class="specification-div">
                        <h4 class="specification-header" style="cursor: pointer" id="termID">Tems</h4>
                    </div> -->
                    <div class="specification-div">
                        <h4 class="specification-header" style="cursor: pointer" id="reviewID">Reviews</h4>
                    </div>
                </div>

                <div class="specification-data pleft row">

                    <?php if($product->product_specification): ?>

                        <?php echo $product->product_specification;?>


                    <?php else: ?>
                    <table class="table table-bordered">

                        <tbody>
                        <?php if(count($specifications) > 0): ?>
                            <?php $__currentLoopData = $specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($key->value); ?></td>

                        </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="2">There are no specificatios</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                        <?php endif; ?>

                </div>

                <div class="more-data pleft row">
                    <?php if($product->product_description): ?>
                    <?php echo $product->product_description; ?>

                        <?php else: ?>
                    <p>There are no description</p>
                    <?php endif; ?>
                </div>

                <div class="waranty-data pleft row">
                    <?php if($product->warranty_policy): ?>
                        <?php echo $product->warranty_policy; ?>

                    <?php else: ?>
                        <p>There are no warranty</p>
                    <?php endif; ?>
                </div>
                <div class="term-data pleft row">
                    <?php if($product->product_terms): ?>
                        <?php echo $product->product_terms; ?>

                    <?php else: ?>
                        <p>There are no terms</p>
                    <?php endif; ?>
                </div>

                <div class="review-data pleft row">
                    <h1>review</h1>
                </div>


            </div>

        </div>

        <div class="col-lg-3 col-xl-3 col-xxl-3">
            <div class="row">

                <?php if(isset($adds)): ?>
                    <?php $__currentLoopData = $adds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mb-3"  style="cursor: pointer" onclick="location.href='<?php echo e($add->link); ?>';"  >
                        <img  style="border: 2px solid #ddd;" src="<?php echo e(asset('/')); ?><?php echo e($add->image); ?>" class="img-fluid w-100"/>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

            </div>

        </div>

    </div>


</div>
</div>

<link href="<?php echo e(asset('website/dist/xzoom.css')); ?>" rel="stylesheet" type="text/css" >

<script type="text/javascript"  src="<?php echo e(asset('website/dist/xzoom.min.js')); ?>"   ></script>
<script>

    $(".xzoom").xzoom({tint: '#333', Xoffset: 15});

</script>
<script>
    $('.specification-data').show();
    $('#specificationID').addClass("pactive");
    $('.more-data').hide();
    $('.waranty-data').hide();
    $('.review-data').hide();
    $('.term-data').hide();

    $(document).on('click', '#more_detailID', function () {
        $(".specification-header").removeClass("pactive");
        $(".more-data").show();
        $('#more_detailID').addClass("pactive");
        $('.waranty-data').hide();
        $('.review-data').hide();
        $('.term-data').hide();
        $('.specification-data').hide();
    })

    $(document).on('click', '#specificationID', function () {
        $(".specification-header").removeClass("pactive");
        $(".more-data").hide();
        $('.waranty-data').hide();
        $('.review-data').hide();
        $('.term-data').hide();
        $('.specification-data').show();
    })

    $(document).on('click', '#warantyID', function () {
        $(".specification-header").removeClass("pactive");
        $(".more-data").hide();
        $('.waranty-data').show();
        $('#warantyID').addClass("pactive");

        $('.review-data').hide();
        $('.term-data').hide();
        $('.specification-data').hide();
    })
    $(document).on('click', '#termID', function () {
        $(".more-data").hide();
        $('.waranty-data').hide();
        $('.review-data').hide();
        $('.term-data').show();
        $('.specification-data').hide();
    })
    $(document).on('click', '#reviewID', function () {
        $(".specification-header").removeClass("pactive");
        $(".more-data").hide();
        $('.waranty-data').hide();
        $('.review-data').show();
        $('#reviewID').addClass("pactive");
        $('.term-data').hide();
        $('.specification-data').hide();
    })


    $(document).on('click', '.ProductSubImage', function () {
        var srcAttr = $(this).attr("src");
        $("#MainImgClass").attr("src", srcAttr);
        $(".xzoom").attr('xoriginal', srcAttr);
    })

    $('.product-carusal').slick({
        slidesToShow: 4,
        slidesToScroll: 4
    });

    var filtered = false;

    $('.js-filter').on('click', function () {
        if (filtered === false) {
            $('.product-carusal').slick('slickFilter', ':even');
            $(this).text('Unfilter Slides');
            filtered = true;
        } else {
            $('.product-carusal').slick('slickUnfilter');
            $(this).text('Filter Slides');
            filtered = false;
        }
    });

</script><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/product/desktop_product.blade.php ENDPATH**/ ?>