@extends('admin.layouts.master')
@section('pageTitle')
    Add New Brand
@endsection
@section('mainContent')
    <style>
        .has-error {
            border-color: red;
        }
    </style>
    <div class="box-body">
        @if (count($errors) > 0)
            <div class=" alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <ul>

                    @foreach ($errors->all() as $error)

                        <li style="list-style: none">{{ $error }}</li>

                    @endforeach

                </ul>
            </div>
        @endif


        <form action="{{ url('admin/advertisement') }}" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box" style="border: 2px solid #ddd;">
                <div class="box-header with-border" style="background-color: green;color:white;">
                    <h3 class="box-title">Advertisement Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                            <div class="form-group">
                                <label for="title">Advertisement Title<span class="required">*</span></label>
                                <input required type="text" id="title" class="form-control the_title"
                                       name="title" value="">
                            </div>

                            <div class="form-group ">
                                <label for="link">Parmalink<span class="required">*</span></label>
                                <input required type="text" class="form-control the_name" id="link"
                                       name="link"
                                       value="">
                                <span id="categoryError"></span>
                            </div>
                            <div class="form-group ">
                                <label for="order_by">Order By<span class="required">*</span></label>
                                <input required type="text" class="form-control the_name" id="order_by"
                                       name="order_by"
                                       value="">
                                <span id="categoryError"></span>
                            </div>

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12" style="margin-left: 20px">

                            <div class="form-group featured-image">
                                <label>Advertisement Banner<span class="required"></span></label>
                                <input type="file" class="form-control" name="image"/>

                            </div>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>

            <div class="box-footer">
                <input type="submit" class="btn btn-success pull-left" value="Save">

            </div>

        </form>

    </div>


@endsection


