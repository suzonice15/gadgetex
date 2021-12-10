@extends('admin.layouts.master')
@section('pageTitle')
    All Orders  List
@endsection
@section('mainContent')
<div class="box-body">
    <div class="row">


        <div class="col-md-12 col-lg-12 col-sm-12" style="display: flex;justify-content: space-between;">
            <input class="btn btn-success status_check" type="button"  id="new"  value="new"/>
            <input class="btn btn-success status_check" type="button"   id="phone_pending"  value="phone_pending"/>
            <input class="btn btn-success status_check" type="button" id="pending_payment"   value="pending_payment"/>
            <input class="btn btn-success status_check" type="button"  id="processing"   value="processing"/>
            <input class="btn btn-success status_check" type="button"    id="on_courier" value="on_courier"/>
            <input class="btn btn-success status_check" type="button"  id="delivered"  value="delivered"/>
            <input class="btn btn-success status_check" type="button"   id="refund"  value="refund"/>
            <input class="btn btn-success status_check" type="button"  id="completed"   value="completed"/>
            <input class="btn btn-success status_check" type="button"  id="cancled"  value="cancled"/>
            <input class="btn btn-success status_check" type="button"  id="failed"  value="failed"/>
        </div>
        <div class="col-md-3  col-sm-12">
            <br>
            <input type="text" id="affiliate_id"   name="affiliate_id" placeholder="Search Affiliate Id" class="form-control" >
            <br>
        </div>
        <div class="col-md-3  col-sm-12">
            <br>
            <input type="text" id="product_code"   name="product_code" placeholder="Search Product Code" class="form-control" >
            <br>
        </div>
        <div class="col-md-3  col-sm-12">
            <br>
            <input type="text" id="pagination_search_by_phone"   name="pagination_search_by_phone" placeholder="Search Phone Number" class="form-control" >
            <br>
        </div>

        <div class="col-md-3  col-sm-12">
            <br>
            <input type="text" id="serach"   name="search" placeholder="Search Order Number" class="form-control" >
            <br>
        </div>
    </div>
    <div class="table-responsive">

        <table  class="table table-bordered  ">
            <thead>
            <tr style="background-color: #5f046c;color: white;text-align: center">

                <th width="10%">Order Id</th>
                <th width="15%">Customer</th>
                <th>Product</th>

                <th>History</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
               @include('admin.order.pagination')
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Invoice Print</h4>
                </div>
                <div class="modal-body"   id="orderModalPrint">

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="orderEditModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Order Edit History </h4>
                </div>
                <div class="modal-body ordereditshow" >

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="status" id="status" value="{{$order_status}}" />

</div>

<script>
    $(document).ready(function(){
        function fetch_data(page,status)
        {
            $.ajax({
                type:"GET",
                url:"{{url('/admin/order/pagination')}}?page="+page+"&status="+status,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        function fetch_data_search(page,query)
        {
            $.ajax({
                type:"GET",
                url:"{{url('/admin/order/pagination_by_search')}}?page="+page+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        function pagination_search_by_affiliate_id(page,query)
        {
            $.ajax({
                type:"GET",
                url:"{{url('/admin/order/pagination_search_by_affiliate_id')}}?page="+page+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
        function pagination_search_by_phone(page,query)
        {
            $.ajax({
                type:"GET",
                url:"{{url('/admin/order/pagination_search_by_phone')}}?page="+page+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
        function pagination_search_by_product_code(page,query)
        {
            $.ajax({
                type:"GET",
                url:"{{url('/admin/order/pagination_search_by_product_code')}}?page="+page+"&query="+query,

                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
        $(document).on('keyup input', '#serach', function(){
            var query = $('#serach').val();
            var page = $('#hidden_page').val();
            var status = $('#status').val();
            if(query.length >0) {
                fetch_data_search(page,query);
            } else {
                fetch_data_search(1, '');
            }
        });
        $(document).on('keyup input', '#affiliate_id', function(){
            var query = $('#affiliate_id').val();
            var page = $('#hidden_page').val();
            var status = $('#status').val();
            if(query.length >0) {
                pagination_search_by_affiliate_id(page,query);
            } else {
                fetch_data_search(1, '');
            }
        });
        $(document).on('keyup input', '#product_code', function(){
            var query = $('#product_code').val();
            var page = $('#hidden_page').val();
            var status = $('#status').val();
            if(query.length >3) {
                pagination_search_by_product_code(page,query);
            } else {
                pagination_search_by_product_code(1, '');
            }
        });
        $(document).on('keyup input', '#pagination_search_by_phone', function(){
            var query = $('#pagination_search_by_phone').val();
            var page = $('#hidden_page').val();
            var status = $('#status').val();
            if(query.length >7) {
                pagination_search_by_phone(page,query);
            } else {
                pagination_search_by_phone(1, '');
            }
        });
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
         var status=$('#status').val();
            fetch_data(page,status);
                });
            $(document).on('click', '.status_check', function() { // code
                var status=$(this).val()
                $('#status').val(status);
                var status=$('#status').val();
            var page = 1;
                fetch_data(page, status);
        })
    });
</script>


@endsection

