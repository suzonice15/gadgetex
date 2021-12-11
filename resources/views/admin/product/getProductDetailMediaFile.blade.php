

    <div class="row">
            <table id="example1" class="table table-bordered table-striped " >
                <thead>
                <tr >
                    <th style="text-align: center">SL</th>
                    <th style="text-align: center">Picture</th>
                    <th style="text-align: center">Date</th>
                    <th style="text-align: center">
                        Copy
                    </th>
                    <th style="text-align: center">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>


                @foreach($products as $key=>$product)
                <tr id="row_{{ $product->id  }}">
                    <td>{{++$key}}</td>
                    <td style="text-align: center">
                        <img src="{{ url('/') }}/{{ $product->picture }}" width="100">

                    </td>
                    <td style="text-align: center">{{date("d-m-Y",strtotime($product->created_at))}}</td>
                    <td style="text-align: center">
                        <input type="text"   id="url_{{ $product->id }}"  value="<img  class='img-fluid' src='{{ url('/') }}/{{ $product->picture }}' />">
                        <input type="button"  id="{{ $product->id  }}" class="btn btn-success copy_class" value="Copy">
                        <br>
                        <span style=" text-align: center; color: green; font-size: 25px; font-weight: bold;" id="succes_{{ $product->id  }}"></span>

                    </td>
                    <td style="text-align: center">
                        <input type="button"  id="{{ $product->id  }}" class="btn btn-danger delete_media" value="Delete">

                    </td>


                </tr>
                    @endforeach

</tbody>
            </table>

     </div>




        <script>
        $(document).ready(function(){

            $(document).on("click", ".copy_class", function(event){
                var  id= this.id;
                $("#succes_"+id).text(" Coppied").fadeOut(3000);

                var  picture_id= document.getElementById("url_"+id);

                picture_id.select();
                document.execCommand('copy');
                document.execCommand("copy");

            });

            $(document).on("click", ".delete_media", function(event){
             let image_id=  $(this).attr('id');
              let reuslt=  confirm("Are you want to delete ?");
                if(reuslt){
                    $("#row_"+image_id).hide();
                   $.ajax({
                       url:"{{url('/')}}/admin/productDetailMediaDelete/"+image_id,
                       success:function (data) {
                           
                       }
                   })
                }else{
                   
                }


            });


        });
    </script>

