@extends('admin.layouts.master')
@section('pageTitle')
    All Products   List
@endsection
@section('mainContent')

<style>
    .text-center{ text-align:center !important}

 </style>
<div class="box-body">
    <div class="row">
        <div class="col-md-1">
<a href="{{url('/admin/product/create')}}" class="form-control btn btn-success">
<i class="fa fa-fw fa-plus"></i>  Add New  
</a>      </div>
 

        <div class="col-md-5 pull-right ">
            <input type="text" id="serach" name="search" placeholder="Search Product By Product Code Or Product Name" class="form-control" >
        </div>
    </div>
    <br/>
    <div class="table-responsive">

        <table id="example1" class="table table-bordered table-striped   ">
            <thead>
            <tr>
                <th class="text-center">Sl</th>

                <th class="text-center">Product Code</th>
                <td width="25%">Product</th>
                <td width="25%">Ram/Rom</th>
                <?php
                $status= Session::get('status');
                if ($status != 'editor') {
                ?>
                <th class="text-center">Purchase Price</th>
                <?php
                    }
                ?>
                <th class="text-center">Sell Price</th>
                <th class="text-center">Discount Price</th>
                <th class="text-center">Published Status</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Total Sold</th>
                <th class="text-center">Serial</th>

                <th class="text-center">Location</th>
                <th class="text-center">Created date</th>
                <th class="text-center">Action</th>

               
            </tr>
            </thead>
            <tbody>

               @include('admin.product.pagination')
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>


<script>
    $(document).ready(function(){

        function fetch_data(page, query)
        {
          $.ajax({
                type:"GET",
                url:"{{url('/admin/products/pagination')}}?page="+page+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }



        $(document).on('click', '.on-off', function(){
           let productId =$(this).attr("id");
            $.ajax({
                type:"GET",
                url:"{{url('/admin/productLocationChanged')}}?productId="+productId,
                success:function(data)
                {
                    location.reload();
                }
            })
        });

        $(document).on('keyup input', '#serach', function(){
            var query = $('#serach').val();
            var page = $('#hidden_page').val();
            if(query.length >0) {
                fetch_data(page, query);
            } else {
                fetch_data(1, '');
            }
        });


        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var query = $('#serach').val();
            fetch_data(page, query);
        });

    });
</script>


@endsection

