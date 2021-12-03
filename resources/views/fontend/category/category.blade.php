@extends('fontend.layout.master')
@section('content')

    <div class="container-fluid px-4">
<div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
        <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                <li class="breadcrumb-item active" aria-current="page"  style="color:black">New Arrival >></li>
            </ol>
        </nav>
    </div>
</div>
</div>

    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-lg-12 col-xl-12 col-xxl-12">
                <img src="{{asset('/images/ICON/Smart Phone Bar 22-01 6.png')}}"  class="img-fluid" style="width: 100%;"/>
            </div>

            <div class="col-lg-12 col-xl-12 col-xxl-12 text-center mt-5" >
                <a href="" class="btn btn-success btn-sm" style="background: #AAF3B2;border:none;color:black">Smartphone</a>
                @for($i=0;$i<15;$i++)
                <a href="" class="btn btn-success btn-sm" style="background: #E7E7E7;border:none;color:black">Powerbank</a>
                    @endfor

            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 px-5">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-xxl-3  mt-2">
                <i class="fas fa-caret-right"></i>   {!! $products->total() !!} items found in New Arrival

            </div>
            <div class="col-lg-7 col-xl-7 col-xxl-7 text-center">
                <form action="https://sohojbuy.com/search" method="get" class="serce_bar">
                    <div class="input-group mt-3">
                        <input style="height: 35px;" type="text" name="search" required="" class="form-control searchbox desktop-search-field" placeholder="Search For Products">
                        <div style="width: 50px;height: 35px;background-color: #ddd;color: black;display: flex;align-items: center;justify-content: center;" class="input-group-append">

                            <i class="fas fa-search"></i>

                        </div>
                    </div>

                </form>

            </div>
            <div class="col-lg-2 col-xl-2 col-xxl-2  mt-3">

                <select class="form-control form-select" aria-label="Default select example" name="order_by" id="order_by" >
                    <option>Latest Product</option>
                    <option>Old Product</option>
                    <option>High Price Product</option>
                    <option>Low Price Product</option>
                </select>

            </div>
        </div>
    </div>



    <div class="container-fluid px-5">
            <span id="data">
 @include('fontend.category.ajax_category')
            </span>
    </div>


    <div class="container-fluid px-5">
        <div class="row mt-5 d-flex flex-row justify-content-center">

            <div class="col-lg-7 col-xl-7 col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {!! $products->links() !!}
                </ul>
            </nav>
            </div>
            <div class="col-lg-5 col-xl-5 col-12 d-flex flex-row">
                <select class="form-select" aria-label="Default select example" name="search_id" id="per_page" style="width: 96px;height: 38px;margin-right: 8px;margin-top: -4px;" >
                    <option> 40</option>
                    <option> 50</option>
                    <option> 60</option>
                </select>
                Items per page
                </div>


        </div>
    </div>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

    <input type="hidden" id="category_id" value="{{$category_row_id}}">



    <script>
        $(document).ready(function(){

            function fetch_data(page)
            {

                var category_id=$('#category_id').val();
                var order_by=$('#order_by').val();
                var per_page=$('#per_page').val();
                $.ajax({
                    type:"GET",
                    url:"{{url('/fontend/category/products/')}}?page="+page+"&category_id="+category_id+"&order_by="+order_by+"&per_page="+per_page,
                    success:function(data)
                    {
                        console.log(data)
                     $("#data").empty()
                     $("#data").html(data.html)

                    },
                    error:function(data){
                        console.log(data)
                    }
                })
            }

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
                fetch_data(page);
            });

        });
    </script>

@endsection