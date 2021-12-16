@extends('admin.layouts.master')
@section('pageTitle')
    All testmonial  List
@endsection
@section('mainContent')
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="{{url('/admin/testmonial/create')}}" class="  btn btn-success">
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
                <th style="text-align:center">user name</th>
                <th style="text-align:center">Image</th>
                <th style="text-align:center">Description</th>
                 <th style="text-align:center"> Created date </th>
                <th style="text-align:center" >Action </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($testmonial as  $testi)
            <tr style="text-align:center !important">
                <td style="text-align:center"> {{$testi->id}}</td>
                <td style="text-align:center">{{$testi->user_name}}</td>
                <td style="text-align:center"><img style="width:80px" src="/{{$testi->image}}" alt="testi"></td>
                <td style="text-align:center">{!!$testi->description!!}</td>
                 <td style="text-align:center">{{$testi->create_date}}</td>
                <td style="text-align:center" ><a href="{{url('admin/testmonial/edit/'.$testi->id)}}" class="btn btn-info">Edit</a> 
                <a href="{{url('admin/testmonial/destroy/'.$testi->id)}}" onclick="return confirm('Are you want to delete this Product')" class="btn btn-warning">Delete</a>
            </td>
            </tr>
            @endforeach
            
              
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>


@endsection

