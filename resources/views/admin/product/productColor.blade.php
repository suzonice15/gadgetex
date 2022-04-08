@extends('admin.layouts.master')
@section('pageTitle')
    Products   Colors
@endsection
@section('mainContent')

    <style>
        .text-center {
            text-align: center !important
        }

    </style>
    <div class="box-body">
        <div class="row">

            <div class="col-md-5">
                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #bdbdbf;">
                        <h3 class="box-title">Product Color</h3>
                    </div>
                    <div class="box-body" style="padding: 22px;">



                        @if($check =='')

                        <form action="{{ url('/') }}/admin/product/color?target=save" class="form-horizontal" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="product_title">Color Name<span
                                            class="required">*</span></label>
                                <input required type="text" class="form-control"
                                       name="product_color_name" id="product_color_name"
                                       value="" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="product_title">Color Code<span
                                            class="required">*</span></label>
                                <input   type="color" class="form-control"
                                       name="color_code" id="color_code"
                                       value="" autocomplete="off">
                            </div>

                            <div class="form-group">

                                <input   type="submit" class="form-control btn btn-success"

                                         value="Save" autocomplete="off">
                            </div>



                        </form>

                            @else
                            <form action="{{ url('/') }}/admin/product/color?target=update&product_color_id={{$color->product_color_id}}" class="form-horizontal" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="product_title">Color Name<span
                                                class="required">*</span></label>
                                    <input required type="text" class="form-control"
                                           name="product_color_name" id="product_color_name"
                                           value="{{$color->product_color_name}}" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="product_title">Color Code<span
                                                class="required">*</span></label>
                                    <input   type="color" class="form-control"
                                             name="color_code" id="color_code"
                                             value="{{$color->color_code}}" autocomplete="off">
                                </div>

                                <div class="form-group">

                                    <input   type="submit" class="form-control btn btn-success"

                                             value="Update" autocomplete="off">
                                </div>



                            </form>

                            @endif






                    </div>
                </div>


            </div>

            <div class="col-md-7">

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped   ">
                        <thead>
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($colors as $color)
                            <tr style="text-align: center">
                                <td>{{$color->product_color_id}}</td>
                                <td>{{$color->product_color_name}}</td>
                                <td>{{$color->color_code}}</td>
                                <td>
                                    <a   href="{{url('/')}}/admin/product/color?target=edit&product_color_id={{$color->product_color_id}}" class="btn btn-success btn-sm">Edit</a>
                                    <a  onclick="return confirm('are you want to delete')" href="{{url('/')}}/admin/product/color?target=delete&product_color_id={{$color->product_color_id}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>







@endsection

