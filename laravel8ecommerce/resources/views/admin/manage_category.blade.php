@extends('admin/layout')
@section('page_title','Add New Category')
@section('category_select','active')
@section('content')
<!-- <h2 class="mb10">Manage Category</h2> -->
<a href="{{url('admin/category')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                                    <div class="card-body">                                    
                                        <form action="{{route('category.insert')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="cc-category" class="control-label mb-1">Category</label>
                                                <input id="category_name" name="category_name" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" required>
                                            </div>
                                            @error('category_name')
                                             <div class="alert alert-danger" role="alert">
                                                    {{$message}}
                                            </div>
                                            @enderror
                                               <div class="form-group">
                                                <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                                <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                                            </div>
                                            @error('category_slug')
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