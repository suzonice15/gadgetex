       <div class="searchresult">
    <ul>


        <?php
        if ($products) {
            $i = 0;
            $html='';
            foreach ($products as $product) {
                $product_link = 'product/' . $product->product_name;
// product price
                $product_price = $product->product_price;
                $product_title = $product->product_title;
                $product_discount = $product->discount_price;
                $sku = $product->sku;
                if ($product_discount >0) {
                    $sell_price = $product_discount;
                } else {
                    $sell_price = $product_price;
                }
//$image = get_product_thumb($product->product_id);

                if ($i <= 7) {
                    ?>

        <li>
            <div class="docname">
                <a  onclick="location.href='{{url('/')}}/{{$product->product_name}}';"  >
                    <div class="search-content">
                        <img src="{{ url('/uploads') }}/{{ $product->folder }}/thumb/{{ $product->feasured_image }}" alt="">
                        <p><span>{{$product->product_title}}</span> <br>
                            <span style="font-size: 14px; font-weight:600; display:block;">
{{--<del>৳200</del>--}}

                                ৳ {{$sell_price}}
   </span>
                            </p>
                        </div>
                    
                    </a>
                </div>
            </li>


            <?php
            }

            $i++;
            }
            if($i >= 7){
            $total_product = DB::table('product')->where('status','=',1)->where(function ($query) use ($search_query){
                return $query->where('sku','LIKE','%'.$search_query.'%')
                        ->orWhere('product_title','LIKE','%'.$search_query.'%');
            })->count();
            $more_product=$total_product-$i;
            ?>

            <li  style="cursor:pointer;background: #29e8a0;text-align: center;/*! justify-items: safe; */color: black !important;">
                <div class="docname">
                    <a  onclick="location.href='{{url('search') }}?search={{$search_query}}';"    >
                        <div class="search-content">
                            <p>
                                {{$more_product}} more
                                results
                            </p>
                        </div>

                    </a>
                </div>
            </li>

            <?php } ?>

            <?php
            }

            ?>




        </ul>
    </div>