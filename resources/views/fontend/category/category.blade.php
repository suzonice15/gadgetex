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
                <i class="fas fa-caret-right"></i>  33 items found in New Arrival

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

                <select class="form-control form-select" aria-label="Default select example" name="search_id" >
                    <option>Latest Product</option>
                    <option>Old Product</option>
                    <option>High Price Product</option>
                    <option>Low Price Product</option>
                </select>

            </div>
        </div>
    </div>



    <div class="container-fluid px-5">
        <div class="row mt-5">

                @for($i=0;$i<=12;$i++)
                    <div class="col-6 col-md-4 col-lg-3  col-xl-2 col-xxl-2 mb-5 "    >
                        <div class="card"   >
                            <div>
                                <div class="discount-percent">{{$i}}%</div>
                                <div class="discount-status">New</div>
                            </div>
                            <img src="{{asset('/images/ICON/X70 Pro-10 7.png')}}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold">Vivo X70 Pro</h5>
                                <p class="card-text">(8/128GB)</p>
                                <h5 class="card-title fw-bold ">70,000 BDT</h5>
                            </div>
                        </div>
                        </div>
                @endfor

        </div>
    </div>


    <div class="container-fluid px-5">
        <div class="row mt-5 d-flex flex-row justify-content-center">

            <div class="col-lg-7 col-xl-7 col-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"> > </a>
                    </li>
                </ul>
            </nav>
            </div>
            <div class="col-lg-5 col-xl-5 col-12 d-flex flex-row">
                <select class="form-select" aria-label="Default select example" name="search_id" style="width: 96px;height: 38px;margin-right: 8px;margin-top: -4px;" >
                    <option> 25</option>
                    <option> 50</option>
                    <option> 10</option>
                </select>
                Items per page
                </div>


        </div>
    </div>

@endsection