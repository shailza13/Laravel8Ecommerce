@extends('admin/layout')
@section('page_title','Add New Coupen')
@section('coupen_select','active')
@section('content')
<!-- <h2 class="mb10">Manage Category</h2> -->
<a href="{{url('admin/coupen')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                                    <div class="card-body">                                    
                                        <form action="{{route('coupen.insert')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cc-category" class="control-label mb-1">Title</label>
                                                <input id="title" name="title" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" required>
                                            </div>
                                            @error('title')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                               <div class="form-group">
                                                <label for="code" class="control-label mb-1">Code</label>
                                                <input id="code" name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                                            </div>
                                            @error('code')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                             <div class="form-group">
                                                <label for="value" class="control-label mb-1">Value</label>
                                                <input id="value" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                                            </div>
                                            @error('value')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
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