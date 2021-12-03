<div class="row mt-5">
@if($products)
    @foreach($products as $key=>$product)
        <?php
        if ($product->discount_price) {
            $sell_price = $product->discount_price;
        } else {
            $sell_price = $product->product_price;
        }
        ?>
        <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-5 "    >
            <div class="card"   >
                <div>
                    <div class="discount-percent">18%</div>
                    <div class="discount-status">New</div>
                </div>
                <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="{{$product->product_title}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold" style="height:25px;overflow: hidden">{{$product->product_title}} </h5>
                    <p class="card-text">(8/128GB)</p>
                    <h5 class="card-title fw-bold ">{{$sell_price  }} BDT</h5>
                </div>
            </div>
        </div>

    @endforeach
@endif
</div>