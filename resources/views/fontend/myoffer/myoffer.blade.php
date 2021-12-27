@extends('fontend.layout.master')
@section('content')
<div class="container-fluid px-4">
<div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
        <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home &gt;&gt;</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:black">New Arrival &gt;&gt;</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<div class="banarsection">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div style="margin-top:30px;" class="offerbanar text-center p-5">
            <div class="myoffer-title">
                    <img style="width:40px;z-index: 999;" src="http://127.0.0.1:8000/images/ICON/myoffer.png" alt="">
                    <span style="background:#fff;" class="mytitletext mytext">My Offers</span>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<section class="offerbradecum">
    <div class="container">
        <div class="row">
        <div class="col-12 col-lg-12 col-xl-12">
        <nav  style="--bs-breadcrumb-divider: '';background:#C3FFD8;margin-top: 30px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;border-radius:10px;" aria-label="breadcrumb">
            <ol class="breadcrumb offerbradcum">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:#757575;font-weight:700;"> Go to My Offers &gt;&gt;</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:#757575;font-weight:700;">Choose Your Offer Scheme &gt;&gt;</li>
                <li class="breadcrumb-item active" aria-current="page" style="color:#757575;font-weight:700;">Enjoy with Pleasure !!!</li>
            </ol>
        </nav>
    </div>
        </div>
    </div>
</section>

<section class="offcontent">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="offerdear m-3">
                    <p><b>Dear honorable customer/ visitor,</b></p>
                    <p>Simply go to the “My Offers” option on GadgetEx website to enjoy your desired offer. If you have more questions regarding your offer/offers mail us support@gadgetex.com.bd</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="campaining">
    @foreach($offers as $offer)
    <div style="background:#E2F4FF;border-radius:30px;" class="container">
            <div class="campaining row m-3 pt-3">
                <div class="col-lg-3">
                <div class="offerbox">
                    <span style="margin:10px;"><i style="color:#00853e" class="fas fa-circle"></i><span class="offernumber"></span>
                    <div class="offbox1 offbox">
                        <img style="margin-left: 29px;" src="{{url('/')}}/{{$offer->picture}}" alt="">
                        <h4>Campaign</h4>
                        <p>{{date('d-m-Y',strtotime($offer->start_date))}} to {{date('d-m-Y',strtotime($offer->ending_date))}}</p>
                    </div>
                </span></div>
                </div>
                <div class="col-lg-9">
                    <div class="contentbox">
                        <p><b>{{$offer->name}} </b></p>
                       {!! $offer->description!!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" style="cursor: pointer" target="_blank" onclick="location.href='{{$offer->link}}';" >
                    <img src="{{url('/')}}/{{$offer->banner}}" alt="" class="img-fluid" style="margin-bottom: 25px;">
                </div>
                <br>

            </div>
    </div>

        @endforeach
</section>

{{--<section class="offer">--}}
    {{--<div class="container">--}}
        {{--<div style="background:#EAFFDE;border-radius:30px;" class="row mt-3 p-3">--}}
            {{--<div class="col-lg-3 col-sm-12">--}}
                {{--<div class="offerbox ">--}}
                        {{--<span style="margin:10px;"><i style="color:#B182FE" class="fas fa-circle"></i><span class="offernumber"></span>--}}
                        {{--<div class="color1 offbox">--}}
                            {{--<img style="margin-left: 29px;" src="http://127.0.0.1:8000/images/ICON/Offer_Campaign2.png" alt="">--}}
                            {{--<h4>Campaign</h4>--}}
                            {{--<p>When Campaign Starts Open for All</p>--}}
                        {{--</div>--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-9 col-sm-12">--}}
                {{--<p><b>Student Pass Offer</b></p>--}}
                {{--<p>Student Pass offer is an unique offer for students who have student identities (ID Card of School or College or Varsity). Only students can participate at this offer.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

@endsection