@extends('admin/layout')
@section('page_title','Manage Product')
@section('product_select','active')
@section('content')
<h2 class="mb10">Update Product</h2>
<a href="{{url('admin/product')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">                                    
                        <form action="{{url('admin/product/manage_product_update')}}" method="post">
                        @csrf
                        @foreach($data as $data)
                            <div class="form-group">
                                <label for="product" class="control-label mb-1">Product</label>
                                <input id="name" name="name" type="text" class="form-control" value="{{$data['name']}}" aria-required="true" aria-invalid="false" required>
                                <input type="hidden" name="id" value="{{$data['id']}}">
                            </div>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="slug" class="control-label mb-1">Slug</label>
                                <input id="slug" name="slug" type="text" value="{{$data['slug']}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>
                            @error('slug')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" value="{{$data['image']}}" class="form-control" aria-required="true" aria-invalid="false">
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
                                    {{$category_id=$data['category_id']}}
                                @foreach($category as $list)
                                @if($category_id==$list->id)
                                   <option selected value="{{ $list->id }}">
                                    @else
                                    <option value="{{ $list->id }}">
                                    @endif
                                {{ $list->category_name }}</option> 

                                   @endforeach 
                                </select>
                            </div>
                            @error('category')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                             <div class="form-group">
                                <label for="brand" class="control-label mb-1">Brand</label>
                                <input id="brand" name="brand" type="text" value="{{$data['brand']}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>
                            @error('brand')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="model" class="control-label mb-1">Model</label>
                                <input id="model" name="model" type="text" value="{{$data['model']}}" class="form-control" aria-required="true" aria-invalid="false" required="">
                            </div>
                            @error('model')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Short Description</label>
                                <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['short_desc']}}</textarea>
                            </div>
                            @error('short_desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Desc</label>
                                <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['desc']}}</textarea>
                            </div>
                            @error('desc')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Keywords</label>
                                <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['keywords']}}</textarea>
                            </div>
                            @error('keywords')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Technical Specification</label>
                                <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['technical_specification']}}</textarea>
                            </div>
                            @error('technical_specification')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc" class="control-label mb-1">Uses</label>
                                <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['uses']}}</textarea>
                            </div>
                            @error('uses')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label for="warranty" class="control-label mb-1">Uses</label>
                                <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required="">{{$data['warranty']}}</textarea>
                            </div>
                            @error('warranty')
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