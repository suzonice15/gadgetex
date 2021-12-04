@extends('admin.layouts.master')
@section('pageTitle')
    Update Category Registration Form
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
            <form  name="category" action="{{ url('admin/brand/update') }}/{{ $band->brand_id }}" class="form-horizontal"
                  method="post"
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
                                    <label for="brand_name">  Name<span class="required">*</span></label>
                                    <input required type="text" id="brand_name" class="form-control the_title"
                                           name="brand_name" value="{{$band->brand_name}}">
                                </div>

                                <div class="form-group ">
                                    <label for="brand_link">Parmalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control the_name" id="brand_link"
                                           name="brand_link"
                                           value="{{$band->brand_link}}">
                                    <span id="categoryError"></span>
                                </div>



                            </div>
                            <!-- /.col -->
                            <div class="col-md-6 col-sm-12" style="margin-left: 20px">
                                
                                <div class="form-group">
                                    <label>Category  Banner<span class="required">  </span></label>
                                    <input style="width:306px" type="file" class="form-control" name="brand_banner"/>
<?php
                         $image=url('uploads/brand').'/'.$band->brand_banner;
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


                <div class="box box-success" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #00a65a;color:white">
                        <h3 class="box-title">SEO Options</h3>
                    </div>

                    <div class="box-body" style="padding: 26px;">


                        <div class="form-group">
                            <label for="seo_title"> Title</label>
                            <input type="text" class="form-control" name="brand_seo_title" id="brand_seo_title" value="{{$band->brand_seo_title}}">
                        </div>
                        <div class="form-group "><label for="brand_seo_keyword">Meta Keywords</label>
                            <input type="text"  class="form-control"     name="brand_seo_keyword"   id="brand_seo_keyword" value="{{$band->brand_seo_keyword}}">
                        </div>
                        <div class="form-group ">
                            <label for="brand_seo_content"> Meta Description</label>
                            <textarea class="form-control" rows="2" name="brand_seo_content"  id="brand_seo_content">{{$band->brand_seo_content}}</textarea>
                        </div>


                    </div>
                </div>


                <div class="box-footer">
                    <input type="submit" class="btn btn-success pull-left" value="Update">

                </div>
            </form>


            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#category_title").on('input click', function () {
                var text = $("#category_title").val();
                var _token = $("input[name='_token']").val();

                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#category_name").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "{{url('category-urlcheck')}}",
                    success: function (result) {

                        // $('#categoryError').html(result);
                        var str2 = "es";
                        var word = $("#category_name").val(word);
                        if (result) {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#category_name").val(word);

                        } else {
                            var text = $("#category_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#category_name").val(word);
                        }
                    }
                });
            });


        });
    </script>




@endsection


