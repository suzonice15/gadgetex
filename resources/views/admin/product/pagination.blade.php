@if(isset($products))
    <?php $i=$products->perPage() * ($products->currentPage()-1);?>
    @foreach ($products as $product)
        <tr>

            <td class="text-center"> {{ ++$i }} </td>
            <td class="text-center">{{ $product->sku }}</td>
            <td>
                <img src="{{ url('/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image }}">
                <a target="_blank" href="{{ url('/') }}/{{$product->product_name}}"> {{$product->product_title}} </a>

            </td>
            <td>{{$product->product_ram_rom}}</td>
            <?php
            $status= Session::get('status');
            if ($status != 'editor') {
            ?>
            <td class="text-center">{{ $product->purchase_price }}</td>
            <?php
                }
            ?>
            <td class="text-center">{{ $product->product_price }}</td>
            <td class="text-center">{{ $product->discount_price }}</td>
            

            <td class="text-center"><?php if($product->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td class="text-center">{{ $product->product_stock }}</td>
            <td class="text-center">{{ $product->product_order_count }}</td>
            <td class="text-center">{{ $product->order_by }}</td>
            <td class="text-center">{{date('d-m-Y h:i a',strtotime($product->created_time))}}</td>
            <td class="text-center">
                <a title="edit" href="{{ url('admin/productEdit') }}/{{ $product->product_id }}">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>
                <?php
                $admin_user=Session::get('status');
                if($admin_user !='editor' && $admin_user !='office-staff') {
                ?>


                    <a title="delete" href="{{ url('admin/product/delete') }}/{{ $product->product_id }}" onclick="return confirm('Are you want to delete this Product')">
                        <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                    </a>

                <?php } ?>






            </td>
        </tr>

    @endforeach

    <tr>
        <td colspan="9" align="center">
            {!! $products->links() !!}
        </td>
    </tr>
@endif


