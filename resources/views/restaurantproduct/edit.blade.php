@extends('layouts.material')

@section('content')

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form  method="POST" action="{{ route('restaurantproduct.update',[$category->id]) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{ method_field('PATCH') }}
                    <div class="box-header with-border">
                      <h4 class="box-title">Product Management</h4>
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
					</div>

                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-4">
                                    <div class="form-group  {{$errors->has('name') ? 'has-error': ''}}">
                                        <label>Name</label>
                                        <input type="text" class="form-control"  name="name" value="{{ old('name',$category->name) }}" placeholder="Enter The Product Name">
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="5" cols="5" class="form-control"  name="description" value="{{ old('description')}}" placeholder="Description">{{$category->description}}</textarea>
                                    </div>
                             </div>
                        </div>
                        <div class="card-footer">
                        <button type="reset" class="btn btn-rounded btn-warning btn-outline mr-1">
								  <i class="ti-trash"></i> Cancel  <div class="ripple-container"></div></button>
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
								  <i class="ti-save-alt"></i> Update  <div class="ripple-container"></div></button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
@endsection
