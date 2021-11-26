@if(isset($categories))
    <?php $i=0;?>
    @foreach ($categories as $category)

        <?php
            if(empty($category->medium_banner)){
                $image='https://www.dhakabaazar.com/uploads/nova-black-berry-moving-room-fan-heater-35643564-min_thumb.png';
            } else {
                $image=url('uploads/category').'/'.$category->medium_banner;
            }
           $total_prodcut= DB::table('product')->where('main_category_id',$category->category_id)->count();

        ?>

        <tr style="text-align:center">
            <td>{{ $category->category_id }}</td>
            <td>
            <img width="50" src="{{$image}}" >
            </td>


            <td>{{$category->category_title}} </td>


            </td>
            <td>{{$category->category_name}} </td>
            <td>

            <?php if($category->parent_id==0){ ?>

                <span class="label label-success">Main Parent</span>
                <?php } else {  ?>

                    <span class="label label-info">Sub Category</span>
                    <?php } ?>
            </td>
            <td>{{$total_prodcut}} </td>
            <td><?php if($category->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td>{{date('d-m-Y',strtotime($category->registered_date))}}</td>
            <td>
                <a title="edit" href="{{ url('admin/category') }}/{{ $category->category_id }}">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>


                <a title="delete" href="{{ url('admin/category/delete') }}/{{ $category->category_id }}" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                </a></td>
        </tr>

    @endforeach

    <tr>
        <td colspan="6" align="center">
            {!! $categories->links() !!}
        </td>
    </tr>
@endif


