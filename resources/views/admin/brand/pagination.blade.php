@if(isset($bands))
    <?php $i=0;?>
    @foreach ($bands as $key=>$band)

        <?php

        if(empty($band->brand_banner)){
            $image='https://www.generationsforpeace.org/wp-content/uploads/2018/03/empty.jpg';
        } else {
            $image=url('uploads/brand').'/'.$band->brand_banner;
        }


        ?>





        <tr style="text-align:center">

            <td>{{++$key}} </td>
            <td>
                <img width="50" src="{{$image}}" >
            </td>
            <td>{{$band->brand_name}} </td>

            <td>{{$band->brand_link}} </td>
            <td>{{getCategoryNameByBandID($band->category_id)}} </td>
            <td>{{date('d-m-Y',strtotime($band->created_at))}}</td>
            <td>
                <a title="edit" href="{{ url('admin/brand') }}/{{ $band->brand_id }}">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>

                <a title="delete" href="{{ url('admin/brand/delete') }}/{{ $band->brand_id }}" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                </a></td>
        </tr>

    @endforeach

    <tr>
        <td colspan="6" align="center">
            {!! $bands->links() !!}
        </td>
    </tr>
@endif


