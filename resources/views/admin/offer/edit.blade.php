@extends('admin.layouts.master')
@section('pageTitle')
    Add New Offer
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


        <form action="{{ url('admin/offer/update/') }}/{{$offer->id}}" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box" style="border: 2px solid #ddd;">
                <div class="box-header with-border" style="background-color: green;color:white;">
                    <h3 class="box-title">Offer Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                            <div class="form-group">
                                <label for="category_title"> Name<span class="required">*</span></label>
                                <input required type="text" id="name" class="form-control the_title"
                                       name="name" value="{{$offer->name}}">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group ">
                                <label for="category_name">Parmalink<span class="required">*</span></label>
                                <input required type="text" class="form-control" id="link"
                                       name="link"
                                       value="{{$offer->link}}">
                                <span id="categoryError"></span>
                            </div>


                            <div class="form-group">
                                <label for="billing_name">Published Status<span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1"  >Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <label for="rank_order">Rank Order</label>
                                <input type="text" class="form-control" name="order_by" value="{{$offer->order_by}}">
                            </div>

                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12" style="margin-left: 20px">
                            <div class="form-group">

                                <div class="form-group featured-image">
                                    <label>Banner Picture<span class="required"></span></label>
                                    <input   type="file" class="form-control" name="banner"/>
                                    @if($offer->banner)
                                    <img  style="position: relative;right: 0px;top: 18px;float: right;" width="300" src="/{{$offer->banner}}">
                                     @endif

                                </div>
                                <div class="form-group featured-image">
                                    <label>Icon Picture<span class="required"></span></label>
                                    <input   type="file" class="form-control" name="picture"/>
                                    @if($offer->picture)
                                        <img  style="position: relative;right: 0px;top:-31px;float: right;" width="150" src="/{{$offer->picture}}">
                                    @endif

                                </div>

                                <div class="form-group ">
                                    <label>Starting Date <span class="required"></span></label>
                                    <input required type="text" id="start_date" class="form-control datepicker"
                                           name="start_date" value="{{date("d-m-Y",strtotime($offer->start_date))}}">

                                </div>

                                <div class="form-group ">
                                    <label>Ending Date <span class="required"></span></label>
                                    <input required type="text" id="ending_date" class="form-control datepicker"
                                           name="ending_date" value="{{date("d-m-Y",strtotime($offer->ending_date))}}">

                                </div>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->

                </div>


                <div class="box box-success" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #00a65a;color:white">
                        <h3 class="box-title">Description</h3>
                    </div>

                    <div class="box-body" style="padding: 26px;">


                        <div class="form-group ">
                            <label for="seo_content"> Short Description</label>
                            <textarea    class="form-control ckeditor"  rows="5" name="description"   >{{$offer->description}}</textarea>

                        </div>


                    </div>
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-success pull-left" value="Save">
                </div>

        </form>

    </div>


    <script>
        $(document).ready(function () {
             $("#status").val("{{$offer->status}}")


        });
    </script>



@endsection


