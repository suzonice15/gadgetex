@extends('fontend.layout.master')
@section('content')



    <div class="container mt-3" style="background-color: #ddd;padding: 2px;padding-left: 20px;">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}" style="text-decoration: none;color:black">Home</a></li>

                <li class="breadcrumb-item active " aria-current="page"><a  >{{$search_query}}</a></li>

            </ol>
        </nav>

    </div>
    </div>
    </div>


    <div class='container mt-2'>
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
                                                    <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-1 "  style="padding: 5px;" >
                                                        <div class="card" style="cursor: pointer"  onclick="location.href='{{url('/')}}/{{$product->product_name}}';"  >
                                                            <div>

                                                                @if($product->discount > 0)
                                                                    <div style="background:#1DBA2C" class="discount-status">-{{$product->discount}}%</div>
                                                                @endif
                                                            </div>
                                                            <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="{{$product->product_title}}" class="card-img-top product-image" alt="...">
                                                            <div class="card-body text-center">
                                                                <h5 class="card-title product-title" style="height:50px;overflow: hidden">{{$product->product_title}} </h5>


                                                                <div class="price">
                                                                    <?php
                                                                    if($product->discount_price){
                                                                    ?>
                                                                    <p class="text-danger text-decoration-line-through"> @money($product->product_price)</p>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <p> @money($sell_price)</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                            @endforeach
                                        @endif



            </div>

        </div>


@endsection
