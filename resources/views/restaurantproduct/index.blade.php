@extends('layouts.material')

@section('content')


                            <div class="box">
                                <div class="box-header with-border">
                                        <h3 class="box-title">View Restaurant Product</h3>
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
                                                    <th>Create Product</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($category as $key => $categories)
                                                <tr>
                                                    <td> <a href="{{ url('product/'.$categories->id) }}">{{ $categories->name }}</a></td>
                                                    <td>{{ $categories->product_limit }}</td>
                                                    <td>{{ $categories->description }}</td>
                                                    <td>{{ $categories->status }}</td>
                                                    <td> <a href="{{ url('restaurantproducts/'.$categories->id) }}" title="{{trans('restaurantproduct.view')}}" class="waves-effect waves-light btn btn-info btn-xs">View</a></td>
                                                    <td> <a href="{{ url('product/'.$categories->id) }}" title="{{trans('restaurant.create')}}" class="waves-effect waves-light btn btn-info btn-xs">Create</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

@endsection
