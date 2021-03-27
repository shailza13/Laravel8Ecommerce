@extends('admin/layout')
@section('page_title','Manage Color')
@section('color_select','active')
@section('content')
<h2 class="mb10">Manage Color</h2>
<a href="{{url('admin/color')}}" >
<button type="button" class="btn btn-success">Back</button>
</a> 
 <div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                                    <div class="card-body">                                    
                                        <form action="{{url('admin/color/manage_color_update')}}" method="post">
                                            @csrf
                                            @foreach($data as $data)
                                            <div class="form-group">
                                                <label for="color" class="control-label mb-1">Category</label>
                                                <input id="color" name="color" type="text" class="form-control" value="{{$data['color']}}" aria-required="true" aria-invalid="false" required>
                                                <input type="hidden" name="id" value="{{$data['id']}}">
                                            </div>
                                           
                                            @error('color')
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