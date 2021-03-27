@extends('admin/layout')
@section('page_title','Manage Coupen')
@section('coupen_select','active')
@section('content')
<h2 class="mb10">Manage Coupen</h2>
<a href="{{url('admin/coupen')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                                    <div class="card-body">                                    
                                        <form action="{{url('admin/coupen/manage_coupen_update')}}" method="post">
                                            @csrf
                                            @foreach($data as $data)
                                            <div class="form-group">
                                                <label for="cc-title" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control" value="{{$data['title']}}" aria-required="true" aria-invalid="false" required>
                                                <input type="hidden" name="id" value="{{$data['id']}}">
                                            </div>
                                           
                                            @error('title')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                               <div class="form-group">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" name="code" type="text" value="{{$data['code']}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                                            </div>
                                            @error('code')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                            <div class="form-group">
                                                <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" name="value" type="text" value="{{$data['value']}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                                            </div>
                                            @error('value')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                             @endforeach
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>








           

                        </div>
    </div>
</div>

@endsection