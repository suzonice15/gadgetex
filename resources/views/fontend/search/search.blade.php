@extends('fontend.layout.master')
@section('content')



    <div class="container my-2">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                <li class="breadcrumb-item active " aria-current="page"><a  >{{$search_query}}</a></li>

            </ol>
        </nav>




    </div>


    <div class='container'>
                                    <div class="row">

                                        @if($products)
                                            @foreach($products as $product)

                                                <?php
                                                if ($product->discount_price) {
                                                    $sell_price = $product->discount_price;
                                                } else {
                                                    $sell_price = $product->product_price;
                                                }
                                                ?>
                                                    <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-5 "    >
                                                        <div class="card" style="cursor: pointer"  onclick="location.href='{{url('/')}}/{{$product->product_name}}';"  >
                                                            <div>
                                                                @if($product->discount > 0)
                                                                    <div class="discount-percent">{{$product->discount}}%</div>
                                                                @endif
                                                                @if($product->main_category_id==11)
                                                                    <div class="discount-status">New</div>
                                                                @endif
                                                            </div>
                                                            <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="{{$product->product_title}}" class="card-img-top product-image" alt="...">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title fw-bold" style="height:50px;overflow: hidden">{{$product->product_title}} </h5>
                                                                @if($product->product_ram_rom)
                                                                    <p class="card-text">({{$product->product_ram_rom}})</p>
                                                                @endif
                                                                <h5 class="card-title fw-bold ">{{$sell_price}} BDT</h5>
                                                            </div>
                                                        </div>
                                                    </div>


                                            @endforeach
                                        @endif



            </div>

        </div>


@endsection
