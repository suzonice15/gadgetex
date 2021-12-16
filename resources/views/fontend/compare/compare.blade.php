
@extends('fontend.layout.master')
@section('content')

    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    <div class="container my-3" id="wishlist" >
        <div class="row">

            <div class="col-lg-12 col">
                <div class="content">
                    <div class="com-heading">
                        <h2 class="title">
                            Product Compare
                        </h2>
                    </div>
                    <div class="compare-page-content-wrap">
                        <div class="compare-table table-responsive">
                            <div class="table-responsive"><table class="table table-bordered mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="first-column top" width="10%">Product Name</td>
                                        @if(isset($products))
                                        @foreach($products as $product)
                                        <td class="product-image-title c1075" width="15%" style="text-align: center">
                                            <img class="img-fluid" src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}"  >
                                            <p href="{{url('/')}}/{{$product->product_name}}">
                                                {{$product->product_title}}
                                            </p>
                                        </td>
                                      @endforeach
                                            @endif

                                    </tr>
                                    <tr>
                                        <td class="first-column">Price</td>

                                        @if(isset($products))
                                            @foreach($products as $product)
                                                <?php
                                                if ($product->discount_price) {
                                                    $sell_price = $product->discount_price;
                                                } else {
                                                    $sell_price = $product->product_price;
                                                }
                                                ?>
                                                <td class="pro-price c1075" style="text-align: center">৳ &nbsp;{{number_format($sell_price,2)}} </td>
                                            @endforeach
                                        @endif


                                    </tr>

                                    <tr>
                                        <td class="first-column">Add To Cart</td>
                                        @if(isset($products))
                                            @foreach($products as $product)
                                                <?php
                                                if ($product->discount_price) {
                                                    $sell_price = $product->discount_price;
                                                } else {
                                                    $sell_price = $product->product_price;
                                                }
                                                ?>
                                                    <td class="c1075">

                                                        <a href="javascript:;" data-product_id="{{ $product->product_id}}"
                                                           data-picture="{{ url('/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-success add_to_cart_of_product add-to-cart">Add To Cart</a>
                                                        <a  data-product_id="{{ $product->product_id}}"
                                                           data-picture="{{ url('/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-success buy_now_of_product">Buy Now</a>
                                                    </td>

                                            @endforeach
                                        @endif


                                    </tr>
                                    <tr>
                                        <td class="first-column">Remove</td>
                                        <td class="pro-remove ">
                                            <i class="fal fa-trash  btn btn-danger btn-sm" data-href="https://fairmart.com.bd/item/compare/remove/1075" data-class="c1075"></i>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>

        $(document).on('click', '.add_to_cart_of_product', function () {
            let product_id = $(this).data("product_id"); // will return the number 123
            let picture = $(this).data("picture"); // will return the number 123

             var   quntity = 1;


            $.ajax({
                type: "GET",
                url: "{{url('add-to-cart')}}?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,

                success: function (data) {
                    toastr.success('Product Added Successfully', '')
                    $('.total_cart_item_class').text(data.result.count);
                    $('.total_cart_item_class_value').text(data.result.total);
                }
            })

        })

        $(document).on('click', '.buy_now_of_product', function () {
            let product_id = $(this).data("product_id"); // will return the number 123
            let picture = $(this).data("picture"); // will return the number 123
               var quntity = 1;

            $.ajax({
                type: "GET",
                url: "{{url('add-to-cart')}}?product_id=" + product_id + "&picture=" + picture + "&quntity=" + quntity,
                success: function (data) {
                    toastr.success('Product Added Successfully', '')
                    window.location.assign("{{ url('/') }}/cart")
                }
            })

        })
    </script>



@endsection
