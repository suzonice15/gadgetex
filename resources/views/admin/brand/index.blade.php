@extends('admin.layouts.master')
@section('pageTitle')
    All Brand  List
@endsection
@section('mainContent')
<div class="box-body">
    <div class="row">
        <div class="col-md-4">
          
            <a href="{{url('/admin/brand/create')}}" class="  btn btn-success">
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
                <th style="text-align:center">Banner</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Parmalink</th>
                <th style="text-align:center">Category</th>
                 <th style="text-align:center"> Created date </th>
                <th style="text-align:center" >Action </th>
            </tr>
            </thead>
            <tbody>

               @include('admin.brand.pagination')
            </tbody>

        </table>

    </div>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

</div>

@endsection

