@extends('admin.layouts.master')
@section('pageTitle')
    Update Advertisement Registration Form
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

        <div class="col-sm-offset-0 col-md-12">
            <form  name="category" action="{{ url('admin/Advertisement') }}/{{ $advertisement->id }}" class="form-horizontal"
                  method="post"
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
                                    <label for="title">  Name<span class="required">*</span></label>
                                    <input required type="text" id="title" class="form-control the_title"
                                           name="title" value="{{$advertisement->title}}">
                                </div>

                                <div class="form-group ">
                                    <label for="link">Parmalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control the_name" id="link"
                                           name="link"
                                           value="{{$advertisement->link}}">
                                    <span id="categoryError"></span>
                                </div>



                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 col-sm-12" style="margin-left: 20px">
                                
                                <div class="form-group">
                                    <label>  Banner<span class="required">  </span></label>
                                    <input style="width:306px" type="file" class="form-control" name="image"/>
<?php
                                     $image=$advertisement->image;
                                    ?>
                                    <img  style="position: absolute;margin-top: 7px;" width="50" src="{{$image}}">
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>



                <div class="box-footer">
                    <input type="submit" class="btn btn-success pull-left" value="Update">

                </div>
            </form>


            </form>
        </div>
    </div>


@endsection


