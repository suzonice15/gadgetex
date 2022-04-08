
<?php $__env->startSection('content'); ?>
<div class="banarsection">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div style="margin-top:30px;" class="offerbanar text-center p-5">
            <div class="myoffer-title">
                    <img style="width:40px;z-index: 999;" src="<?php echo e(asset('/images/ICON/Capture-4.png')); ?>" alt="">
                    <span style="background:#fff;" class="mytitletext mytext">Take Guide</span>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<section class="guidebutton">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #207B24;background:#207B24" href="https://www.facebook.com/messages/t/111812157937774" class="btn btnguide">Chat<br>Now</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #822B1E;background:#822B1E" href="<?php echo e(url('/')); ?>/shop-address" class="btn btnguide">Shop <br>Address</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #774623;background:#774623" href="<?php echo e(url('/')); ?>/exchange-smart-phone"  class="btn btnguide">Exchange <br> Smartphone</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #1E717C;background:#1E717C"  href="tel:01726003324" class="btn active btnguide">Call<br>Now</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #3C1D7A;background:#3C1D7A" href="<?php echo e(url('/')); ?>/purchage-payment" class="btn btnguide">Purchase <br>& Payment</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #1E8176;background:#1E8176" href="<?php echo e(url('/')); ?>/myoffer"  class="btn btnguide">My <br> Offers</a>
            </div>
        </div>

        <div style="margin-top:20px; border-top:1px solid #ccc;" class="row">
            <div class="col-lg-6 col-sm-6 col-6 text-center">
               <div style="margin-top:50px;" class="callnow d-flex">
                <div class="callbtn">
                     <a style="border: 0px;border-left: 26px solid #B3F2EB;background: #1E8176;margin-top: 1px;margin-left: 4px;height: 46px;line-height: 43px;" href="tel:01726003324" class="btn btnguide">Contact</a>
                </div>
                     <p>017 260 033 24</p>
               </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-6 text-center">
               <div style="margin-top:50px;"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="callnow d-flex">
                <div class="callbtn">
                     <a style="border: 0px;border-left: 26px solid #B3F2EB;background: #1E8176;margin-top: 1px;margin-left: 4px;height: 46px;line-height: 43px;" href="#" class="btn btnguide">eMail  Now</a>
                </div>
                <p style="padding-top: 18px;font-weight: 700;color: #fff;margin-left: 4px;font-size: 12px;">support@gadgetex.com.bd</p>
               </div>
            </div>
        </div>
    </div>
 </section>

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Dear honorable customer/ visitor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
                    <div class="form-group m-2">
                        <input class="form-control emilinput" type="text" placeholder="Name :">
                    </div>
                    <div class="form-group m-2">
                        <input  class="form-control emilinput" type="email" placeholder="eMail Address : ">
                    </div>
                    <div class="form-group m-2">
                        <input class="form-control emilinput"  type="number" placeholder="Phone Number : ">
                    </div>
                    <div class="form-group m-2">
                       <textarea  class="form-control emilinput"  placeholder="eMail Details :" name="" id="" cols="10" rows="5"></textarea>
                    </div>
                    <div class="form-group m-2 mb-5 p-3">
                        <input class="btn btn-lg emsubbtn"  type="submit" value="Submit">
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



















<!-- <section class="shopaddress  mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-6">
                        <img class="img-fluid" src="<?php echo e(asset('/images/ICON/shop.png')); ?>" alt="">
                    </div>
                    <div class="col-6">
                        <div class="d-flex shopicon">
                        <img style="height: 91px;" class="img-fluid" src="<?php echo e(asset('/images/ICON/shopicon.png')); ?>" alt="">
                        <h1 style="margin-left:15px;"><span style="color:#822B1E;">Shop</span><br> Address</h1>
                        </div>
                        <p><b>Shop No # 78, Level # 3, Lift # 2, Shah Ali Plaza, Mirpur # 10, Dhaka - 1216.</b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="purcher mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-2">
            <img class="img-fluid" src="<?php echo e(asset('/images/ICON/donedd.png')); ?>" alt="">
            </div>
            <div class="col-sm-12 col-lg-10">
                <h2><span style="color:#3C1D7A">Purchase</span> & Payment</h2>
                <p>Purchase & Payment kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf dsfdsfdsaf dsfdsfdsaf fsafasfasfasfasf dsfdsafdaswf</p>
            </div>
        </div>
        <div class="row p-3">
            <div class="col-sm-12 col-lg-10">
                <p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf dsfdsfdsaf dsfdsfdsaf fsafasfasfasfasf dsfdsafdaswf</p>
            </div>
            <div class="col-sm-12 col-lg-2">
            <img class="img-fluid" src="<?php echo e(asset('/images/ICON/img11.png')); ?>" alt="">
            </div>
        </div>
    </div>
</section>

<section class="emi mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-2">
            <img class="img-fluid" src="<?php echo e(asset('/images/ICON/dfd.png')); ?>" alt="">
            </div>
            <div class="col-sm-12 col-lg-10">
                <h2><span style="color:#7F1E6F">Take</span> EMI</h2>
                <p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf. </p>
            </div>
            <div class="col-lg-12">
                <p> dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf asfasfasfa sfsfasfqw rfqwrwrwr asjdklsgfjdsklf dsfkldsfjkljafkl.dsfdsafdaswf dfdafoijoidasf dsfdasfdasfoi.</p>
            </div>
        </div>
    </div>
</section>

<section class="emi mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-2">
            <img class="img-fluid" src="<?php echo e(asset('/images/ICON/tracorder.png')); ?>" alt="">
            </div>
            <div class="col-sm-12 col-lg-10">
                <h2><span style="color:#647C1E">My</span>  Delivery</h2>
                <p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf. </p>
            </div>
            <div class="col-lg-12">
                <p> dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf asfasfasfa sfsfasfqw rfqwrwrwr asjdklsgfjdsklf dsfkldsfjkljafkl.dsfdsafdaswf dfdafoijoidasf dsfdasfdasfoi.</p>
            </div>
        </div>
    </div>
</section> -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('fontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\gadgetex\resources\views/fontend/takeguide.blade.php ENDPATH**/ ?>