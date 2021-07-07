@extends('layouts.material')

@section('content')


                            <div class="box">
                                <div class="box-header with-border">
                                <a href="{{ url('restaurant/create') }}" class="btn btn-success pull-right">Create</a>
                                        <h3 class="box-title">Create Restaurant</h3>
                                </div>
                                    <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Product Limit</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Product View</th>
                                                    <th>Edit Restaurant</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($category as $key => $categories)
                                                <tr>
                                                    <td> <a href="{{ url('restaurant/'.$categories->id) }}">{{ $categories->name }}</a></td>
                                                    <td>{{ $categories->product_limit }}</td>
                                                    <td>{{ $categories->description }}</td>
                                                    <td>{{ $categories->status }}</td>
                                                    <td> <a href="{{ url('restaurantproducts/'.$categories->id) }}" title="{{trans('restaurantproduct.view')}}" class="waves-effect waves-light btn btn-info btn-xs">View</a></td>
                                                    <td> <a href="{{ url('restaurant/'.$categories->id) }}" title="{{trans('restaurant.edit')}}" class="waves-effect waves-light btn btn-info btn-xs">Edit</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

@endsection
