@extends('admin.layouts.master')
@section('pageTitle')
    All Advertisement  List
@endsection
@section('mainContent')
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="{{url('/admin/advertisement/create')}}" class="  btn btn-success">
<i class="fa fa-fw fa-plus"></i>  Add New  
</a>  
        </div>
        {{--<div class="col-md-4 pull-right ">--}}
            {{--<input type="text" id="serach" name="search" placeholder="Search category" class="form-control" >--}}
        {{--</div>--}}

    </div>
    <br/>
    <br/>
    <div class="table-responsive">

        <table  class="table table-bordered table-striped   ">
            <thead>
            <tr style="text-align:center !important">
                <th style="text-align:center"> Sl</th>
                <th style="text-align:center">Title</th>
                <th style="text-align:center">Image</th>
                <th style="text-align:center">Parmalink</th>
                 <th style="text-align:center"> Created date </th>
                <th style="text-align:center" >Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($advertisement as  $adv)
            <tr style="text-align:center !important">
                <td style="text-align:center"> {{$adv->id}}</td>
                <td style="text-align:center">{{$adv->title}}</td>
                <td style="text-align:center"><img style="width:100px;" src="/{{$adv->image}}"></td>
                <td style="text-align:center">{{$adv->link}}<</td>
                 <td style="text-align:center">{{$adv->create_date}}</td>
                <td style="text-align:center" ><a href="{{url('admin/advertisement/edit/'.$adv->id)}}" class="btn btn-info">Edit</a> 
                <a href="{{url('admin/advertisement/destroy/'.$adv->id)}}" onclick="return confirm('Are you want to delete this Product')" class="btn btn-warning">Delete</a>
            </td>
            </tr>
            @endforeach
            
              
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>


@endsection

