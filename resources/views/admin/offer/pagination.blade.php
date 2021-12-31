@if(isset($offers))
    <?php $i=0;?>
    @foreach ($offers as $offer)



        <tr >
            <td>{{ $offer->id }}</td>

            <td>
            <img width="50" src="/{{$offer->banner}}" >
            </td>
            <td>
                <img width="50" src="/{{$offer->picture}}" >
            </td>


            <td>{{$offer->name}} </td>


            </td>
            <td> <a href="{{$offer->link}}" target="_blank" >{{$offer->link}}</a> </td>


            <td><?php if($offer->status==1) {echo "Publised" ;}else{ echo "Unpublished";} ?> </td>
            <td>{{$offer->order_by}}</td>
            <td>{{date('d-m-Y',strtotime($offer->start_date))}}</td>
            <td>{{date('d-m-Y',strtotime($offer->ending_date))}}</td>
            <td>{{date('d-m-Y',strtotime($offer->created_at))}}</td>
            <td>
                <a title="edit" href="{{ url('admin/offer') }}/{{ $offer->id }}">
                    <span class="glyphicon glyphicon-edit btn btn-success"></span>
                </a>


                <a title="delete" href="{{ url('admin/offer/delete') }}/{{ $offer->id }}" onclick="return confirm('Are you want to delete this information :press Ok for delete otherwise Cancel')">
                    <span class="glyphicon glyphicon-trash btn btn-danger"></span>
                </a></td>
        </tr>

    @endforeach

@endif


