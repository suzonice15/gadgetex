@extends('fontend.layout.master')
@section('content')
<div style="margin-bottom:20px;" class="banarsection">
    <div style="margin-top:30px;background: #F6FFF3;box-shadow: 0px 9px 19px rgb(0 0 0 / 36%);border-radius: 29px;" class="container">
        <div class="row">
            <div style="padding:0px;" class="col-12 ">
                <div  class="offerbanar text-center p-5">
                        <div class="myoffer-title">
                            <img style="width:63px;z-index: 999;margin-left:-48px;" src="{{asset('/images/ICON/tracorder.png')}}" alt="">
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
                    <form action="">
                        <table style="width:100%">
                            <tr>
                                <td><input class="form-control" type="text" placeholder="Type Order Number"></td>
                                <td><input class="form-control" type="text" placeholder="Order Tracking"></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-12">
                    <p><b>Dear honorable customer/ visitor,</b></p>
                    <p>Simply go to the “Order Tracking” option on GadgetEx website to track the status of your ordered product. If you have more questions regarding your order mail us support@gadgetex.com.bd</p>
                </div>
        </div>
    </div>
</div>
@endsection