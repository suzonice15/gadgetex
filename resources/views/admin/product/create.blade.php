@extends('admin.layouts.master')
@section('pageTitle')
    Add New Product
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


        <form action="{{ url('/') }}/admin/product/store" class="form-horizontal" method="post"
              enctype="multipart/form-data">
            @csrf

            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="box box-primary" style="border: 2px solid #ddd;">
                            <div class="box-header" style="background-color: #bdbdbf;">
                                <h3 class="box-title">Product Information</h3>
                            </div>
                            <div class="box-body" style="padding: 22px;">
                                <div class="form-group">
                                    <label for="product_title">Product Title<span
                                                class="required">*</span></label>
                                    <input required type="text" class="form-control the_title"
                                           name="product_title" id="product_title"
                                           value="" autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="product_name">Permalink<span class="required">*</span></label>
                                    <input required type="text" class="form-control the_name"
                                           name="product_name" id="product_name"
                                           value="" autocomplete="off">
                                    <p id="produtctError"></p>
                                </div>
                                <div class="form-group ">
                                    <label for="product_ram_rom">Ram / Rom<span class="required"></span></label>
                                    <input   type="text" class="form-control product_ram_rom"
                                           name="product_ram_rom" id="product_ram_rom"
                                           value="" autocomplete="off">
                                    <p id="produtctError"></p>
                                </div>


                                <div class="form-group ">
                                    <label for="sku">Product Code(sku)<span class="required">*</span></label>
                                    <input required type="text" class="form-control" name="sku" id="sku"
                                           value="GX<?php echo $sku;?>" autocomplete="off">
                                    <span class="text-danger" id="sku_error"></span>
                                </div>
                                <?php
                                $status= Session::get('status');
                                if ($status != 'editor') {
                                ?>
                                <div
                                     class="form-group ">
                                    <label for="purchase_price">Purchase Price<span
                                                class="required"></span></label>
                                    <input type="number" class="form-control" name="purchase_price"
                                           id="purchase_price"
                                           value="" autocomplete="off">
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="form-group ">
                                    <label for="sell_price">Regular Price<span class="required">*</span></label>
                                    <input required type="number" class="form-control" name="product_price"
                                           id="product_price" value="" autocomplete="off">
                                </div>


                                <div class="form-group ">
                                    <label for="discount_price"> Discount Price</label>
                                    <input type="number" class="form-control" name="discount_price"
                                           id="discount_price"
                                           value="" autocomplete="off">
                                </div>

                               

                                <div class="form-group ">
                                    <label for="product_availability">Product Published
                                        Status</label> <select name="status"
                                                               class="form-control">
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select></div>

                                <div class="form-group ">
                                    <label for="product_availability">EMI Status     </label>
                                    <select name="emi"  class="form-control">
                                        <option value="1">Available</option>
                                        <option value="0">Unavailable</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label for="discount_price"> Warranty </label>
                                    <input type="text" class="form-control" name="warenty"
                                           id="warenty"
                                           value="" autocomplete="off">
                                </div>
                               

                                
                                <div class="form-group ">
                                    <label for="stock_qty">Stock Qty.</label>
                                    <input type="text" class="form-control" name="product_stock" id="product_stock"
                                           value="" autocomplete="off">
                                </div>
                                <div class="form-group" hidden>
                                    <label for="stock_qty">Stock Alert.</label>
                                    <input type="text" class="form-control" name="stock_alert" id="stock_alert"
                                           value="" autocomplete="off">
                                </div>


                                <div class="form-group ">
                                    <label for="product_type">Product Location</label>
                                    <select name="product_type" id="product_type"
                                            class="form-control">
                                        <option value="general">General</option>
                                        <option value="home">Home</option>
                                        <option value="hot">Hot Sell</option>
                                    </select>

                                </div>

                                


                                <div  class="form-group ">
                                    <label for="product_video">Youtube Video Id</label>
                                    <input type="text" class="form-control" name="product_video"
                                           id="product_video" value="" placeholder="_J1yEsTYXWQ" autocomplete="off">
                                </div>
                                <div  class="form-group ">
                                    <label for="product_video">Product Serial</label>
                                    <input type="text" class="form-control" name="order_by"
                                           id="order_by" value="" placeholder="12" autocomplete="off">
                                </div>

                                <div class="form-group ">
                                    <label for="discount_price">Delivery Charge Inside Dhaka</label>
                                    <input type="text" class="form-control" name="delivery_in_dhaka"
                                           id="discount_price"
                                           value="<?= get_option('shipping_charge_in_dhaka') ?>" autocomplete="off">
                                </div>
                                <div class="form-group ">
                                    <label for="discount_price">Delivery Charge Outside Dhaka</label>
                                    <input type="text" class="form-control" name="delivery_out_dhaka"
                                           id="discount_price"
                                           value="<?= get_option('shipping_charge_out_of_dhaka') ?>" autocomplete="off">
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">

                    <div class="box box-primary" style="border: 2px solid #ddd;">
                                <div class="box-header" style="background-color: #bdbdbf;">
                                    <h3 class="box-title">Categories <span class="required">*</span></h3>
                                </div>
                                <div class="box-body" style="padding: 22px;">
                                    <div class="form-group">
                                    <label>Parent Category </label>
                                        <select required name="main_category_id" id="main_category_id" class="form-control select2">
                                            <option value="">---------Select Category-------</option>
                                        @if(isset($categories)) 
                                        @foreach ($categories as $category) 
                                        ?>
                                        <option value="{{$category->category_id}}">{{$category->category_title}}</option> 

                                      @endforeach
                                      @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label>Sub Category </label>
                                        <select name="sub_category" id="sub_category" class="form-control select2">
                                        <option value="">---------select Parent Category-------</option>
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <label>Brand Name </label>
                                        <select required name="brand_id" id="brand_id" class="form-control select2">
                                            <option value="">---select main Category---</option>

                                        </select>
                                    </div>


                                </div>
                            </div>

                        <div class="box box-primary" style="border: 2px solid #ddd;">
                          
                        <div class="box-header" style="background-color: #bdbdbf;">

<h3 class="box-title"> Image and Gallary<span class="required">*</span></h3>
</div>
                            <div class="box-body" style="padding: 22px;">
                            <div class="form-group featured-image" >
                                    <label>Featured Image<span class="required">* Size(800*800)</span></label>
                                    <input  required type="file" class="form-control" name="featured_image"/>

                                </div>

                                <div class="form-group featured-image">
                                    <label>Product Gallary<span class="required">* Size(800*800)</span></label>
                                    <input type="file" class="form-control" name="product_image1"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image2"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image3"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image4"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image5"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image6"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image7"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image8"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image9"/>
                                    <br>
                                    <input type="file" class="form-control" name="product_image10"/>
                                    <br>

                                </div>
                            </div>
                        </div>



                        <div class="box box-primary" style="border: 2px solid #ddd;">

                            <div class="box-header" style="background-color: #bdbdbf;">

                                <h3 class="box-title"> Color  </h3>
                            </div>
                            <div class="box-body" style="padding: 22px;">


                                @foreach($colors as $color)
                                <div class="form-group">
                                    <input type="checkbox" name="color[]" value="{{$color->product_color_id}}">
                                    <label style="margin-left: 8px;"> {{$color->product_color_name}}</label>
                                </div>
                                    @endforeach


                            </div>
                        </div>


                    </div>
                </div>


              

              
                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #bdbdbf;">

                        <h3 class="box-title">More Details</h3>
                        <button type="button" class="btn btn-success btn-sm pull-right"  data-toggle="modal" data-target="#modal-default"> <i class="fa fa-fw fa-plus"></i>Add Picture</button>
                    </div>
                    <div class="box-body" style="padding: 22px; ">
                        <div class="form-group ">
                <textarea   class="form-control ckeditor" rows="10" name="product_description"
                          id="product_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #ddd;">
                        <h3 class="box-title">Warranty Policy
                        </h3>
                    </div>
                    <div class="box-body" style="padding: 22px; ">
                        <div class="form-group ">
                            <textarea class="form-control ckeditor" rows="3" name="warranty_policy"
                                      id="warranty_policy"> </textarea>
                        </div>
                    </div>
                </div>



                <div class="box box-primary" style="border: 2px solid #ddd;" >
                    <div class="box-header" style="background-color: #bdbdbf;">

                        <h3 class="box-title">Terms</h3>
                    </div>
                    <div class="box-body" style="padding: 22px; ">
                        <div class="form-group ">
									<textarea class="form-control ckeditor " rows="5" name="product_terms"
                                              id="product_terms"></textarea>
                        </div>
                    </div>
                </div>

                <div class="box box-primary" style="border: 2px solid #ddd;" >
                    <div class="box-header" style="background-color: #bdbdbf;">

                        <h3 class="box-title">Specification</h3>
                    </div>
                    <div class="box-body" style="padding: 22px; ">
                        <div class="form-group ">
									<textarea class="form-control ckeditor " rows="5" name="product_specification"
                                              id="product_specification"></textarea>
                        </div>
                    </div>
                </div>





                <div class="box box-primary" style="border: 2px solid #ddd;" >
                    <div class="box-header" style="background-color: #bdbdbf;">
                        <h3 class="box-title">Specifications</h3>
                    </div>
                    <div class="box-body" style="padding: 22px; ">
                   

                       <table class="table table-bordered">
                           <tr>

                               <th>Value</th>
                               <th width="2%"></th>

                           </tr>
                           <tbody id="add_more_table">

                               <tr>

                                   <td> <input type="text" class="form-control" placeholder="value" name="value[]" /></td>
                                   <td> <button type="button" class="btn btn-success"  id="add_more"  ><i class="fa fa-fw fa-plus"></i></button> </td>
                              </tr>

                             
                          </tbody>
                    </table>

                      

                    </div>
                </div>



                <div class="box box-primary" style="border: 2px solid #ddd;">
                    <div class="box-header" style="background-color: #bdbdbf;">

                        <h3 class="box-title">SEO Options</h3>
                    </div>


                    <div class="box-body" style="padding: 22px; ">
                        <div class="form-group  ">
                            <label for="seo_title"> Title</label>
                            <input type="text" class="form-control" name="seo_title" id="seo_title"
                                   value=" ">
                        </div>


                        <div class="form-group  ">
                            <label for="seo_content">Meta description</label>
								<textarea class="form-control" rows="5" name="seo_content"
                                          id="seo_content"> </textarea>
                        </div>

                        <div class="form-group  ">
                            <label for="seo_keywords">Meta Keywords</label>

                            <input type="text" class="form-control" name="seo_keywords" id="seo_title"
                                   value=" ">


                        </div>
                    </div>
                </div>
                <div class="box-footer">

                    <button type="submit" class="btn btn-success pull-left">Save</button>
                </div>
            </div>
        </form>

    </div>


     {{--add more picture start--}}


    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Picture for Detail Page</h4>
                </div>
                <div class="modal-body">

                    <form role="form" id="imageUpload" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Add New Picture</label>
                                <input type="file" name="picture" id="picture" >

                            </div>
                        </div>
                    </form>
                    <span id="getProductDetailMediaFile"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    {{--add more picture end--}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>

        $('#imageUpload').on('change',function(event) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            $.ajax({
                type:'POST',

                url: "{{url('admin/productDetailImageUpload')}}",

                data:formData,

                cache:false,

                contentType: false,

                processData: false,

                success:function(data){
                    $.ajax({
                        url:"{{url('/')}}/admin/getProductDetailMediaFile",
                        success:function(data){
                            $("#getProductDetailMediaFile").html(data)
                        }
                    })

                },

                error: function(data){

                    console.log(data);

                }

            });
            event.preventDefault();

        });

        getProductDetailMediaFile()

        function getProductDetailMediaFile(){

            $.ajax({
                url:"{{url('/')}}/admin/getProductDetailMediaFile",
                success:function(data){
                    $("#getProductDetailMediaFile").html(data)
                }

            })
        }

    </script>


    <script>
        $(document).ready(function () {
            $("#add_more").click(function(){
                let html='<tr>\
                        <td> <input type="text" class="form-control" placeholder="value" name="value[]" /></td>\
                        <td class="delete"><button type="button" class="btn btn-danger btn-sm"     ><i class="fa fa-fw fa-trash"></i></button> </td>\
                </tr>';
                $("#add_more_table").append(html);

            })
            $("#add_more_table").on("click", ".delete", function(e) {
              $(this).parent('tr').remove();

            })


            $("#main_category_id").on('change', function () { 
                    var main_category_id = $("#main_category_id").val();
                $.ajax({
                    data: {main_category_id: main_category_id},
                    type: "get",
                    url: "{{url('admin/getSubCategoryForProduct')}}/"+main_category_id,
                    success: function (result) {

                       
                        $('#sub_category').html(result.category);
                        $('#brand_id').html(result.brands);
                    }
                }); 


            });



            $("#product_title").on('input click', function () {
                var text = $("#product_title").val();
                var _token = $("input[name='_token']").val();
                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                $("#product_name").val(word);
                $.ajax({
                    data: {url: word, _token: _token},
                    type: "POST",
                    url: "{{route('product.urlcheck')}}",
                    success: function (result) {
 
                        var str2 = "es";
                        var word = $("#product_name").val(word);
                        if (result) {
                            var text = $("#product_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            var word = word.concat(str2);
                            $("#product_name").val(word);

                        } else {
                            var text = $("#product_title").val();
                            var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                            $("#product_name").val(word);
                        }
                    }
                });
            });
            
        });
    </script>




@endsection


