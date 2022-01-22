<div class="row mt-2">
@if($products)
    @foreach($products as $key=>$product)
        <?php
        if ($product->discount_price) {
            $sell_price = $product->discount_price;
        } else {
            $sell_price = $product->product_price;
        }
        ?>
        <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-1 "  style="padding: 5px;"  >
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




    <div class="col-lg-7 col-xl-7 col-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {!! $products->links() !!}
            </ul>
        </nav>
    </div>
    <div class="col-lg-5 col-xl-5 col-12 d-flex flex-row">
        <select class="form-select" aria-label="Default select example" name="search_id" id="per_page" style="width: 96px;height: 38px;margin-right: 8px;margin-top: -4px;" >
            <option> 24</option>
            <option> 50</option>
            <option> 60</option>
            <option> 100</option>
            <option> 200</option>
            <option> 500</option>
        </select>
        Items per page
    </div>
</div>