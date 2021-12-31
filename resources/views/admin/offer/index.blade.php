@extends('admin.layouts.master')
@section('pageTitle')
    All Offer  List
@endsection
@section('mainContent')
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="{{url('/admin/offer/create')}}" class="  btn btn-success">
<i class="fa fa-fw fa-plus"></i>  Add New  
</a>  
        </div>
        {{--<div class="col-md-4 pull-right ">--}}
            {{--<input type="text" id="serach" name="search" placeholder="Search category" class="form-control" >--}}
        {{--</div>--}}

    </div>
    <br/>
    <br/>
    <div class="table-responsive">

        <table  class="table table-bordered table-striped   ">
            <thead>
            <tr style="text-align:center !important">
                <th>Sl</th>
                <th>Banner Picture</th>
                <th>Icon Picture</th>
                <th>Category Name</th>
                <th>Category Parmalink </th>
                 <th>Status </th>
                 <th>Serial </th>
                 <th>Starting Date </th>
                 <th>Ending Date </th>
                 <th> Created date </th>
                <th >Action </th>
            </tr>
            </thead>
            <tbody>

               @include('admin.offer.pagination')
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
                url:"{{url('/admin/category/pagination/fetch_data')}}?page="+page+"&query="+query,
                success:function(data)
                {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }

        $(document).on('keyup', '#serach', function(){
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
