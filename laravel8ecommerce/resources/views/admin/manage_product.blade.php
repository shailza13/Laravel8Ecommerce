@extends('admin/layout')
@section('page_title','Add New Product')
@section('product_select','active')
@section('content')
<!-- <h2 class="mb10">Manage Category</h2> -->
<a href="{{url('admin/product')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">                                    
                        <form action="{{route('product.insert')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="product" class="control-label mb-1">Product</label>
                                 <input id="name" name="name" type="text" class="form-control" value="" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="slug" class="control-label mb-1">Slug</label>
                                <input id="slug" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>
                            @error('slug')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                               <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>
                            @error('image')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="category_id" class="control-label mb-1">Category</label>
                                <select id="category_id" name="category_id" class="form-control" aria-required="true" aria-invalid="false" required="">
                                <option value="">Select Categories</option>
                                @foreach($category as $list)
                                   <option value="{{ $list->id }}">{{ $list->category_name }}</option> 
                                   @endforeach 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand" class="control-label mb-1">Brand</label>
                                <input id="brand" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>

                            <div class="form-group">
                                <label for="model" class="control-label mb-1">Model</label>
                                <input id="model" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>

                            <div class="form-group">
                                <label for="Description" class="control-label mb-1">Description</label>
                                <textarea id="desc" name="desc" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>

                              <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Short Description</label>
                                <textarea id="short_desc" name="short_desc" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>                       
                           

                            <div class="form-group">
                                <label for="Keywords" class="control-label mb-1">Keywords</label>
                                <textarea id="keywords" name="keywords" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label for="technical_specification" class="control-label mb-1">Technical_specification</label>
                                <textarea id="technical_specification" name="technical_specification" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label for="uses" class="control-label mb-1">Uses</label>
                                <textarea id="uses" name="uses" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                <textarea id="warranty" name="warranty" type="text" class="form-control"  aria-required="true" aria-invalid="false" required=""></textarea>
                            </div>
                             <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
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