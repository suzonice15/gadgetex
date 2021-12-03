@extends('admin.layouts.master')
@section('pageTitle')
  Limited Products
@endsection
@section('mainContent')



    <div class="box-body">



        <div class="table-responsive">

            <table  class="table table-bordered table-striped ">
                <thead>
                <tr>

                    <th>SL</th>

                    <th width="35%">Product</th>
                    <th>Product Code</th>
                    <th>Purchase Price</th>
                    <th>Sell Price</th>
                    <th>Discount Price</th>

                    <th>Published Status</th>
                    <th>Registration date</th>

                </tr>
                </thead>
                <tbody>

                @if(isset($products))

                    @foreach ($products as $key=>$product)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>
                                <img src="{{ url('/public/uploads') }}/{{ $product->folder }}/small/{{ $product->feasured_image }}">
                                <a href="{{ url('/') }}/{{$product->product_name}}"> {{$product->product_title}} </a>

                            </td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->purchase_price }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->discount_price }}</td>


                            <td><?php if($product->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
                            <td>{{date('d-m-Y H:m s',strtotime($product->created_time))}}</td>

                        </tr>

                    @endforeach


                @endif
                </tbody>

            </table>

        </div>





    </div>





@endsection


