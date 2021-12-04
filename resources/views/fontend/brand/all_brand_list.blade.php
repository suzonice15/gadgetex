@extends('fontend.layout.master')
@section('content')

    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>
                        <li class="breadcrumb-item active" aria-current="page"  style="color:black">Brand >></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="row mt-5">
            @foreach($bands as $band)
            <div class="col-4 col-lg-2 col-xl-2">
                <div>
                    <button onclick="location.href='{{url('/brand/')}}/{{$band->brand_link}}';" > {{$band->brand_name}}</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection