@extends('fontend.layout.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12">
                <nav style="--bs-breadcrumb-divider: '';background: #ddd;margin-top: 9px;padding-top: 10px;padding-bottom: 1px;margin-left: 5px;padding-left: 11px;" aria-label="breadcrumb" aria-label="breadcrumb"  >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="text-decoration-none " style="color:black"> <i class="fa fa-home"></i> Home >></a></li>

                        <li class="breadcrumb-item active" aria-current="page"  style="color:black"> Testmonial
                            </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="container mt-5">


        @if(isset($testmonials))
            @foreach($testmonials as $testmonial)
        <div class="row">
            <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                <img src="{{asset('/')}}{!! $testmonial->image !!}" class="img-fluid" alt="">
                <p> {!! $testmonial->user_name !!}</p>
            </div>
            <div class="col-12 col-lg-10 col-xl-10 col-xxl-10">
                <p class="commenttxt">

                    {!! $testmonial->description !!}
                    {{--<span><a href="">Details</a></span> --}}

                </p>
            </div>
        </div>
            @endforeach
            @endif




    </div>



@endsection