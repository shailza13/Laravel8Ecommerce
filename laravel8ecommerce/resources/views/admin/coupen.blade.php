@extends('admin/layout')
@section('page_title','Coupen')
@section('coupen_select','active')
@section('content')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"> {{session('message')}}
    <span class="badge badge-pill badge-success"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
 </div>
 @endif

<h2 class="mb10">Coupen</h2>
<a href="{{url('admin/coupen/manage_coupen')}}">
<button type="button" class="btn btn-success">Add Coupen</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
     <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
           <table class="table table-borderless table-data3">
                <thead>
	                <tr>
	                    <th>ID</th>
	                        <th>Title</th>
	                        <th>Code</th>
	                        <th>Value</th>
                            <th>Action</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($data as $list)
                    <tr>
                         <td>{{$list->id}}</td>
                         <td>{{$list->title}}</td>
                         <td>{{$list->code}}</td>
                         <td>{{$list->value}}</td>
                         <td>
                         	<a href="{{url('admin/coupen/manage_coupen/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                             @if($list->status==1)
                                <a href="{{url('admin/coupen/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                            @elseif($list->status==0)
                                <a href="{{url('admin/coupen/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>                              
                            @endif<a href="{{url('admin/coupen/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
					</tr>
                     @endforeach                  
                </tbody>
            </table>
        </div>
     <!-- END DATA TABLE-->
    </div>
</div>

@endsection