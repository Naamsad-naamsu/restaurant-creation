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
                                                    <th>Restaurant Name</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Edit Product</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($category as $key => $categories)
                                                <tr>
                                                    <td> <a href="{{ url('restaurantproduct/'.$categories->id) }}">{{ $categories->name }}</a></td>
                                                    <td>{{ $categories->restaurant_name }}</td>
                                                    <td>{{ $categories->description }}</td>
                                                    <td>{{ $categories->status }}</td>
                                                    <td> <a href="{{ url('restaurantproduct/'.$categories->id) }}" title="{{trans('restaurant.edit')}}" class="waves-effect waves-light btn btn-info btn-xs">Edit</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

@endsection
