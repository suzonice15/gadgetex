@extends('fontend.layout.master')
@section('content')
<div class="banarsection">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div style="margin-top:30px;" class="offerbanar text-center p-5">
            <div class="myoffer-title">
                    <img style="width:40px;z-index: 999;" src="{{asset('/images/ICON/Capture-4.png')}}" alt="">
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
                <a style="border:0px;border-left: 26px solid #CEF7D0;background:#207B24" href="https://www.facebook.com/GadgetExpartOfficial" class="btn btnguide">Chat<br>Now</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #FAE3E0;background:#822B1E" href="{{url('/')}}/shop-address" class="btn btnguide">Shop <br>Address</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #EDD0BB;background:#774623" href="{{url('/')}}/exchange-smart-phone"  class="btn btnguide">Exchange <br> Smartphone</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #C7F2F8;background:#1E717C"  href="tel:01726003324" class="btn active btnguide">Call<br>Now</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #CFC0ED;background:#3C1D7A" href="{{url('/')}}/purchage-payment" class="btn btnguide">Purchase <br>& Payment</a>
            </div>
            <div class="col-lg-4 col-sm-6 col-6 takbtn text-center">
                <a style="border:0px;border-left: 26px solid #B3F2EB;background:#1E8176" href="{{url('/')}}/myoffer"  class="btn btnguide">My <br> Offers</a>
            </div>
        </div>

        <div style="margin-top:20px; border-top:1px solid #ccc;" class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center">
               <div style="margin-top:50px;" class="callnow d-flex">
              <div class="callbtn">
              <a style="border: 0px;border-left: 26px solid #B3F2EB;background: #1E8176;margin-top: 1px;margin-left: 4px;height: 46px;line-height: 43px;" href="tel:01726003324" class="btn btnguide">Call  Now</a>
            </div>
            <p>017 260 033 24</p>
               </div>
            </div>
        </div>
    </div>
</section>
{{--<section class="emailguide mt-3">--}}
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-lg-8 emilform">--}}
                {{--<h2 class="text-center"><span style="color:#806A1F">eMail</span>  Now</h2>--}}
                {{--<p class="text-center"><b>Dear honorable customer/ visitor,</b></p>--}}
                {{--<p class="text-center">You are always welcome to email us at support@gadgetex.com.bd</p>--}}
                {{--<form action="">--}}
                    {{--<div class="form-group m-2">--}}
                        {{--<input class="form-control emilinput" type="text" placeholder="Name :">--}}
                    {{--</div>--}}
                    {{--<div class="form-group m-2">--}}
                        {{--<input  class="form-control emilinput" type="email" placeholder="eMail Address : ">--}}
                    {{--</div>--}}
                    {{--<div class="form-group m-2">--}}
                        {{--<input class="form-control emilinput"  type="number" placeholder="Phone Number : ">--}}
                    {{--</div>--}}
                    {{--<div class="form-group m-2">--}}
                       {{--<textarea  class="form-control emilinput"  placeholder="eMail Details :" name="" id="" cols="10" rows="5"></textarea>--}}
                    {{--</div>--}}
                    {{--<div class="form-group m-2 mb-5 p-3">--}}
                        {{--<input class="btn btn-lg emsubbtn"  type="submit" value="Submit">--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<section class="shopaddress  mt-3">--}}
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-lg-8">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-6">--}}
                        {{--<img class="img-fluid" src="{{asset('/images/ICON/shop.png')}}" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="col-6">--}}
                        {{--<div class="d-flex shopicon">--}}
                        {{--<img style="height: 91px;" class="img-fluid" src="{{asset('/images/ICON/shopicon.png')}}" alt="">--}}
                        {{--<h1 style="margin-left:15px;"><span style="color:#822B1E;">Shop</span><br> Address</h1>--}}
                        {{--</div>--}}
                        {{--<p><b>Shop No # 78, Level # 3, Lift # 2, Shah Ali Plaza, Mirpur # 10, Dhaka - 1216.</b></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
{{--<section class="purcher mt-5">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 col-lg-2">--}}
            {{--<img class="img-fluid" src="{{asset('/images/ICON/donedd.png')}}" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-sm-12 col-lg-10">--}}
                {{--<h2><span style="color:#3C1D7A">Purchase</span> & Payment</h2>--}}
                {{--<p>Purchase & Payment kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf dsfdsfdsaf dsfdsfdsaf fsafasfasfasfasf dsfdsafdaswf</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row p-3">--}}
            {{--<div class="col-sm-12 col-lg-10">--}}
                {{--<p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf dsfdsfdsaf dsfdsfdsaf fsafasfasfasfasf dsfdsafdaswf</p>--}}
            {{--</div>--}}
            {{--<div class="col-sm-12 col-lg-2">--}}
            {{--<img class="img-fluid" src="{{asset('/images/ICON/img11.png')}}" alt="">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--<section class="emi mt-5">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 col-lg-2">--}}
            {{--<img class="img-fluid" src="{{asset('/images/ICON/dfd.png')}}" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-sm-12 col-lg-10">--}}
                {{--<h2><span style="color:#7F1E6F">Take</span> EMI</h2>--}}
                {{--<p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf. </p>--}}
            {{--</div>--}}
            {{--<div class="col-lg-12">--}}
                {{--<p> dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf asfasfasfa sfsfasfqw rfqwrwrwr asjdklsgfjdsklf dsfkldsfjkljafkl.dsfdsafdaswf dfdafoijoidasf dsfdasfdasfoi.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

{{--<section class="emi mt-5">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-sm-12 col-lg-2">--}}
            {{--<img class="img-fluid" src="{{asset('/images/ICON/tracorder.png')}}" alt="">--}}
            {{--</div>--}}
            {{--<div class="col-sm-12 col-lg-10">--}}
                {{--<h2><span style="color:#647C1E">My</span>  Delivery</h2>--}}
                {{--<p>kjd;lisgfjagfjgjdlasjdklsgfjdsklf dsfkldsfjkljafkl dsfdsklfjdasfkljkl dsfdlskfjkljklij dsfljlkij lj dfdsfjkljkl dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf. </p>--}}
            {{--</div>--}}
            {{--<div class="col-lg-12">--}}
                {{--<p> dsfdsflkjklj dsdfafasfa fsafasfafasf fasfas fdsfdasljkl dsfdsfkj dsf oijkljkldsf dsfdsfaoi dsfdsfasij dfdsfdasfa sdfdsfhjoidsf fasfasfasf fsfasf fsf asfasfasfaswfasf dasfdsoihjuoie dsfdf dfdfdasfaff sfsfsfs afasfasfasf dffasfasfasfsa asfsfasfas efasfaf kjd;lisgfjagfjgjdl dffasfasf asfasfasfa sfsfasfqw rfqwrwrwr asjdklsgfjdsklf dsfkldsfjkljafkl.dsfdsafdaswf dfdafoijoidasf dsfdasfdasfoi.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}


@endsection