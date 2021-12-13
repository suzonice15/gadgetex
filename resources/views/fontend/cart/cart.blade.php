@extends('fontend.layout.master')
@section('content')

    <div class="container" id="cart">

        <div class="row order_tank_you_class my-4">


        <?php


            if ( !Cart::isEmpty()){ ?>

            <div class="col-md-12  col-lg-12 col-12 ">

					<span class="checkout-fields">


							<div class="checkoutstep">
                               @include('fontend.cart.cart_ajax')
                            </div>

                    </span>





            <?php } else { ?>

            <div class="col-md-12 mt-5 h-100 text-center">
                <h1 class="text-danger text-center text-capitalize fw-bold">You have no product in your cart.
                </h1>
                <a class="text-center text-capitalize btn btn-info" href="{{ url('/') }}"> back to home</a>
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
                       url: "{{url('/plus_cart_item')}}?product_id=" + product_id,
                            type: "get",


                        })

                        .done(function (data) {
                            $('body .count').text(data.result.count);
                            $('body .value').text(data.result.total);

                            jQuery("#cart").html(data.html);

                        })

                        .fail(function (jqXHR, ajaxOptions, thrownError) {

                            // alert('server not responding...');

                        });
            }
            else {
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

                    url:"{{url('/minus_cart_item')}}?product_id="+product_id,
                    type: "get",


                })

                .done(function(data)

                {
                    $('body .count').text(data.result.count);
                    $('body .value').text(data.result.total);

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

                    url:"{{url('/remove_cart_item')}}?product_id="+id,
                    type: "get",


                })

                .done(function(data)

                {

                    $('body .count').text(data.result.count);
                    $('body .value').text(data.result.total);

                    jQuery("#cart").html(data.html);

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    // alert('server not responding...');

                });


        }
    </script>

@endsection
