@extends('fontend.layout.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">{{$brand_row->brand_name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- <?php
            if($brand_row->brand_banner){
            $image=url('uploads/brand').'/'.$brand_row->brand_banner;

            ?>
            <div class="col-lg-12 col-xl-12 col-xxl-12">
                <img src="{{$image}}"  class="img-fluid" style="width: 100%;"/>
            </div>

            <?php } ?> -->

            <div class="col-lg-12 col-xl-12 col-xxl-12 text-center mt-5" >

              @foreach($bands as $band)
                  @if($band->brand_id==$brand_row->brand_id)
                        <a href="{{url('/')}}/brand/{{$band->brand_link}}" class="btn btn-success btn-sm" style="background: #AAF3B2;border:none;color:black">{{$band->brand_name}}</a>
                      @else
                    <a href="{{url('/')}}/brand/{{$band->brand_link}}" class="btn btn-success btn-sm" style="background: #E7E7E7;border:none;color:black">{{$band->brand_name}}</a>

                    @endif
              @endforeach

            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-xl-3 col-xxl-3  mt-2">
                <i class="fas fa-caret-right"></i>   {!! $products->total() !!} items found in New Arrival

            </div>
            <div class="col-lg-7 col-xl-7 col-xxl-7 text-center">
                <form action="https://sohojbuy.com/search" method="get" class="serce_bar">
                    <div class="input-group mt-3">
                        <input style="height: 35px;" type="text" name="search" id="search_value" class="form-control searchbox desktop-search-field" placeholder="Search For Products">
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



    <div class="container">
            <span id="data">
 @include('fontend.category.ajax_category')
            </span>
    </div>


    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" id="category_id" value="{{$brand_row->brand_id}}">


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
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                        $("#data").empty()
                        $("#data").html(data.html)

                    },
                    error:function(data){
                        console.log(data)
                    }
                })
            }
            $(document).on('change', '#per_page', function(){
                var page = $('#hidden_page').val();
                fetch_data(page);

            });

            $(document).on('change', '#order_by', function(){
                var page = $('#hidden_page').val();
                fetch_data(page);

            });

            $(document).on('keyup input', '#search_value', function(){
                var search = $(this).val();
                var category_id=$('#category_id').val();
                if(search.length >2 ){
                    $.ajax({
                        type:"GET",
                        url:"{{url('/fontend/category/productsSearch/')}}?search="+search+"&category_id="+category_id,
                        success:function(data)
                        {

                            $("#data").empty()
                            $("#data").html(data.html)

                        },
                        error:function(data){
                            console.log(data)
                        }
                    })
                }
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
                fetch_data(page);
            });

        });
    </script>

@endsection