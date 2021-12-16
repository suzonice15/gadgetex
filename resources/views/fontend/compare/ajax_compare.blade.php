
<table class="table table-bordered mb-0">
    <tbody>
    <tr>
        <td class="first-column top" width="15%"  >Product Name</td>
        @if(isset($products))
            @foreach($products as $product)
                <td class="product-image-title c1075"  onclick="location.href='{{url('/')}}/{{$product->product_name}}';"   style="text-align: center;cursor: pointer">
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
        <td class="first-column">Description</td>

        @if(isset($products))
            @foreach($products as $product)

                <td class="pro-price c1075" style="text-align: center"> {!!  $product->product_description !!} </td>
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
                       data-picture="{{ url('/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-success add_to_cart_of_product add-to-cart form-control">Add To Cart</a>
                    <a  data-product_id="{{ $product->product_id}}"
                        data-picture="{{ url('/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image}}" class="btn btn-success buy_now_of_product">Buy Now</a>
                </td>

            @endforeach
        @endif


    </tr>
    <tr>
        <td class="first-column">Remove</td>


        @if(isset($products))
            @foreach($products as $product)
                <?php
                if ($product->discount_price) {
                    $sell_price = $product->discount_price;
                } else {
                    $sell_price = $product->product_price;
                }
                ?>
                <td style="text-align: center" class="compare-remove" onclick="removeCompare({{$product->product_id}})">
                    <i class="fal fa-trash  btn btn-danger btn-sm compare"   ></i>
                </td>

            @endforeach
        @endif

    </tr>
    </tbody>
</table></div>
