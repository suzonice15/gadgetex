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


        <form action="{{ url('admin/brand/store') }}" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box" style="border: 2px solid #ddd;">
                <div class="box-header with-border" style="background-color: green;color:white;">
                    <h3 class="box-title">Brand Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12" style="margin-left: 10px">
                            <div class="form-group">
                                <label for="brand_name">Category Name<span class="required">*</span></label>
                                <input required type="text" id="brand_name" class="form-control the_title"
                                       name="brand_name" value="">
                            </div>

                            <div class="form-group ">
                                <label for="brand_link">Parmalink<span class="required">*</span></label>
                                <input required type="text" class="form-control the_name" id="brand_link"
                                       name="brand_link"
                                       value="">
                                <span id="categoryError"></span>
                            </div>


                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-12" style="margin-left: 20px">

                            <div class="form-group featured-image">
                                <label>Brand Banner<span class="required"></span></label>
                                <input type="file" class="form-control" name="brand_banner"/>

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
                    <h3 class="box-title">SEO Options</h3>
                </div>

                <div class="box-body" style="padding: 26px;">

                    <div class="form-group">
                        <label for="seo_title"> Title</label>
                        <input type="text" class="form-control" name="brand_seo_title" id="brand_seo_title" value="">
                    </div>
                    <div class="form-group "><label for="brand_seo_keyword">Meta Keywords</label>
                        <input type="text"  class="form-control"     name="brand_seo_keyword"   id="brand_seo_keyword" value="">
                    </div>
                    <div class="form-group ">
                        <label for="brand_seo_content"> Meta Description</label>
                        <textarea class="form-control" rows="2" name="brand_seo_content"  id="brand_seo_content"></textarea>
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
            $("#brand_name").on('input click', function () {
                var text = $("#brand_name").val();
                var _token = $("input[name='_token']").val();

                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#brand_link").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "{{url('category-urlcheck')}}",
                    success: function (result) {

                        // $('#categoryError').html(result);
                        var str2 = "es";
                        var word = $("#brand_link").val(word);
                        if (result) {
                            var text = $("#brand_name").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#brand_link").val(word);

                        } else {
                            var text = $("#brand_name").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#brand_link").val(word);
                        }
                    }
                });
            });


        });
    </script>



@endsection


