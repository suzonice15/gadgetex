
<?php $__env->startSection('content'); ?>
<div style="margin-bottom:20px;" class="banarsection">
    <div style="margin-top:30px;background: #F6FFF3;box-shadow: 0px 9px 19px rgb(0 0 0 / 36%);border-radius: 29px;" class="container">
        <div class="row">
            <div style="padding:0px;" class="col-12 ">
                <div  class="offerbanar text-center p-5">
                        <div class="myoffer-title">
                            <img style="width:63px;z-index: 999;margin-left:-48px;" src="<?php echo e(asset('/images/ICON/tracorder.png')); ?>" alt="">
                            <span style="background:#fff;" class="mytitletext mytext">Order Tracking</span>
                        </div>
                </div>
            </div>
                <div class="col-12 col-lg-12 col-xl-12">
                    <nav style="--bs-breadcrumb-divider: '';background:#75B441;margin-top: 30px;padding-top:10px;padding-bottom: 10px;margin-left: 5px;padding-left: 11px;border-radius:30px;text-align:center;" aria-label="breadcrumb">
                        <ol style="margin: 0 auto;text-align: center;right: 0;left: 0;width: 509px;" class="breadcrumb offerbradcum olbredcum">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:#fff;font-weight:700;"> Go to Order Tracking &gt;&gt;</a></li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:#fff;font-weight:700;"> Place your OTP &gt;&gt;</li>
                            <li class="breadcrumb-item active" aria-current="page" style="color:#fff;font-weight:700;">Know Order Status</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 col-lg-12 text-center mt-5 p-3">
                    <form action="" method="get">
                        <table style="width:100%">
                            <tr>
                                <td><input  required class="form-control" name="order_id" type="text" placeholder="Type Order Number"></td>
                                <td><input class="form-control btn btn-success" type="submit" value="Order Tracking"></td>
                            </tr>
                        </table>
                    </form>

                    <?php if(isset($order->order_id)): ?>
                    <div class="card-body">
                        <div class="cart-info">

                            <table class="table  table-bordered">
                                <tbody>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Order Number</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                        <span class="bold totalamout"><b><?php echo $order->order_id; ?></b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Customer Name</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b> <?= $order->customer_name; ?></b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Customer Phone</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b><?= $order->customer_phone ?></b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Customer Email</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b><?= $order->customer_email ?></b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Customer Address</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b><?= $order->customer_address ?></b></span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>


                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th class="name" width="1%">Sl</th>
                                        <th class="name" width="40%">Products</th>
                                        <th class="name" width="10%">Product Code</th>

                                        <th class="name" width="25%">Sub-Total</th>
                                    </tr>
                                    <?php
                                    $product_items = unserialize($order->products);
                                    //echo '<pre>'; print_r($product_items); echo '</pre>';
                                    $count = 1;
                                    $total = 0;
                                    foreach ($product_items['items'] as $product_id => $item) {


                                    $totall = intval(preg_replace('/[^\d.]/', '', $item['subtotal']));

                                    $total += $totall ;
                                    $featured_image = isset($item['featured_image']) ? $item['featured_image'] : null;

                                    $product=      single_product_information($product_id);
                                    $sku=$product->sku;
                                    $name=$product->product_name;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td>


                                            <img src="<?= $featured_image ?>" height="30" width="30"/>
                                            <a style="text-decoration: none;color:black" target="_blank" href="<?php echo e(url('/')); ?>/<?php echo e($name); ?>"> <?= $item['name'] ?>
                                            </a>
                                            <br/>
                                            <?php echo 'Tk .' . $item['price']; ?>✖  <?= $item['qty'] ?>

                                        </td>



                                        <td> <?php echo e($sku); ?> </td>


                                        <td>  <?php echo 'Tk .' . $item['subtotal']; ?> </td>

                                    </tr>
                                    <?php
                                    $count++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Sub Total</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                        <span class="bold totalamout"><b><?php echo 'Tk .' . $total; ?>      </b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Delivery Cost</b></span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b><?php echo 'Tk .' . $order->shipping_charge; ?> </b></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="75%">
                                        <span class="extra bold totalamout"><b>Total</span>
                                    </td>
                                    <td class="text-right" style="width:50%">
                                                    <span
                                                            class="bold totalamout"><b><?php echo 'Tk .' . $order->order_total; ?> </b></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                        <?php endif; ?>



                </div>




                <div class="col-12">
                    <p><b>Dear honorable customer/ visitor,</b></p>
                    <p>Simply go to the “Order Tracking” option on GadgetEx website to track the status of your ordered product. If you have more questions regarding your order mail us support@gadgetex.com.bd</p>
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/ordertracking.blade.php ENDPATH**/ ?>