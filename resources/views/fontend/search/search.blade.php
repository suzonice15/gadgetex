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

                                                    <div class="col-md-2 col-lg-2 col-sm-6 col-6 p-1">
                                                        <div class="card ">
                                                            @if ($product->discount_price)
                                                                <div class="freepeoduct"><strong>৳</strong> {{$product->product_price- $product->discount_price}} ছাড়</div>
                                                            @endif
                                                            <div class="box">
                                                                <a  href="{{ url('/') }}/{{$product->product_name}}" > <img  class="img-fluid p-2" src="{{ url('/public/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="{{$product->product_title}}">
                                                           </a> </div>
                                                            <div class="card-body">
                                                                <p class="product-title"><a  href="{{ url('/') }}/{{$product->product_name}}" >{{$product->product_title}} </a></p>
                                                                <div class="text-center price ">
                                                                    <?php
                                                                    if($product->discount_price){


                                                                    ?>
                                                                    <p class="text-danger text-decoration-line-through"> @money($product->product_price)</p>

                                                                    <?php


                                                                    }
                                                                    ?>
                                                                    <p> @money($sell_price)</p>
                                                                </div>
                                                                <span class="star-rating text-center "><span style="position: relative;top: 5px;">({{totalProductRiviewCount($product->product_id)}})</span></span>


                                                            </div>
                                                        </div>
                                                    </div>


                                            @endforeach
                                        @endif



            </div>

        </div>


@endsection
