@extends('admin.layouts.master')
@section('pageTitle')
    Add New Testmonial
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


        <form action="{{ url('admin/testmonial') }}" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box" style="border: 2px solid #ddd;">
                <div class="box-header with-border" style="background-color: green;color:white;">
                    <h3 class="box-title">testmonial Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                            <div class="form-group">
                                <label for="user_name">User Name<span class="required">*</span></label>
                                <input required type="text" id="user_name" class="form-control the_title"
                                       name="user_name" value="">
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
                        <div class="col-10" style="margin-left: 20px">
                        <div class="form-group">
                                <label for="description">Description<span class="required">*</span></label>
                                <textarea required  id="description" class=" ckeditor "
                                       name="description"></textarea>
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


