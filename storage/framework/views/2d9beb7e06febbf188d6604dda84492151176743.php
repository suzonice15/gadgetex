
<div class="container" id="cart">

    <div class="row order_tank_you_class my-3">
        <?php



        if ( !Cart::isEmpty()){ ?>

        <div class="col-md-12  col-lg-12 col-12 ">


            <div class="card">
            <div class="card-heading text-start fw-bold ms-3 fs-4"><b>Order Review</b>
                </div>
                <div class="card-body">

					<span class="checkout-fields">


							<div class="checkoutstep">
                                <div class="cart-info" >
                                    <div class="table-responsive">
                                        <table class="table table-bordered" >
                                            <tbody>
                                            <tr>
                                                <th width="1%" class="name">Sl</th>
                                                <th   width="30%"   class="name">Products</th>
                                                <th  width="10%" style="text-align: center" class="name">Product Code</th>
                                                <th  width="20%" style="text-align: center" class="name">Quantity</th>
                                                <th   width="15%" style="text-align: center" class="name">Price</th>
                                                <th   width="15%"  style="text-align: center"class="name">Total</th>
                                                <th   width="5%" class="total text-right">Remove </th>
                                            </tr>

                                            <?php
                                            $quntity = 0;
                                            $count=0;
                                            $items = \Cart::getContent();

                                            foreach ($items as $row) {
                                            //    $subTotal = \Cart::getSubTotal();
                                            $total = \Cart::getTotal();
                                            $subTotal_price=$row->price*$row->quantity;
                                            $imagee=$row->attributes['picture'];
                                            $product_id=$row->id;

                                            $product=      single_product_information($product_id);
                                            $sku=$product->sku;
                                            $name=$product->product_name;


                                            ?>
                                            <tr id="<?=$row->id?>">
                                                <td>


                                                    <?php echo ++$count; ?>
                                                </td>
                                                <td>
                                                    <img src="<?=$imagee?>" width="70">

                                                    <a  style="text-decoration: navajowhite;color: black;" href="<?php echo e(url('/')); ?>/<?php echo e($name); ?>" target="_blank"><?=$row->name?></a>
                                                </td>
                                                <td style="text-align: center">
                                                    <?=$sku?>
                                                </td>


                                                <td style="text-align: center">
                                                    <a class="btn btn-sm btn-info  plus_cart_item" id="<?=$row->id;?>" href="javascript:void(0);">
                                                        <span class="text-white fa fa-plus"></span>
                                                    </a>
                                                    <input type="hidden" value="<?php echo e($product->product_stock); ?>" id="limit_stock_<?php echo e($row->id); ?>" >
                                                    <span id="cart_quantity_<?php echo e($row->id); ?>"> <?=$row->quantity;?></span>
                                                    <a class="btn  btn-sm btn-danger minus_cart_item" id="<?=$row->id;?>" href="javascript:void(0);">
                                                        <span class="fa fa-minus text-white"></span>
                                                    </a>
                                                </td>

                                                <td style="text-align: center">
													<span
                                                            id="per_poduct_price">  <?php echo 'Tk .' . $row->price; ?></span>

                                                </td>
                                                <td style="text-align: center">
												<span id="per_poduct_total_price_<?= $row->id?>">

												 <?php echo 'Tk .' . $subTotal_price; ?>

													</span>



                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                       onclick="CartDataRemove('<?= $row->id?>')"
                                                       style="color:red ;font-weight: bold;padding: 2px 5px;margin-left: 12px;">
                                                        <span class="fa fa-trash btn btn-danger"></span>
                                                    </a>
                                                </td>

                                            </tr>
                                            <?php } ?>

                                            <tr>
                                                <td  colspan="5" style="text-align: right" >
                                                    <span class="extra bold totalamout">Total</span>
                                                </td>
                                                <td  style="text-align: center" >
													<span class="bold totalamout"><span
                                                                id="total_cost"> <?php echo 'Tk .' . $total; ?></span></span>


                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </div>




                                    <a style="margin-left: 1px;" href="<?php echo e(url('/')); ?>/checkout"  class="btn btn-info text-white">Checkout</a>
                                    <a  href="<?php echo e(url('/')); ?>"  style="background-color:#FF6061;border: none" class="btn btn-info  text-white" >continue shopping</a>

                                </div>
                            </div>

                    </span>

                </div>


            </div>
            <?php } else { ?>

            <div class="col-md-12 mt-5 text-center">
                <h1 class="text-danger text-center text-capitalize">You have no product in your cart.
                </h1>
                <a class="text-center text-capitalize btn btn-info" href="<?php echo e(url('/')); ?>"> back to home</a>
            </div>
            <?php } ?>

        </div>

    </div>

</div>
<script>
    $('.plus_cart_item').click(function () {
        let product_id= $(this).attr('id');
        let quantity=$('#cart_quantity_'+product_id).text();
        quantity=quantity.trim();
        let product_stock = $('#limit_stock_' + product_id).val();
        if(product_stock >quantity) {
            jQuery.ajax(
                    {

                        url: "<?php echo e(url('/plus_cart_item')); ?>?product_id=" + product_id,
                        type: "get",


                    })

                    .done(function (data) {
                        console.log(data)

                        jQuery("#cart").html(data.html);

                    })

                    .fail(function (jqXHR, ajaxOptions, thrownError) {

                        // alert('server not responding...');

                    });
        } else {
            alert("Only "+product_stock +" available ")

        }


    })
</script>

<script>
    $('.minus_cart_item').click(function () {
        let product_id= $(this).attr('id');
        let quantity=$('#cart_quantity_'+product_id).text();
        quantity=quantity.trim();

        jQuery.ajax(

            {

                url:"<?php echo e(url('/minus_cart_item')); ?>?product_id="+product_id,
                type: "get",


            })

            .done(function(data)

            {
                console.log(data)

                jQuery("#cart").html(data.html);

            })

            .fail(function(jqXHR, ajaxOptions, thrownError)

            {

                // alert('server not responding...');

            });


    })
</script>

<script>
    function CartDataRemove(id){


        jQuery.ajax(

            {

                url:"<?php echo e(url('/remove_cart_item')); ?>?product_id="+id,
                type: "get",


            })

            .done(function(data)

            {
                console.log(data)

                jQuery("#cart").html(data.html);

            })

            .fail(function(jqXHR, ajaxOptions, thrownError)

            {

                // alert('server not responding...');

            });


    }
</script>

<?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/cart/cart_ajax.blade.php ENDPATH**/ ?>